<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html/helloworld.php');
include JPATH_COMPONENT . '/helpers/html/helloworld.php';
?>

<form action="<?php echo JRoute::_('index.php?option=com_helloworld'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="row">
        <div class="col-md-10">
            <div id="j-main-container" class="j-main-container">
                <?php if (empty($this->items)) : ?>
                    <joomla-alert type="warning"><?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?></joomla-alert>
                <?php else : ?>
                    <table class="table table-striped" id="userList">
                        <thead>
                            <tr>
                                <th class="nowrap text-center">
                                    #
                                </th>
                                <th class="nowrap text-center">
                                    Name
                                </th>
                                <th class="nowrap text-center">
                                    Username
                                </th>
                                <th class="nowrap text-center">
                                    ID

                                </th>
                                <th class="nowrap text-center">
                                    Public profile
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->items as $i => $item) :?>
                            <tr class="row<?php echo $i % 2; ?>">
                                <td class="text-center">
                                    <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $this->escape($item->name); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $this->escape($item->username); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo (int) $item->id; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo \JHtml::_('jgrid.state', JHtmlHelloWorld::activateCustom(), $item->publicProfile, $i, 'helloWorld.', $this->iAmSuperAdmin);?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

                <input type="hidden" name="task" value=""/>
                <input type="hidden" name="boxchecked" value="0"/>
                <?php echo JHtml::_('form.token'); ?>
            </div>
        </div>
    </div>
</form>

