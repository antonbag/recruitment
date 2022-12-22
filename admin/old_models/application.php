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
* Recruitment Item Model
*
* @package	Recruitment
* @subpackage	Classes
*/
class RecruitmentCkModelApplication extends RecruitmentClassModelItem
{
	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_item = 'application';

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_list = 'applications';

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
		parent::__construct();
	}

	/**
	* Method to delete item(s).
	*
	* @access	public
	* @param	array	&$pks	Ids of the items to delete.
	*
	* @return	boolean	True on success.
	*/
	public function delete(&$pks)
	{
		if (!count( $pks ))
			return true;


		if (!parent::delete($pks))
			return false;



		return true;
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
		return $jinput->get('layout', 'application', 'STRING');
	}

	/**
	* Returns a Table object, always creating it.
	*
	* @access	public
	* @param	string	$type	The table type to instantiate.
	* @param	string	$prefix	A prefix for the table class name. Optional.
	* @param	array	$config	Configuration array for model. Optional.
	*
	*
	* @since	1.6
	*
	* @return	JTable	A database object
	*/
	public function getTable($type = 'application', $prefix = 'RecruitmentTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	* Method to increment hits (check session and layout)
	*
	* @access	public
	* @param	array	$layouts	List of authorized layouts for hitting the object.
	*
	*
	* @since	11.1
	*
	* @return	boolean	Null if skipped. True when incremented. False if error.
	*/
	public function hit($layouts = null)
	{
		return parent::hit(array());
	}

	/**
	* Method to get the data that should be injected in the form.
	*
	* @access	protected
	*
	* @return	mixed	The data for the form.
	*/
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_recruitment.edit.application.data', array());

		if (empty($data)) {
			//Default values shown in the form for new item creation
			$data = $this->getItem();

			// Prime some default values.
			if ($this->getState('application.id') == 0)
			{
				$jinput = JFactory::getApplication()->input;

				$data->id = 0;
				$data->user_id = $jinput->get('filter_user_id', $this->getState('filter.user_id'), 'INT');
				$data->job_id = $jinput->get('filter_job_id', $this->getState('filter.job_id'), 'INT');
				$data->firstname = null;
				$data->lastname = null;
				$data->birth_date = null;
				$data->gender_id = $jinput->get('filter_gender_id', $this->getState('filter.gender_id'), 'INT');
				$data->birth_country_id = $jinput->get('filter_birth_country_id', $this->getState('filter.birth_country_id'), 'INT');
				$data->passport = null;
				$data->email = null;
				$data->telephone = null;
				$data->wheredidu_id = $jinput->get('filter_wheredidu_id', $this->getState('filter.wheredidu_id'), 'INT');
				$data->recruitment_comments = null;
				$data->applicant_contacted_date = null;
				$data->applicant_contacted = null;
				$data->linkedin_public_link = null;
				$data->submit_date = null;
				$data->status_id = $jinput->get('filter_status_id', $this->getState('filter.status_id'), 'INT');
				$data->modification_date = null;
				$data->creation_date = null;

			}
		}
		return $data;
	}

	/**
	* Method to auto-populate the model state.
	* 
	* This method should only be called once per instantiation and is designed to
	* be called on the first call to the getState() method unless the model
	* configuration flag to ignore the request is set.
	* 
	* Note. Calling getState in this method will result in recursion.
	*
	* @access	protected
	*
	*
	* @since	11.1
	*
	* @return	void
	*/
	protected function populateState()
	{
		$app = JFactory::getApplication();
		$session = JFactory::getSession();
		$acl = RecruitmentHelper::getActions();



		parent::populateState();
	}

	/**
	* Preparation of the item query.
	*
	* @access	protected
	* @param	object	&$query	returns a filled query object.
	* @param	integer	$pk	The primary id key of the application
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__recruitment_applications AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.application':

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

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'all':
				//SELECT : raw complete query without joins
				$this->addSelect('a.*');

				// Disable the pagination
				$this->setState('list.limit', null);
				$this->setState('list.start', null);

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;
		}



		// ORDERING
		$orderCol = $this->getState('list.ordering');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->addOrder($orderCol . ' ' . $orderDir);



		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}

	/**
	* Prepare and sanitise the table prior to saving.
	*
	* @access	protected
	* @param	JTable	$table	A JTable object.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	protected function prepareTable($table)
	{
		$date = JFactory::getDate();


		if (empty($table->id))
		{
			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();
		}
		else
		{
			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();
		}

	}

	/**
	* Save an item.
	*
	* @access	public
	* @param	array	$data	The post values.
	*
	* @return	boolean	True on success.
	*/
	public function save($data)
	{
		//Convert from a non-SQL formated date (birth_date)
		$data['birth_date'] = RecruitmentHelperDates::getSqlDate($data['birth_date'], array('Y-m-d'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (applicant_contacted_date)
		$data['applicant_contacted_date'] = RecruitmentHelperDates::getSqlDate($data['applicant_contacted_date'], array('Y-m-d'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (submit_date)
		$data['submit_date'] = RecruitmentHelperDates::getSqlDate($data['submit_date'], array('Y-m-d'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (modification_date)
		$data['modification_date'] = RecruitmentHelperDates::getSqlDate($data['modification_date'], array('Y-m-d H:i:s'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (creation_date)
		$data['creation_date'] = RecruitmentHelperDates::getSqlDate($data['creation_date'], array('Y-m-d H:i:s'), true, 'USER_UTC');

		if (parent::save($data)) {
			return true;
		}
		return false;


	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentModelApplication')){ class RecruitmentModelApplication extends RecruitmentCkModelApplication{} }

