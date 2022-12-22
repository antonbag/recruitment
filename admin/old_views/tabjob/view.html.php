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
* HTML View class for the Recruitment component
*
* @package	Recruitment
* @subpackage	Tabjob
*/
class RecruitmentCkViewTabjob extends RecruitmentClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('tabjob');

	/**
	* Execute and display a template : Tab Job
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayTabjob($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.tabjob');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= RecruitmentHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('RECRUITMENT_LAYOUT_TAB_JOB'), $this->item, 'tab_id');

		$user		= JFactory::getUser();
		$isNew		= ($model->getId() == 0);

		//Check ACL before opening the form (prevent from direct access)
		if (!$model->canEdit($item, true))
			$model->setError(JText::_('JERROR_ALERTNOAUTHOR'));

		// Check for errors.
		if (count($errors = $model->getErrors()))
		{
			JError::raiseError(500, implode(BR, array_unique($errors)));
			return false;
		}
		//Toolbar
		JToolBarHelper::title(JText::_('RECRUITMENT_LAYOUT_TAB_JOB'), 'pencil-2');

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('tabjob.save', "RECRUITMENT_JTOOLBAR_SAVE_CLOSE");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('tabjob.apply', "RECRUITMENT_JTOOLBAR_SAVE");
		// Cancel
		JToolBarHelper::cancel('tabjob.cancel', "RECRUITMENT_JTOOLBAR_CANCEL");
		$model_tab_id = CkJModel::getInstance('Tabs', 'RecruitmentModel');
		$model_tab_id->addGroupOrder("a.description");
		$lists['fk']['tab_id'] = $model_tab_id->getItems();

		$model_job_id = CkJModel::getInstance('Jobs', 'RecruitmentModel');
		$model_job_id->addGroupOrder("a.short_description");
		$lists['fk']['job_id'] = $model_job_id->getItems();
	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentViewTabjob')){ class RecruitmentViewTabjob extends RecruitmentCkViewTabjob{} }

