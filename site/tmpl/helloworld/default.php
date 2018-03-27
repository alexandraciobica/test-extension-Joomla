<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<h1>Users with public profile</h1>
<ul>
    <?php foreach ($this->usersList as $i => $user) :?>
        <li>
            <a href="<?php echo JRoute::_('index.php?option=com_helloworld&view=profile&userid=' . $user["id"]) ?>">
                <?php echo $user["name"]?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

