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

use Joomla\CMS\Document\Factory;

// no direct access
defined('_JEXEC') or die('Restricted access');



/**
* Recruitment Helper functions.
*
* @package	Recruitment
* @subpackage	Helper
*/
class RecruitmentCkHelper
{
	/**
	* Cache for ACL actions
	*
	* @var object
	*/
	protected static $acl = null;

	/**
	* Directories aliases.
	*
	* @var array
	*/
	protected static $directories;

	/**
	* Determines when requirements have been loaded.
	*
	* @var boolean
	*/
	protected static $loaded = null;

	/**
	* Call a JS file. Manage fork files.
	*
	* @access	protected static
	* @param	string	$base	Component base from site root.
	* @param	string	$file	Script file.
	* @param	boolean	$replace	Replace the file or override. (Default : Replace)
	*
	*
	* @since	Cook 2.0
	*
	* @return	void
	*/
	protected static function addScript($base, $file, $replace = true)
	{
		$doc = JFactory::getDocument();

		$url = JURI::root(true) . '/' . $base . '/' . $file;
		$url = str_replace(DS, '/', $url);

		$urlFork = null;
		if (file_exists(JPATH_SITE .DS. $base .DS. 'fork' .DS. $file))
		{
			$urlFork = JURI::root(true) . '/' . $base . '/fork/' . $file;
			$urlFork = str_replace(DS, '/', $urlFork);
		}

		if ($replace && $urlFork)
			$url = $urlFork;

		$doc->addScript($url);

		if (!$replace && $urlFork)
			$doc->addScript($urlFork);
	}

	/**
	* Call a CSS file. Manage fork files.
	*
	* @access	protected static
	* @param	string	$base	Component base from site root.
	* @param	string	$file	Stylesheet file.
	* @param	boolean	$replace	Replace the file or override. (Default : Override)
	*
	*
	* @since	Cook 2.0
	*
	* @return	void
	*/
	protected static function addStyleSheet($base, $file, $replace = false)
	{
		$doc = JFactory::getDocument();

		$url = JURI::root(true) . '/' . $base . '/' . $file;
		$url = str_replace(DS, '/', $url);

		$urlFork = null;
		if (file_exists(JPATH_SITE .'/'. $base . '/fork/' . $file))
		{
			$urlFork = JURI::root(true) . '/' . $base . '/fork/' . $file;
			$urlFork = str_replace(DS, '/', $urlFork);
		}

		if ($replace && $urlFork)
			$url = $urlFork;

		$doc->addStyleSheet($url);

		if (!$replace && $urlFork)
			$doc->addStyleSheet($urlFork);
	}

	/**
	* Configure the Linkbar.
	*
	* @access	public static
	* @param	varchar	$view	The name of the active view.
	* @param	varchar	$layout	The name of the active layout.
	* @param	varchar	$alias	The name of the menu. Default : 'menu'
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	public static function addSubmenu($view, $layout, $alias = 'menu')
	{
		$items = static::getMenuItems();

		// Will be handled in XML in future (or/and with the Joomla native menus)
		// -> give your opinion on j-cook.pro/forum


		$client = 'admin';
		if (Factory::getApplication()->isClient('site'))
			$client = 'site';

		$links = array();
		switch($client)
		{
			case 'admin':
				switch($alias)
				{
					case 'cpanel':
					case 'menu':
					default:
						$links = array(
							'admin.wheredidus.default',
							'admin.doctypes.default',
							'admin.genders.default',
							'admin.overallranges.default',
							'admin.programmes.default',
							'admin.tabs.default',
							'admin.jobstatus.default',
							'admin.tabsjobs.default',
							'admin.status.default',
							'admin.jobs.default',
							'admin.applications.default'
						);

						if ($alias != 'cpanel')
							array_unshift($links, 'admin.cpanel');

						break;
				}
				break;

			case 'site':
				switch($alias)
				{
					case 'cpanel':
					case 'menu':
					default:
						$links = array(
							'site.applications'
						);

						if ($alias != 'cpanel')
							array_unshift($links, 'site.cpanel');

						break;
				}
				break;
		}


		//Compile with selected items in the right order
		$menu = array();
		foreach($links as $link)
		{
			if (!isset($items[$link]))
				continue;	// Not found

			$item = $items[$link];

			// Menu link
			$extension = 'com_recruitment';
			if (isset($item['extension']))
				$extension = $item['extension'];

			$url = 'index.php?option=' . $extension;
			if (isset($item['view']))
				$url .= '&view=' . $item['view'];
			if (isset($item['layout']))
				$url .= '&layout=' . $item['layout'];

			// Is active
			$active = ($item['view'] == $view);
			if (isset($item['layout']))
				$active = $active && ($item['layout'] == $layout);

			// Reconstruct it the Joomla format
			$menu[] = array(JText::_($item['label']), $url, $active, $item['icon']);

		}

		return $menu;
	}

	/**
	* Method to a model from a namespace.
	*
	* @access	public static
	* @param	string	$model	The namespaced model.
	* @param	boolean	$item	Sibling model. true: return ITEM model. false: return LIST model.
	*
	*
	* @since	Cook 3.0.10
	*
	* @return	JModel	The model.
	*/
	public static function componentModel($model, $item = null)
	{
		$extension = 'recruitment';

		$parts = explode('.', $model);
		if (count($parts) > 1)
		{
			if ($parts[0] != $extension)
			{
				$extension = $parts[0];
				self::loadComponentModels($extension);
			}
			$model = $parts[1];
		}

		$model = CkJModel::getInstance($model, ucfirst($extension) . 'Model');

		// Return a sibling model
		if ($item === true && method_exists($model, 'getNameItem'))
			$model = JModelLegacy::getInstance($model->getNameItem(), ucfirst($extension) . 'Model');
		else if ($item === false && method_exists($model, 'getNameList'))
			$model = JModelLegacy::getInstance($model->getNameList(), ucfirst($extension) . 'Model');

		return $model;
	}

