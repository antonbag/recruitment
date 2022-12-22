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
* Form validator rule for Recruitment.
*
* @package	Recruitment
* @subpackage	Form
*/
class RecruitmentCkFormRuleCkemail extends RecruitmentClassFormRule
{
	/**
	* Indicates that this class contains special methods (ie: get()).
	*
	* @var boolean
	*/
	public $extended = true;

	/**
	* Unique name for this rule.
	*
	* @var string
	*/
	protected $handler = 'ckemail';

	/**
	* The regular expression to use in testing a form field value.
	*
	* @var string
	*/
	protected $regex = '^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+.)+[a-zA-Z0-9.-]{2,4}$';


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormRuleCkemail')){ class JFormRuleCkemail extends RecruitmentCkFormRuleCkemail{} }

