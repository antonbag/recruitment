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



?>

<?php
// Initialize variables
$field = $displayData['field'];
?>

<?php if (RecruitmentHelperForm::canView($field)): ?>

	<?php if ($field->hidden): ?>
		<?php echo $field->input; ?>

	<?php else: ?>
		<div class="control-group field-<?php echo $field->id . $field->responsive; ?>">

			<div class="control-label">
				<?php echo $field->label; ?>
			</div>

			<?php $selectors = (($field->type == 'Editor') ? ' style="clear: both; margin: 0;"' : ''); ?>
			<div class="controls"<?php echo $selectors; ?>>
				<?php echo $field->input; ?>
			</div>

		</div>

		<?php echo(RecruitmentHelperHtmlValidator::loadValidator($field)); ?>

	<?php endif; ?>


<?php endif; ?>