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
* Recruitment Overallrange Controller
*
* @package	Recruitment
* @subpackage	Overallrange
*/
class RecruitmentCkControllerOverallrange extends RecruitmentClassControllerItem
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'overallrange';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'overallrange';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'overallranges';

	/**
	* Constructor
	*
	* @access	public
	* @param	array	$config	An optional associative array of configuration settings.
	*
	* @return	void
	*/
	public function __construct($config = array())
	{
		parent::__construct($config);
		$app = JFactory::getApplication();

	}

	/**
	* Return the current layout.
	*
	* @access	protected
	* @param	bool	$default	If true, return the default layout.
	*
	* @return	string	Requested layout or default layout
	*/
	protected function getLayout($default = null)
	{
		if ($default)
			return '';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', '', 'CMD');
	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentControllerOverallrange')){ class RecruitmentControllerOverallrange extends RecruitmentCkControllerOverallrange{} }

