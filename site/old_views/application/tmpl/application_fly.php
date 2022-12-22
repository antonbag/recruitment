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



?>

<fieldset class="fieldsfly fly-horizontal">

	<div class="control-group field-_user_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_USER_ID_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_short_description">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_JOB_ID_SHORT_DESCRIPTION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_job_id_short_description',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-firstname">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_FIRSTNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'firstname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-lastname">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_LASTNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'lastname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-birth_date">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_BIRTH_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'birth_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d'
			));?>
		</div>
    </div>
	<div class="control-group field-_gender_id_description">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_GENDER_ID_DESCRIPTION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_gender_id_description',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_birth_country_id_printable_name">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_BIRTH_COUNTRY_ID_PRINTABLE_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_birth_country_id_printable_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-passport">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_PASSPORT" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'passport',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-email">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_EMAIL" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'email',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-telephone">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_TELEPHONE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'telephone',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_wheredidu_id_description">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_WHEREDIDU_ID_DESCRIPTION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_wheredidu_id_description',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-recruitment_comments">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_RECRUITMENT_COMMENTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'recruitment_comments',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-applicant_contacted_date">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_APPLICANT_CONTACTED_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'applicant_contacted_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d'
			));?>
		</div>
    </div>
	<div class="control-group field-applicant_contacted">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_APPLICANT_CONTACTED" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.bool', array(
				'dataKey' => 'applicant_contacted',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-linkedin_public_link">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_LINKEDIN_PUBLIC_LINK" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'linkedin_public_link',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-submit_date">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_SUBMIT_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'submit_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d'
			));?>
		</div>
    </div>
	<div class="control-group field-_status_id_description">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_STATUS_ID_DESCRIPTION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_status_id_description',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-modification_date">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_MODIFICATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'modification_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d H:i:s'
			));?>
		</div>
    </div>
	<div class="control-group field-creation_date">
    	<div class="control-label">
			<label><?php echo JText::_( "RECRUITMENT_FIELD_CREATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'creation_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d H:i:s'
			));?>
		</div>
    </div>
</fieldset>