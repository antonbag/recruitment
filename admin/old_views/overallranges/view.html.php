<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Overall Ranges
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
* @subpackage	Overallranges
*/
class RecruitmentCkViewOverallranges extends RecruitmentClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Overall Ranges
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
		$this->menu = RecruitmentHelper::addSubmenu('overallranges', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('RECRUITMENT_LAYOUT_OVERALL_RANGES'));

		

		//Filters
		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('default')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('RECRUITMENT_LAYOUT_OVERALL_RANGES'), 'list');

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('overallrange.add', "RECRUITMENT_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('overallrange.edit', "RECRUITMENT_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('RECRUITMENT_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'overallrange.delete', "RECRUITMENT_JTOOLBAR_DELETE");

		// Config
		if ($model->canAdmin())
			JToolBarHelper::preferences('com_recruitment');
	}

	/**
	* Execute and display a template : Overall Ranges
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
		$this->menu = RecruitmentHelper::addSubmenu('overallranges', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('RECRUITMENT_LAYOUT_OVERALL_RANGES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('RECRUITMENT_LAYOUT_OVERALL_RANGES'), 'list');

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('overallrange.add', "RECRUITMENT_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('overallrange.edit', "RECRUITMENT_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('RECRUITMENT_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'overallrange.delete', "RECRUITMENT_JTOOLBAR_DELETE");


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
if (!class_exists('RecruitmentViewOverallranges')){ class RecruitmentViewOverallranges extends RecruitmentCkViewOverallranges{} }

