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


RecruitmentHelper::headerDeclarations();
//Load the formvalidator scripts requirements.
JDom::_('html.toolbar');
?>

<form action="<?php echo(JRoute::_("index.php")); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row-fluid">
		<div id="sidebar" class="span2">
			<div class="sidebar-nav">

				<!-- BRICK : menu -->
				<?php echo JDom::_('html.menu.submenu', array(
					'list' => $this->menu
				)); ?>

				<div class="nav-filters">
					<!-- BRICK : filters -->
					<?php echo $this->filters['filter_user_id']->input;?>
					<hr class="hr-condensed">
					<?php echo $this->filters['filter_job_id']->input;?>
					<hr class="hr-condensed">
					<?php echo $this->filters['filter_birth_date']->input;?>
					<hr class="hr-condensed">
					<?php echo $this->filters['filter_gender_id']->input;?>
					<hr class="hr-condensed">
					<?php echo $this->filters['filter_birth_country_id']->input;?>
					<hr class="hr-condensed">
					<?php echo $this->filters['filter_wheredidu_id']->input;?>
					<hr class="hr-condensed">
					<?php echo $this->filters['filter_applicant_contacted_date']->input;?>
					<hr class="hr-condensed">
					<?php echo $this->filters['filter_submit_date']->input;?>
					<hr class="hr-condensed">
					<?php echo $this->filters['filter_status_id']->input;?>
					<hr class="hr-condensed">
						<?php echo $this->filters['filter_modification_date_from']->input;?>
						<?php echo $this->filters['filter_modification_date_to']->input;?>
					<hr class="hr-condensed">
						<?php echo $this->filters['filter_creation_date_from']->input;?>
						<?php echo $this->filters['filter_creation_date_to']->input;?>
				</div>


			</div>
		</div>
		<div id="contents" class="span10">

			<!-- BRICK : filters -->
			<div class="pull-left">
				<?php echo $this->filters['search_search']->input;?>
			</div>


			<!-- BRICK : display -->
			<div class="pull-right">
				<?php echo $this->filters['sortTable']->input;?>
			</div>


			<div class="pull-right">
				<?php echo $this->filters['directionTable']->input;?>
			</div>


			<div class="pull-right">
				<?php echo $this->filters['limit']->input;?>
			</div>


			<div class="clearfix"></div>

			<!-- BRICK : grid -->
			<?php echo $this->loadTemplate('grid'); ?>

			<!-- BRICK : pagination -->
			<?php echo $this->pagination->getListFooter(); ?>

		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'values' => array(
					'view' => $jinput->get('view', 'applications'),
					'layout' => $jinput->get('layout', 'default'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>