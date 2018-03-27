<?php
/**
 * Created by PhpStorm.
 * User: alexandraciobica
 * Date: 24/03/2018
 * Time: 11:09
 */

namespace Joomla\Component\HelloWorld\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController as BaseController;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\Utilities\ArrayHelper;

class HelloWorldController extends BaseController
{
    /**
     * HelloWorldController constructor.
     * @param array $config
     * @param MVCFactoryInterface|null $factory
     * @param null $app
     * @param null $input
     */
    public function __construct($config = array(), MVCFactoryInterface $factory = null, $app = null, $input = null)
    {
        parent::__construct($config, $factory, $app, $input);

        $this->registerTask('public', 'changePublicProfile');
        $this->registerTask('unpublic', 'changePublicProfile');
    }

    /**
     *
     * @param   string  $name    The model name. Optional.
     * @param   string  $prefix  The class prefix. Optional.
     * @param   array   $config  Configuration array for model. Optional.
     *
     * @return  object  The model.
     *
     * @since   1.6
     */
    public function getModel($name = 'HelloWorld', $prefix = 'Administrator', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);

        return $model;
    }

    public function changePublicProfile()
    {
        // Check for request forgeries.
        \JSession::checkToken() or jexit(\JText::_('JINVALID_TOKEN'));

        $ids    = $this->input->get('cid', array(), 'array');
        $values = array('public' => 1, 'unpublic' => 0);
        $task   = $this->getTask();
        $value  = ArrayHelper::getValue($values, $task, 0, 'int');

        // Get the model.
        $model = $this->getModel();

        // Change the state of the records.
        if (!$model->public($ids, $value))
        {
            $this->setMessage($model->getError(), 'error');
        }
        else
        {
            if ($value == 1)
            {
                $this->setMessage('User profile made ubpublic.');
            }
            elseif ($value == 0)
            {
                $this->setMessage('User profile made public.');
            }
        }

        $this->setRedirect('index.php?option=com_helloworld');
    }

}