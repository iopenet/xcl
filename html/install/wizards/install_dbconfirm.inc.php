<?php
/**
 *
 * @package Legacy
 * @version $Id: install_dbconfirm.inc.php,v 1.3 2008/09/25 15:12:34 kilica Exp $
 * @copyright Copyright 2005-2020 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */
include_once './class/settingmanager.php';

$sm = new setting_manager(true);

$content = $sm->checkData();
if (!empty($content)) {
    $wizard->setTitle(_INSTALL_L93);
    $wizard->setContent($content . $sm->editform());
    $wizard->setNext(['dbconfirm', _INSTALL_L91]);
} else {
    $wizard->setContent($sm->confirmForm());
}
$wizard->render();