	/**
	* Gets a list of the actions that can be performed.
	*
	* @access	public static
	*
	*
	* @deprecated	Cook 2.0
	*
	* @return	JObject	An ACL object containing authorizations
	*/
	public static function getAcl()
	{
		return self::getActions();
	}

	/**
	* Gets a list of the actions that can be performed.
	*
	* @access	public static
	* @param	integer	$itemId	The item ID.
	*
	*
	* @since	1.6
	*
	* @return	JObject	An ACL object containing authorizations
	*/
	public static function getActions($itemId = 0)
	{
		if (isset(self::$acl))
			return self::$acl;

		$user	= JFactory::getUser();
		$result	= new JObject;

		$actions = array(
			'core.admin',
			'core.manage',
			'core.create',
			'core.edit',
			'core.edit.state',
			'core.edit.own',
			'core.delete',
			'core.delete.own',
			'core.view.own',
		);

		foreach ($actions as $action)
			$result->set($action, $user->authorise($action, COM_RECRUITMENT));

		self::$acl = $result;

		return $result;
	}

	/**
	* Serve any data using ORM.
	*
	* @access	public static
	* @param	string	$modelName	Root model name.
	* @param	array	$orm	ORM declaration.
	* @param	integer	$pk	Primary Key value. Optional
	*
	*
	* @since	Cook 3.1
	*
	* @return	mixed	List or Item depending of the requested model.
	*/
	public static function getData($modelName, $orm, $pk = null)
	{
		$model = static::componentModel($modelName, ($pk?true:null));
		if (!$model)
			return null;

		// Not supported yet
		if (!method_exists($model, 'orm'))
			return null;

		// LIST
		if (method_exists($model, 'getItems'))
		{
			// Applies ORM
			$model->orm($orm);

			// Get the list
			return $model->getItems();
		}


		// ITEM
		else if (method_exists($model, 'getItem'))
		{
			// Force ID loading on PK
			if ($pk)
				$orm['id'] = $pk;

			// Applies ORM
			$model->orm($orm);

			// Set PK
			if (!$pk && array_key_exists('id', $orm) && is_numeric($orm['id']))
				$pk = $orm['id'];

			return $model->getItem($pk);
		}

		return null;
	}

	/**
	* Return the directories aliases full paths
	*
	* @access	public static
	*
	*
	* @since	Cook 2.6.4
	*
	* @return	array	Arrays of aliases relative path from site root.
	*/
	public static function getDirectories()
	{
		if (!empty(self::$directories))
			return self::$directories;

		$comAlias = "com_recruitment";
		$configMedias = JComponentHelper::getParams('com_media');
		$config = JComponentHelper::getParams($comAlias);

		$directories = array(

			'DIR_FILES' => "[COM_SITE]" .DS. "files",
			'DIR_TRASH' => $config->get("trash_dir", 'images' . DS . "trash"),
			'IMAGES' => '[IMAGES]',
		);

		$bases = array(
			'COM_ADMIN' => "administrator" .DS. 'components' .DS. $comAlias,
			'ADMIN' => "administrator",
			'COM_SITE' => 'components' .DS. $comAlias,
			'IMAGES' => $config->get('image_path', 'images'),
			'MEDIAS' => $configMedias->get('file_path', 'images'),
			'ROOT' => '',

		);



		// Parse the directory aliases
		foreach($directories as $alias => $directory)
		{
			// Parse the component base folders
			foreach($bases as $aliasBase => $directoryBase)
				$directories[$alias] = preg_replace("/\[" . $aliasBase . "\]/", $directoryBase, $directories[$alias]);

			// Clean tags if remains
			$directories[$alias] = preg_replace("/\[.+\]/", "", $directories[$alias]);
		}

		self::$directories = $directories;
		return self::$directories;

	}

