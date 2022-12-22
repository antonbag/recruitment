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
* @subpackage	Application
*/
class RecruitmentCkViewApplication extends RecruitmentClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('application');

	/**
	* Execute and display a template : Application
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayApplication($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.application');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= RecruitmentHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('RECRUITMENT_LAYOUT_APPLICATION'), $this->item, 'user_id');

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

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('application.save', "RECRUITMENT_JTOOLBAR_SAVE_CLOSE");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('application.apply', "RECRUITMENT_JTOOLBAR_SAVE");
		// Cancel
		JToolBarHelper::cancel('application.cancel', "RECRUITMENT_JTOOLBAR_CANCEL");

		$this->toolbar = JToolbar::getInstance();
		$model_user_id = CkJModel::getInstance('ThirdUsers', 'RecruitmentModel');
		$model_user_id->addGroupOrder("a.name");
		$lists['fk']['user_id'] = $model_user_id->getItems();

		$model_job_id = CkJModel::getInstance('Jobs', 'RecruitmentModel');
		$model_job_id->addGroupOrder("a.short_description");
		$lists['fk']['job_id'] = $model_job_id->getItems();

		$model_gender_id = CkJModel::getInstance('Genders', 'RecruitmentModel');
		$model_gender_id->addGroupOrder("a.description");
		$lists['fk']['gender_id'] = $model_gender_id->getItems();

		$model_birth_country_id = CkJModel::getInstance('Countries', 'RecruitmentModel');
		$model_birth_country_id->addGroupOrder("a.printable_name");
		$lists['fk']['birth_country_id'] = $model_birth_country_id->getItems();

		$model_wheredidu_id = CkJModel::getInstance('Wheredidus', 'RecruitmentModel');
		$model_wheredidu_id->addGroupOrder("a.description");
		$lists['fk']['wheredidu_id'] = $model_wheredidu_id->getItems();

		$model_status_id = CkJModel::getInstance('Status', 'RecruitmentModel');
		$model_status_id->addGroupOrder("a.description");
		$lists['fk']['status_id'] = $model_status_id->getItems();
	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentViewApplication')){ class RecruitmentViewApplication extends RecruitmentCkViewApplication{} }

