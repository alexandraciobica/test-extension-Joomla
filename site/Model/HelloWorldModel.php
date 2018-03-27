<?php
/**
 * Created by PhpStorm.
 * User: alexandraciobica
 * Date: 23/03/2018
 * Time: 10:36
 */
namespace Joomla\Component\HelloWorld\Site\Model;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class HelloWorldModel extends ListModel
{

    public function getUsersList()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__users'))
            ->where($db->quoteName('publicProfile') . ' = 1');
        $db->setQuery($query);

        $results = $db->loadRowList();

        $usersList = [];
        foreach($results as $k => $res)
        {
            $usersList[$k]['id'] = $res[0];
            $usersList[$k]['name'] = $res[1];
            $usersList[$k]['username'] = $res[2];
            $usersList[$k]['email'] = $res[3];
            $usersList[$k]['registerDate'] = $res[7];
        }

        return $usersList;

    }

}