<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Tabs Job
* @copyright	
* @author		Albert Moreno -  - 
* @license		
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');



/**
* Recruitment List Model
*
* @package	Recruitment
* @subpackage	Classes
*/
class RecruitmentCkModelTabsjobs extends RecruitmentClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'tabjob';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'tabjob';

	/**
	* Constructor
	*
	* @access	public
	* @param	array	$config	An optional associative array of configuration settings.
	*
	* @return	void
	*/
	public function __construct($config = array())
	{
		//Define the sortables fields (in lists)
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'tab_id' => 'cmd',
			'job_id' => 'cmd'
				));


		parent::__construct($config);

		$this->hasOne('tab_id', // name
			'tabs', // foreignModelClass
			'tab_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('job_id', // name
			'jobs', // foreignModelClass
			'job_id', // localKey
			'id' // foreignKey
		);
	}

	/**
	* Method to get the layout (including default).
	*
	* @access	public
	*
	* @return	string	The layout alias.
	*/
	public function getLayout()
	{
		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'default', 'STRING');
	}

	/**
	* Method to get a store id based on model configuration state.
	* 
	* This is necessary because the model is used by the component and different
	* modules that might need different sets of data or differen ordering
	* requirements.
	*
	* @access	protected
	* @param	string	$id	A prefix for the store id.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('sortTable');
		$id	.= ':'.$this->getState('directionTable');
		$id	.= ':'.$this->getState('limit');
		$id	.= ':'.$this->getState('filter.tab_id');
		$id	.= ':'.$this->getState('filter.job_id');
		return parent::getStoreId($id);
	}

	/**
	* Preparation of the list query.
	*
	* @access	protected
	* @param	object	&$query	returns a filled query object.
	*
	* @return	void
	*/
	protected function prepareQuery(&$query)
	{
		//FROM : Main table
		$query->from('#__recruitment_tabsjobs AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'job_id',
					'job_id.short_description',
					'tab_id',
					'tab_id.description'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'tab_id'
				));
				break;

			case 'all':
				//SELECT : raw complete query without joins
				$this->addSelect('a.*');

				// Disable the pagination
				$this->setState('list.limit', null);
				$this->setState('list.start', null);
				break;
		}

		// FILTER : Tab Id > Description
		if($filter_tab_id = $this->getState('filter.tab_id'))
		{
			if ($filter_tab_id > 0){
				$this->addWhere("a.tab_id = " . (int)$filter_tab_id);
			}
		}

		// FILTER : Job Id > Short Description
		if($filter_job_id = $this->getState('filter.job_id'))
		{
			if ($filter_job_id > 0){
				$this->addWhere("a.job_id = " . (int)$filter_job_id);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'tab_id');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentModelTabsjobs')){ class RecruitmentModelTabsjobs extends RecruitmentCkModelTabsjobs{} }

