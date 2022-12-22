<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Jobs
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
class RecruitmentCkModelJobs extends RecruitmentClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'job';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'job';

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
			'publish_date' => 'date:Y-m-d',
			'closing_date' => 'date:Y-m-d',
			'status_id' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('status_id', // name
			'jobstatus', // foreignModelClass
			'status_id', // localKey
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
		$id	.= ':'.$this->getState('filter.publish_date');
		$id	.= ':'.$this->getState('filter.closing_date');
		$id	.= ':'.$this->getState('filter.status_id');
		$id	.= ':'.$this->getState('search.search');
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
		$query->from('#__recruitment_jobs AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'closing_date',
					'description',
					'publish_date',
					'short_description',
					'status_id',
					'status_id.description'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'short_description'
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

		// FILTER : Publish Date
		if($filter_publish_date = $this->getState('filter.publish_date'))
		{
			if ($filter_publish_date !== null){
				$this->addWhere("a.publish_date = " . $this->_db->Quote($filter_publish_date));
			}
		}

		// FILTER : Closing Date
		if($filter_closing_date = $this->getState('filter.closing_date'))
		{
			if ($filter_closing_date !== null){
				$this->addWhere("a.closing_date = " . $this->_db->Quote($filter_closing_date));
			}
		}

		// FILTER : Status Id > Description
		if($filter_status_id = $this->getState('filter.status_id'))
		{
			if ($filter_status_id > 0){
				$this->addWhere("a.status_id = " . (int)$filter_status_id);
			}
		}

		// SEARCH : Short Description
		$this->orm->search('search', array(
			'on' => array(
				'short_description' => 'like'
			)
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'short_description');
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
if (!class_exists('RecruitmentModelJobs')){ class RecruitmentModelJobs extends RecruitmentCkModelJobs{} }

