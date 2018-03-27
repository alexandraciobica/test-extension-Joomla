<?php
/**
 * Created by PhpStorm.
 * User: alexandraciobica
 * Date: 26/03/2018
 * Time: 20:13
 */

namespace Joomla\Component\HelloWorld\Site\Model;

use Joomla\CMS\MVC\Model\ItemModel;



class ProfileModel extends ItemModel
{

    public function getProfile($id){

        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('id, name, username, email, registerDate')
            ->from($db->quoteName('#__users'))
            ->where($db->quoteName('id') . ' = ' . $id);
        $db->setQuery($query);

        $result = $db->loadRow();

        $userProfile["name"] = $result[1];
        $userProfile["username"] = $result[2];
        $userProfile["email"] = $result[3];
        $userProfile["registerDate"] = $result[4];
        return $userProfile;
    }
}