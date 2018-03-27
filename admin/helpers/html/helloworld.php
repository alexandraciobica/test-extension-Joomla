<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;
//
JLoader::register('HelloWorldHelper', JPATH_ADMINISTRATOR . '/components/com_helloworld/helpers/helloworld.php');

/**
 * Helloworld HTML helper class.
 *
 * @since  1.6
 */
abstract class JHtmlHelloWorld
{
    /**
     * Build an array of activate states to be used by jgrid.state,
     *
     * @return  array  a list of possible states to display
     *
     * @since  3.0
     */
    public static function activateCustom()
    {

        $states = array(
            1 => array(
                    'task'           => 'public',
                    'text'           => 'activate_public_profile',
                    'active_title'   => 'Deactivate',
                    'tip'            => true,
                    'active_class'   => 'unpublish',
            ),
            0 => array(
                    'task'           => 'unpublic',
                    'text'           => 'deactivate_public_profile',
                    'active_title'   => 'Activate',
                    'tip'            => true,
                    'active_class'   => 'publish',
            )
        );

        return $states;
    }
}
