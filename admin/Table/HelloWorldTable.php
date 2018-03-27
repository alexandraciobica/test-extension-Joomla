<?php
/**
 * Created by PhpStorm.
 * User: alexandraciobica
 * Date: 23/03/2018
 * Time: 15:39
 */

namespace Joomla\Component\HelloWorld\Administrator\Table;

use Joomla\CMS\Table\Table;


/**
 * Class HelloWorldTable
 * @package Joomla\Component\HelloWorld\Administrator\Table
 */
class HelloWorldTable extends Table
{

    /**
     * HelloWorldTable constructor.
     * @param \JDatabaseDriver $db
     */
    public function __construct(\JDatabaseDriver $db)
    {
        parent::__construct('#__helloworld', 'id', $db);
    }
}