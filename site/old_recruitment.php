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


if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);

//Copy this line to be able to call the application from outside (Module, Plugin, Third component, ...)
require_once(JPATH_ADMINISTRATOR.'/components/com_recruitment/helpers/loader.php');
require_once('components'.DS.'com_recruitment'.DS.'files'.DS.'helper.php');

if (defined('JDEBUG') && count($_POST))
	$_SESSION['Recruitment']['$_POST'] = $_POST;

$jinput = JFactory::getApplication()->input;
// When this component is called to return a file
if ($jinput->get('task', null, 'CMD') == 'file')
	RecruitmentHelperFile::returnFile();


$controller = CkJController::getInstance('Recruitment');
$controller->execute($jinput->get('task', null, 'CMD'));
$controller->redirect();

