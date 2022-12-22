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
* Recruitment Table class
*
* @package	Recruitment
* @subpackage	Overallrange
*/
class RecruitmentCkTableOverallrange extends RecruitmentClassTable
{
	/**
	* Constructor
	*
	* @access	public
	* @param	object	&$db	Database connector object
	* @param	string	$tbl	Table name
	* @param	string	$key	Primary key
	*
	* @return	void
	*/
	public function __construct(&$db, $tbl = '#__recruitment_overallranges', $key = 'id')
	{
		parent::__construct($tbl, $key, $db);
	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentTableOverallrange')){ class RecruitmentTableOverallrange extends RecruitmentCkTableOverallrange{} }

