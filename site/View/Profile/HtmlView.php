<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\HelloWorld\Site\View\Profile;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class HtmlView extends BaseHtmlView
{

	/**
	 * Display the Profile view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
	    $model = $this->getModel();
        $this->userProfile = $model->getProfile($_GET['userid']);

        parent::display($tpl);
	}
}
