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
* HTML View class for the Recruitment component
*
* @package	Recruitment
* @subpackage	Applications
*/
class RecruitmentCkViewApplications extends RecruitmentClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default');

	/**
	* Execute and display a template : Applications
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayDefault($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_recruitment', true);
		$state->set('context', 'layout.default');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= RecruitmentHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('default.filters');
		$this->menu = RecruitmentHelper::addSubmenu('applications', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('RECRUITMENT_LAYOUT_APPLICATIONS'));

		

		//Filters
		// User Id > Name
		$modelUser_id = CkJModel::getInstance('thirdusers', 'RecruitmentModel');
		$modelUser_id->set('context', $model->get('context'));
		$filters['filter_user_id']->jdomOptions = array(
			'list' => $modelUser_id->getItems()
		);

		// Job Id > Short Description
		$modelJob_id = CkJModel::getInstance('jobs', 'RecruitmentModel');
		$modelJob_id->set('context', $model->get('context'));
		$filters['filter_job_id']->jdomOptions = array(
			'list' => $modelJob_id->getItems()
		);

		// Gender Id > Description
		$modelGender_id = CkJModel::getInstance('genders', 'RecruitmentModel');
		$modelGender_id->set('context', $model->get('context'));
		$filters['filter_gender_id']->jdomOptions = array(
			'list' => $modelGender_id->getItems()
		);

		// Birth Country Id > Printable Name
		$modelBirth_country_id = CkJModel::getInstance('countries', 'RecruitmentModel');
		$modelBirth_country_id->set('context', $model->get('context'));
		$filters['filter_birth_country_id']->jdomOptions = array(
			'list' => $modelBirth_country_id->getItems()
		);

		// Wheredidu Id > Description
		$modelWheredidu_id = CkJModel::getInstance('wheredidus', 'RecruitmentModel');
		$modelWheredidu_id->set('context', $model->get('context'));
		$filters['filter_wheredidu_id']->jdomOptions = array(
			'list' => $modelWheredidu_id->getItems()
		);

		// Status Id > Description
		$modelStatus_id = CkJModel::getInstance('status', 'RecruitmentModel');
		$modelStatus_id->set('context', $model->get('context'));
		$filters['filter_status_id']->jdomOptions = array(
			'list' => $modelStatus_id->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('default')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('application.add', "RECRUITMENT_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('application.edit', "RECRUITMENT_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('RECRUITMENT_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'application.delete', "RECRUITMENT_JTOOLBAR_DELETE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Applications
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayModal($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_recruitment', true);
		$state->set('context', 'layout.modal');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= RecruitmentHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('modal.filters');
		$this->menu = RecruitmentHelper::addSubmenu('applications', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('RECRUITMENT_LAYOUT_APPLICATIONS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('application.add', "RECRUITMENT_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('application.edit', "RECRUITMENT_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('RECRUITMENT_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'application.delete', "RECRUITMENT_JTOOLBAR_DELETE");



		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Returns an array of fields the table can be sorted by.
	*
	* @access	protected
	* @param	string	$layout	The name of the called layout. Not used yet
	*
	*
	* @since	3.0
	*
	* @return	array	Array containing the field name to sort by as the key and display text as value.
	*/
	protected function getSortFields($layout = null)
	{
		return array();
	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentViewApplications')){ class RecruitmentViewApplications extends RecruitmentCkViewApplications{} }

