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

<h1>Profile</h1>

Name: <?php echo $this->userProfile["name"];?> <br/>
Username: <?php echo $this->userProfile["username"];?> <br/>
Email: <?php echo $this->userProfile["email"];?> <br/>
Register date: <?php echo $this->userProfile["registerDate"];?> <br/>
