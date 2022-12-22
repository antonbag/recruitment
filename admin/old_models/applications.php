<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Applications
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
class RecruitmentCkModelApplications extends RecruitmentClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'application';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'application';

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
			'user_id' => 'cmd',
			'job_id' => 'cmd',
			'birth_date' => 'date:Y-m-d',
			'gender_id' => 'cmd',
			'birth_country_id' => 'cmd',
			'wheredidu_id' => 'cmd',
			'applicant_contacted_date' => 'date:Y-m-d',
			'submit_date' => 'date:Y-m-d',
			'status_id' => 'cmd',
			'modification_date_from' => 'varchar',
			'modification_date_to' => 'varchar',
			'creation_date_from' => 'varchar',
			'creation_date_to' => 'varchar'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('user_id', // name
			'.users', // foreignModelClass
			'user_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('job_id', // name
			'jobs', // foreignModelClass
			'job_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('gender_id', // name
			'genders', // foreignModelClass
			'gender_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('birth_country_id', // name
			'countries', // foreignModelClass
			'birth_country_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('wheredidu_id', // name
			'wheredidus', // foreignModelClass
			'wheredidu_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('status_id', // name
			'status', // foreignModelClass
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
		$id	.= ':'.$this->getState('filter.user_id');
		$id	.= ':'.$this->getState('filter.job_id');
		$id	.= ':'.$this->getState('filter.birth_date');
		$id	.= ':'.$this->getState('filter.gender_id');
		$id	.= ':'.$this->getState('filter.birth_country_id');
		$id	.= ':'.$this->getState('filter.wheredidu_id');
		$id	.= ':'.$this->getState('filter.applicant_contacted_date');
		$id	.= ':'.$this->getState('filter.submit_date');
		$id	.= ':'.$this->getState('filter.status_id');
		$id	.= ':'.$this->getState('filter.modification_date');
		$id	.= ':'.$this->getState('filter.creation_date');
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
		$query->from('#__recruitment_applications AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'applicant_contacted',
					'applicant_contacted_date',
					'birth_country_id',
					'birth_country_id.printable_name',
					'birth_date',
					'creation_date',
					'email',
					'firstname',
					'gender_id',
					'gender_id.description',
					'job_id',
					'job_id.short_description',
					'lastname',
					'linkedin_public_link',
					'modification_date',
					'passport',
					'recruitment_comments',
					'status_id',
					'status_id.description',
					'submit_date',
					'telephone',
					'user_id',
					'user_id.name',
					'wheredidu_id',
					'wheredidu_id.description'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'user_id'
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

		// FILTER : User Id > Name
		if($filter_user_id = $this->getState('filter.user_id'))
		{
			if ($filter_user_id == 'auto'){
				$this->addWhere('a.user_id = ' . (int)JFactory::getUser()->get('id'));
			}
			else 
			if ($filter_user_id > 0){
				$this->addWhere("a.user_id = " . (int)$filter_user_id);
			}
		}

		// FILTER : Job Id > Short Description
		if($filter_job_id = $this->getState('filter.job_id'))
		{
			if ($filter_job_id > 0){
				$this->addWhere("a.job_id = " . (int)$filter_job_id);
			}
		}

		// FILTER : Birth Date
		if($filter_birth_date = $this->getState('filter.birth_date'))
		{
			if ($filter_birth_date !== null){
				$this->addWhere("a.birth_date = " . $this->_db->Quote($filter_birth_date));
			}
		}

		// FILTER : Gender Id > Description
		if($filter_gender_id = $this->getState('filter.gender_id'))
		{
			if ($filter_gender_id > 0){
				$this->addWhere("a.gender_id = " . (int)$filter_gender_id);
			}
		}

		// FILTER : Birth Country Id > Printable Name
		if($filter_birth_country_id = $this->getState('filter.birth_country_id'))
		{
			if ($filter_birth_country_id > 0){
				$this->addWhere("a.birth_country_id = " . (int)$filter_birth_country_id);
			}
		}

		// FILTER : Wheredidu Id > Description
		if($filter_wheredidu_id = $this->getState('filter.wheredidu_id'))
		{
			if ($filter_wheredidu_id > 0){
				$this->addWhere("a.wheredidu_id = " . (int)$filter_wheredidu_id);
			}
		}

		// FILTER : Applicant Contacted Date
		if($filter_applicant_contacted_date = $this->getState('filter.applicant_contacted_date'))
		{
			if ($filter_applicant_contacted_date !== null){
				$this->addWhere("a.applicant_contacted_date = " . $this->_db->Quote($filter_applicant_contacted_date));
			}
		}

		// FILTER : Submit Date
		if($filter_submit_date = $this->getState('filter.submit_date'))
		{
			if ($filter_submit_date !== null){
				$this->addWhere("a.submit_date = " . $this->_db->Quote($filter_submit_date));
			}
		}

		// FILTER : Status Id > Description
		if($filter_status_id = $this->getState('filter.status_id'))
		{
			if ($filter_status_id > 0){
				$this->addWhere("a.status_id = " . (int)$filter_status_id);
			}
		}

		// FILTER (Range) : Modification date
		if($filter_modification_date_from = $this->getState('filter.modification_date_from'))
		{
			if ($filter_modification_date_from !== null){
				$this->addWhere("a.modification_date >= " . $this->_db->Quote($filter_modification_date_from));
			}
		}

		// FILTER (Range) : Modification date
		if($filter_modification_date_to = $this->getState('filter.modification_date_to'))
		{
			if ($filter_modification_date_to !== null){
				$this->addWhere("a.modification_date <= " . $this->_db->Quote($filter_modification_date_to));
			}
		}

		// FILTER (Range) : Creation date
		if($filter_creation_date_from = $this->getState('filter.creation_date_from'))
		{
			if ($filter_creation_date_from !== null){
				$this->addWhere("a.creation_date >= " . $this->_db->Quote($filter_creation_date_from));
			}
		}

		// FILTER (Range) : Creation date
		if($filter_creation_date_to = $this->getState('filter.creation_date_to'))
		{
			if ($filter_creation_date_to !== null){
				$this->addWhere("a.creation_date <= " . $this->_db->Quote($filter_creation_date_to));
			}
		}

		// SEARCH : Firstname + Lastname + Passport + Telephone + LinkedIn Public Link
		$this->orm->search('search', array(
			'on' => array(
				'firstname' => 'like',
				'lastname' => 'like',
				'passport' => 'like',
				'telephone' => 'like',
				'linkedin_public_link' => 'like'
			)
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'user_id');
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
if (!class_exists('RecruitmentModelApplications')){ class RecruitmentModelApplications extends RecruitmentCkModelApplications{} }

