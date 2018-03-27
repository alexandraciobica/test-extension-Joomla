<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_config
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\HelloWorld\Administrator\View\HelloWorld;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;


/**
 * View for the global configuration
 *
 * @since  3.2
 */
class HtmlView extends BaseHtmlView
{

    public $state;

    /**
     * The item data.
     *
     * @var   object
     */
    protected $items;

    /**
     * Execute and display a template script.
     *
     * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  mixed  A string if successful, otherwise an Error object.
     *
     * @see     \JViewLegacy::loadTemplate()
     * @since   3.0
     */
    public function display($tpl = null)
    {
        $this->items         = $this->get('Items');
        $this->state         = $this->get('State');

        $user       = \JFactory::getUser();

        $this->iAmSuperAdmin = $user->authorise('core.admin');

        return parent::display($tpl);
    }

}
