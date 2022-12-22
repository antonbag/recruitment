<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- --- +
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
\defined('_JEXEC') or die;

use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Log\Log;

/**
* Script file of Recruitment component
*
* @package	Recruitment
* @subpackage	Installer
*/
class com_recruitmentInstallerScript
{

	/**
	 * Minimum Joomla version to check
	 *
	 * @var    string
	 * @since  __BUMP_VERSION__
	 */
	private $minimumJoomlaVersion = '4.0';


	/**
	 * Minimum PHP version to check
	 *
	 * @var    string
	 * @since  __BUMP_VERSION__
	 */
	private $minimumPHPVersion = JOOMLA_MINIMUM_PHP;



	/**
	* Called on installation
	*
	* @access	public
	* @param	JAdapterInstance	$adapter	Installer Component Adapter.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	public function install(JAdapterInstance $adapter)
	{
		$adapter->getParent()->setRedirectURL('index.php?option=com_recruitment');


	}

	/**
	* Method to install the embedded third extensions.
	*
	* @access	private
	* @param	JAdapterInstance	$adapter	Installer Component Adapter.
	*
	*
	* @since	Cook 2.6
	*
	* @return	void
	*/
	private function installExtensions(JAdapterInstance $adapter)
	{
		$dir = $adapter->getParent()->getPath('source') . '/extensions';

		$installResults = array();

		jimport('joomla.filesystem.folder');
		$folders = JFolder::folders($dir);

		foreach($folders as $folder)
		{
			$source = $dir . '/' . $folder;
		    $installer = new JInstaller;
		    $installResults[] = $installer->install($source);
		}
	}

	/**
	* Called after any type of action.
	*
	* @access	public
	* @param	string	$type	Type.
	* @param	JAdapterInstance	$adapter	Installer Component Adapter.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	public function postflight($type, JAdapterInstance $adapter)
	{
		switch($type)
		{
			case 'install':
				$txtAction = JText::_('Installing');
		
				//Install all extensions contained in 'extensions' directory
				$this->installExtensions($adapter);
				break;
		
			case 'update':
				$txtAction = JText::_('Updating');

				//Install all extensions contained in 'extensions' directory
				$this->installExtensions($adapter);
				break;
	
			case 'uninstall':
				$txtAction = JText::_('Uninstalling');
		
				//Install all extensions contained in 'extensions' directory
				$this->uninstallExtensions($adapter);
				break;
	
		}

		$app = JFactory::getApplication();
		$txtComponent = JText::_('COM_RECRUITMENT');
		$app->enqueueMessage(JText::sprintf('%s %s was successfull.', $txtAction, $txtComponent));
	}

	/**
	* Called before any type of action
	*
	* @access	public
	* @param	string	$type	Type.
	* @param	JAdapterInstance	$adapter	Installer Component Adapter.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	public function preflight($type, $parent): bool
	{
		if ($type !== 'uninstall') {
			// Check for the minimum PHP version before continuing
			if (!empty($this->minimumPHPVersion) && version_compare(PHP_VERSION, $this->minimumPHPVersion, '<')) {
				Log::add(
					Text::sprintf('JLIB_INSTALLER_MINIMUM_PHP', $this->minimumPHPVersion),
					Log::WARNING,
					'jerror'
				);

				return false;
			}

			// Check for the minimum Joomla version before continuing
			if (!empty($this->minimumJoomlaVersion) && version_compare(JVERSION, $this->minimumJoomlaVersion, '<')) {
				Log::add(
					Text::sprintf('JLIB_INSTALLER_MINIMUM_JOOMLA', $this->minimumJoomlaVersion),
					Log::WARNING,
					'jerror'
				);

				return false;
			}
		}

		return true;

	}

	/**
	* Called on uninstallation
	*
	* @access	public
	* @param	JAdapterInstance	$adapter	Installer Component Adapter.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	public function uninstall(JAdapterInstance $adapter)
	{
		// We run postflight also after uninstalling
		self::postflight('uninstall', $adapter);

	}

	/**
	* Method to uninstall the embedded third extensions.
	*
	* @access	private
	* @param	JAdapterInstance	$adapter	Installer Component Adapter.
	*
	*
	* @since	Cook 2.6
	*
	* @return	void
	*/
	private function uninstallExtensions(JAdapterInstance $adapter)
	{

	}

	/**
	* Called on update
	*
	* @access	public
	* @param	JAdapterInstance	$adapter	Installer Component Adapter.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	public function update(JAdapterInstance $adapter)
	{
		$adapter->getParent()->setRedirectURL('index.php?option=com_recruitment');
	}


}



