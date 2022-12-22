<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_recruitment
 *
 * @copyright   Copyright (C) 
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\CategoryFactory;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\HTML\Registry;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Component\Recruitment\Administrator\Extension\RecruitmentComponent;

/**
 * The recruitment service provider.
 * https://github.com/joomla/joomla-cms/pull/20217
 *
 * @since  __BUMP_VERSION__
 */
return new class implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   __BUMP_VERSION__
	 */
	public function register(Container $container)
	{
		$container->registerServiceProvider(new CategoryFactory('\\Joomla\\Component\\Recruitment'));
		$container->registerServiceProvider(new MVCFactory('\\Joomla\\Component\\Recruitment'));
		$container->registerServiceProvider(new ComponentDispatcherFactory('\\Joomla\\Component\\Recruitment'));

		$container->set(
			ComponentInterface::class,
			function (Container $container) {
				$component = new RecruitmentComponent($container->get(ComponentDispatcherFactoryInterface::class));

				$component->setRegistry($container->get(Registry::class));

				return $component;
			}
		);
	}
};
