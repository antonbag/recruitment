<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Applications
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


JHtml::addIncludePath(JPATH_ADMIN_RECRUITMENT.'/helpers/html');
JHtml::_('behavior.tooltip');
//JHtml::_('behavior.multiselect');

$model		= $this->model;
$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$saveOrder	= $listOrder == 'a.ordering' && $listDirn != 'desc';
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-applications'>
		<thead>
			<tr>
				<?php if ($model->canSelect()): ?>
				<th>
					<?php echo JDom::_('html.form.input.checkbox', array(
						'dataKey' => 'checkall-toggle',
						'title' => JText::_('JGLOBAL_CHECK_ALL'),
						'selectors' => array(
							'onclick' => 'Joomla.checkAll(this);'
						)
					)); ?>
				</th>
				<?php endif; ?>

				<th>

				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_USER_ID_NAME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_JOB_ID_SHORT_DESCRIPTION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_FIRSTNAME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_LASTNAME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_BIRTH_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_GENDER_ID_DESCRIPTION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_BIRTH_COUNTRY_ID_PRINTABLE_NAME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_PASSPORT"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_EMAIL"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_TELEPHONE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_WHEREDIDU_ID_DESCRIPTION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_RECRUITMENT_COMMENTS"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_APPLICANT_CONTACTED_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_APPLICANT_CONTACTED"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_LINKEDIN_PUBLIC_LINK"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_SUBMIT_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_STATUS_ID_DESCRIPTION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_MODIFICATION_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("RECRUITMENT_FIELD_CREATION_DATE"); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			?>

			<tr class="<?php echo "row$k"; ?>">
				<?php if ($model->canSelect()): ?>
				<td>
					<?php if ($row->params->get('access-edit') || $row->params->get('tag-checkedout')): ?>
						<?php echo JDom::_('html.grid.checkedout', array(
													'dataObject' => $row,
													'num' => $i
														));
						?>
					<?php endif; ?>
				</td>
				<?php endif; ?>

				<td>
					<div class="btn-group">
						<?php if ($model->canEdit()): ?>
							<?php if ($row->params->get('access-edit')): ?>
								<?php echo JDom::_('html.grid.task', array(
									'commandAcl' => array('core.edit.own', 'core.edit'),
									'label' => 'RECRUITMENT_JTOOLBAR_EDIT',
									'num' => $i,
									'task' => 'application.edit'
								));?>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ($model->canDelete()): ?>
							<?php if ($row->params->get('access-delete')): ?>
								<?php echo JDom::_('html.grid.task', array(
									'alertConfirm' => 'RECRUITMENT_TOOLBAR_ARE_YOU_SURE_TO_DELETE_THIS_ITEM',
									'commandAcl' => array('core.delete.own', 'core.delete'),
									'label' => 'RECRUITMENT_JTOOLBAR_DELETE',
									'num' => $i,
									'task' => 'application.delete'
								));?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_user_id_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_job_id_short_description',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'firstname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'lastname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'birth_date',
						'dataObject' => $row,
						'dateFormat' => 'Y-m-d'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_gender_id_description',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_birth_country_id_printable_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'passport',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'email',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'telephone',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_wheredidu_id_description',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'recruitment_comments',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'applicant_contacted_date',
						'dataObject' => $row,
						'dateFormat' => 'Y-m-d'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.bool', array(
						'dataKey' => 'applicant_contacted',
						'dataObject' => $row,
						'togglable' => false,
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'linkedin_public_link',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'submit_date',
						'dataObject' => $row,
						'dateFormat' => 'Y-m-d'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_status_id_description',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'modification_date',
						'dataObject' => $row,
						'dateFormat' => 'Y-m-d H:i:s'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'creation_date',
						'dataObject' => $row,
						'dateFormat' => 'Y-m-d H:i:s'
					));?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>