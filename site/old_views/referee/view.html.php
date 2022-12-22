<?php
/**                               ______________________________________________
 *                          o O   |                                              |
 *                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
 *                ( o o )         |______________________________________________|
 * --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
 * @version
 * @package        Recruitment
 * @subpackage    Applications
 * @copyright
 * @author        Albert Moreno -  -
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
 * HTML View class for the Recruitment component
 *
 * @package    Recruitment
 * @subpackage    Applications
 */
class RecruitmentCkViewReferee extends RecruitmentClassView
{
    /**
     * List of the reachables layouts. Fill this array in every view file.
     *
     * @var array
     */
    protected $layouts = array('default');

    /**
     * Execute and display a template : Applications
     *
     * @access    protected
     * @param    string $tpl The name of the template file to parse; automatically searches through the template paths.
     *
     *
     * @since    11.1
     *
     * @return    mixed    A string if successful, otherwise a JError object.
     */
    protected function displayDefault($tpl = null)
    {
        $mainframe =& JFactory::getApplication();
        $this->model = $model = $this->getModel();

        $document = JFactory::getDocument();
        $document->addStyleSheet('component/com_recruitment/css/recruitment.css');
        $jinput = JFactory::getApplication()->input;
        $upload_code = $jinput->get('upload_code');

        if (!$upload_code)
            $model->setError(JText::_('JERROR_ALERTNOAUTHOR'));

        if ($upload_code):
            $referee = Helper::findFromUploadCode($upload_code);

            $model = CkJModel::getInstance('application', 'RecruitmentModel');
            $application = $model->getItem($referee->application_id);
            $job = Helper::getJob($application->job_id);

            $this->assignRef('referee', $referee);
            $this->assignRef('application', $application);
            $this->assignRef('job', $job);
        endif;
    }

}

// Load the fork
RecruitmentHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentViewReferee')) {
    class RecruitmentViewReferee extends RecruitmentCkViewReferee
    {
    }
}

