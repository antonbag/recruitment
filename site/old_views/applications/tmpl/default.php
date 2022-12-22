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

<?php
// Render the page title
echo JLayoutHelper::render('title', array(
	'params' => $this->params,
	'title' => null,
	'browserTitle' => null
)); ?>
<form action="<?php echo(JRoute::_("index.php")); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row-fluid">
		<div id="contents" class="span12">

			<!-- BRICK : toolbar_plur -->
			<?php echo $this->renderToolbar($this->items);?>

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


			<!-- BRICK : filters -->
			<div class="pull-left">
				<?php echo $this->filters['filter_user_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_job_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_birth_date']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_gender_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_birth_country_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_wheredidu_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_applicant_contacted_date']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_submit_date']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_status_id']->input;?>
			</div>


			<div class="pull-left">
					<?php echo $this->filters['filter_modification_date_from']->input;?>
					<?php echo $this->filters['filter_modification_date_to']->input;?>
			</div>


			<div class="pull-left">
					<?php echo $this->filters['filter_creation_date_from']->input;?>
					<?php echo $this->filters['filter_creation_date_to']->input;?>
			</div>


			<div class="clearfix"></div>

			<!-- BRICK : filters -->

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