	/**
	* JDom helper. Get a file path or url depending of the method
	*
	* @access	public static
	* @param	string	$path	File path. Can contain directories aliases.
	* @param	string	$method	Method to access the file : [direct,indirect,physical]
	* @param	array	$attribs	Image thumb attributes. Can handle legacy array options.
	*
	*
	* @since	Cook 2.9
	*
	* @return	string	File path or url
	*/
	public static function getFile($path, $method = 'physical', $attribs = null)
	{
		if (is_array($attribs))
			$attribs = RecruitmentHelperFile::getAttributesFromLegacy($attribs);

		return RecruitmentHelperFile::getFileUrl($path, $method, $attribs);
	}

	/**
	* Load all menu items.
	*
	* @access	public static
	*
	*
	* @since	Cook 2.0
	*
	* @return	void
	*/
	public static function getMenuItems()
	{
		// Will be handled in XML in future (or/and with the Joomla native menus)
		// -> give your opinion on j-cook.pro/forum

		$items = array();

		$items['admin.wheredidus.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_WHEREDIDUS',
			'view' => 'wheredidus',
			'layout' => 'default',
			'icon' => 'recruitment_wheredidus'
		);

		$items['admin.doctypes.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_DOC_TYPES',
			'view' => 'doctypes',
			'layout' => 'default',
			'icon' => 'recruitment_doctypes'
		);

		$items['admin.genders.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_GENDERS',
			'view' => 'genders',
			'layout' => 'default',
			'icon' => 'recruitment_genders'
		);

		$items['admin.overallranges.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_OVERALL_RANGES',
			'view' => 'overallranges',
			'layout' => 'default',
			'icon' => 'recruitment_overallranges'
		);

		$items['admin.programmes.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_PROGRAMS',
			'view' => 'programmes',
			'layout' => 'default',
			'icon' => 'recruitment_programmes'
		);

		$items['admin.tabs.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_TABS',
			'view' => 'tabs',
			'layout' => 'default',
			'icon' => 'recruitment_tabs'
		);

		$items['admin.jobstatus.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_JOB_STATUS',
			'view' => 'jobstatus',
			'layout' => 'default',
			'icon' => 'recruitment_jobstatus'
		);

		$items['admin.tabsjobs.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_TABS_JOB',
			'view' => 'tabsjobs',
			'layout' => 'default',
			'icon' => 'recruitment_tabsjobs'
		);

		$items['admin.status.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_STATUS',
			'view' => 'status',
			'layout' => 'default',
			'icon' => 'recruitment_status'
		);

		$items['admin.jobs.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_JOBS',
			'view' => 'jobs',
			'layout' => 'default',
			'icon' => 'recruitment_jobs'
		);

		$items['admin.applications.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_APPLICATIONS',
			'view' => 'applications',
			'layout' => 'default',
			'icon' => 'recruitment_applications'
		);

		$items['admin.cpanel.default'] = array(
			'label' => 'RECRUITMENT_LAYOUT_CONTROL_PANEL',
			'view' => 'cpanel',
			'layout' => 'default',
			'icon' => 'recruitment_cpanel'
		);

		$items['site.applications'] = array(
			'label' => 'RECRUITMENT_LAYOUT_APPLICATIONS',
			'view' => 'applications',
			'icon' => 'recruitment_applications'
		);

		$items['site.cpanel'] = array(
			'label' => 'RECRUITMENT_LAYOUT_CONTROL_PANEL',
			'view' => 'cpanel',
			'icon' => 'recruitment_cpanel'
		);

		return $items;
	}

