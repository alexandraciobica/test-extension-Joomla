<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
namespace Joomla\Component\HelloWorld\Administrator\Model;

defined('_JEXEC') or die;

use Joomla\Component\Users\Administrator\Model\UsersModel;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\CMS\Table\Table;

class HelloWorldModel extends UsersModel
{
    public function __construct($config = array(), MVCFactoryInterface $factory = null)
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'name', 'a.name',
                'username', 'a.username',
                'email', 'a.email',
                'publicProfile', 'a.publicProfile',
            );
        }

        parent::__construct($config, $factory);
    }

    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param   string  $type    The table type to instantiate
     * @param   string  $prefix  A prefix for the table class name. Optional.
     * @param   array   $config  Configuration array for model. Optional.
     *
     * @return  Table  A database object
     *
     * @since   1.6
     */
    public function getTable($type = 'User', $prefix = 'Joomla\\CMS\\Table\\', $config = array())
    {
            $table = Table::getInstance($type, $prefix, $config);

            return $table;
    }

    /**
     * @param $pks
     * @param bool $value
     * @return bool
     */
    public function public(&$pks, $value = 1)
    {
        $user       = \JFactory::getUser();

        // Check if I am a Super Admin
        $iAmSuperAdmin = $user->authorise('core.admin');
        $table         = $this->getTable();
        $pks           = (array) $pks;

        if ($value == 1){
            $value = 0;
        } else {
            $value = 1;
        }

        foreach ($pks as $i => $pk)
        {
            $table->load($pk);

            if ($iAmSuperAdmin)
            {
                $table->publicProfile = (int) $value;

                // Allow an exception to be thrown.
                try
                {
                    if (!$table->check())
                    {
                        $this->setError($table->getError());
                        return false;
                    }

                    // Store the table.
                    if (!$table->store())
                    {
                        $this->setError($table->getError());
                        return false;
                    }
                }
                catch (\Exception $e)
                {
                    $this->setError($e->getMessage());
                    return false;
                }
            }
        }
        return true;
    }
}