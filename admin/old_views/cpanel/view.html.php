<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Recruitment
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
* @subpackage	Cpanel
*/
class RecruitmentCkViewCpanel extends RecruitmentClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Control Panel
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
		$this->menu = RecruitmentHelper::addSubmenu('cpanel', 'default', 'cpanel');
		$this->params = new JRegistry();

		// Define the title
		$this->_prepareDocument(JText::_('RECRUITMENT_LAYOUT_CONTROL_PANEL'));

		// Deprecated var : use $this->params->get('page_heading')
		$this->title = $this->params->get('page_heading');
		// Toolbar
		JToolBarHelper::title(JText::_('RECRUITMENT_LAYOUT_CONTROL_PANEL'), 'generic');


	}

	/**
	* Execute and display a template : Control Panel
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
		$this->menu = RecruitmentHelper::addSubmenu('cpanel', 'modal', 'cpanel');
		$this->params = new JRegistry();

		// Define the title
		$this->_prepareDocument(JText::_('RECRUITMENT_LAYOUT_CONTROL_PANEL'));

		// Deprecated var : use $this->params->get('page_heading')
		$this->title = $this->params->get('page_heading');
		// Toolbar
		JToolBarHelper::title(JText::_('RECRUITMENT_LAYOUT_CONTROL_PANEL'), 'generic');


	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentViewCpanel')){ class RecruitmentViewCpanel extends RecruitmentCkViewCpanel{} }