	/**
	* Defines the headers of your template.
	*
	* @access	public static
	*
	* @return	void
	*/
	public static function headerDeclarations()
	{
		if (self::$loaded)
			return;

		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();

		$siteUrl = JURI::root(true);

		$baseSite = 'components/' . COM_RECRUITMENT;
		$baseAdmin = 'administrator/components/' . COM_RECRUITMENT;

		$componentUrl = $siteUrl . '/' . $baseSite;
		$componentUrlAdmin = $siteUrl . '/' . $baseAdmin;

		JHtml::_('jquery.framework');
		JHtml::_('formbehavior.chosen', 'select');

		//JDom::_('framework.hook');
		JDom::_('html.icon.glyphicon');



		//Load the jQuery-Validation-Engine (MIT License, Copyright(c) 2011 Cedric Dugas http://www.position-absolute.com)
		self::addScript($baseAdmin, 'js/jquery.validationEngine.js');
		self::addStyleSheet($baseAdmin, 'css/validationEngine.jquery.css');
		RecruitmentHelperHtmlValidator::loadLanguageScript();
		RecruitmentHelperHtmlValidator::attachForm();


		//CSS
		if ($app->isAdmin())
		{


			self::addStyleSheet($baseAdmin, 'css/recruitment.css');
			self::addStyleSheet($baseAdmin, 'css/toolbar.css');

		}
		else if ($app->isClient('site'))
		{
			self::addStyleSheet($baseSite, 'css/recruitment.css');
			self::addStyleSheet($baseSite, 'css/toolbar.css');

		}



		self::$loaded = true;
	}

	/**
	* Method to include the model paths in the loader.
	*
	* @access	public static
	* @param	string	$extension	The component alias.
	*
	*
	* @since	Cook 3.0.10
	*
	* @return	void
	*/
	public static function loadComponentModels($extension)
	{
		$basePath = (Factory::getApplication()->isClient('site')?JPATH_SITE:JPATH_ADMINISTRATOR);
		CkJModel::addIncludePath($basePath .'/components/com_' . $extension . '/models');
	}

	/**
	* Load the fork file. (Cook Self Service concept)
	*
	* @access	public static
	* @param	string	$file	Current file to fork.
	*
	*
	* @since	Cook 2.6.3
	*
	* @return	void
	*/
	public static function loadFork($file)
	{
		//Transform the file path to reach the fork directory
		$file = preg_replace("#com_recruitment#", 'com_recruitment/fork', $file);

		// Load the fork file.
		if (!empty($file) && file_exists($file))
			include_once($file);
	}

	/**
	* Method to parse a field value.
	*
	* @access	public static
	* @param	Object	$item	The item data object.
	* @param	string	$labelKey	The field key. For concat : {field1} {field2}.
	*
	*
	* @since	Cook 3.0.10
	*
	* @return	mixed	Parsed value.
	*/
	public static function parseValue($item, $labelKey)
	{
		preg_match_all('/{([a-zA-Z0-9_]+)}/', $labelKey, $matches);

		if (!count($matches[0]))
			return $item->$labelKey;

		$replaceFrom = array();
		$replaceTo = array();

		foreach($matches[1] as $key)
		{
			$replaceFrom[] = '{' . $key . '}';
			$replaceTo[] = $item->$key;
		}

		$text = str_replace($replaceFrom, $replaceTo, $labelKey);

		return $text;
	}

	/**
	* Recreate the URL with a redirect in order to : -> keep an good SEF ->
	* always kill the post -> precisely control the request
	*
	* @access	public static
	* @param	array	$vars	The array to override the current request.
	*
	* @return	string	Routed URL.
	*/
	public static function urlRequest($vars = array())
	{
		$parts = array();

		// Authorisated followers
		$authorizedInUrl = array(
					'option' => null,
					'view' => null,
					'layout' => null,
					'format' => null,
					'Itemid' => null,
					'tmpl' => null,
					'object' => null,
					'lang' => null,
					'field' => null,
		);

		$jinput = JFactory::getApplication()->input;

		$request = $jinput->getArray($authorizedInUrl);

		foreach($request as $key => $value)
			if (!empty($value))
				$parts[] = $key . '=' . $value;

		$cid = $jinput->get('cid', array(), 'ARRAY');
		if (!empty($cid))
		{
			$cidVals = implode(",", $cid);
			if ($cidVals != '0')
				$parts[] = 'cid[]=' . $cidVals;
		}

		if (count($vars))
		foreach($vars as $key => $value)
			$parts[] = $key . '=' . $value;

		return JRoute::_("index.php?" . implode("&", $parts), false);
	}


}

// Load the fork
RecruitmentCkHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('RecruitmentHelper')){ class RecruitmentHelper extends RecruitmentCkHelper{} }

