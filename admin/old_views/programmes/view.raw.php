<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Programmes
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
* @subpackage	Programmes
*/
class RecruitmentCkViewProgrammes extends RecruitmentClassViewRaw
{

}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentViewProgrammes')){ class RecruitmentViewProgrammes extends RecruitmentCkViewProgrammes{} }

