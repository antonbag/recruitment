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
* Recruitment  Controller
*
* @package	Recruitment
* @subpackage	
*/
class RecruitmentCkClassController extends CkJController
{
	/**
	* Call the parent display function. Trick for forking overrides.
	*
	* @access	protected
	*
	*
	* @since	Cook 2.0
	*
	* @return	void
	*/
	protected function _parentDisplay()
	{
		//Add the fork views path (LIFO) instead of FIFO
		array_push($this->paths['view'], JPATH_RECRUITMENT . '/fork/views');

		parent::display();
	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentClassController')){ class RecruitmentClassController extends RecruitmentCkClassController{} }

