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

if (!class_exists('RecruitmentHelper'))
	require_once(JPATH_ADMINISTRATOR . '/components/com_recruitment/helpers/loader.php');


/**
* Form field for Recruitment.
*
* @package	Recruitment
* @subpackage	Form
*/
class RecruitmentCkFormFieldCklimit extends RecruitmentClassFormField
{
	/**
	* The form field type.
	*
	* @var string
	*/
	public $type = 'cklimit';

	/**
	* Method to get the field input markup.
	*
	* @access	public
	*
	*
	* @since	11.1
	*
	* @return	string	The field input markup.
	*/
	public function getInput()
	{
		$options = array();
		if (!isset($this->jdomOptions['list']))
		{
			//Get the options from XML
			foreach ($this->element->children() as $option)
			{
				if ($option->getName() != 'option')
					continue;

				$opt = new stdClass();
				foreach($option->attributes() as $attr => $value)
					$opt->$attr = (string)$value;

				$opt->text = JText::_(trim((string) $option));
				$options[] = $opt;
			}
		}

		// Reformate date values
		if ($dateFormat = $this->getOption('dateFormat'))
			RecruitmentHelperDates::listFormat($this->jdomOptions['list'], $this->getOption('labelKey'), $dateFormat);

		$this->input = JDom::_('html.form.input.select.limit', array_merge(array(
				'dataKey' => $this->getOption('name'),
				'domClass' => $this->getOption('class'),
				'domId' => $this->id,
				'domName' => $this->name,
				'applyAccess' => $this->getOption('applyAccess'),
				'dataValue' => (string)$this->value,
				'labelKey' => $this->getOption('labelKey'),
				'list' => $options,
				'listKey' => $this->getOption('listKey'),
				'nullLabel' => $this->getOption('nullLabel'),
				'prefix' => $this->getOption('prefix'),
				'responsive' => $this->getOption('responsive'),
				'size' => $this->getOption('size', 1, 'int'),
				'submitEventName' => ($this->getOption('submit') == 'true'?'onchange':null),
				'suffix' => $this->getOption('suffix'),
				'ui' => $this->getOption('ui')
			), $this->jdomOptions));

		return parent::getInput();
	}


}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldCklimit')){ class JFormFieldCklimit extends RecruitmentCkFormFieldCklimit{} }

