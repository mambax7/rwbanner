<?php
/**
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright    XOOPS Project (https://xoops.org)
 * @license      {@link https://www.gnu.org/licenses/gpl-2.0.html GNU Public License}
 * @author       XOOPS Development Team
 **/

use Xmf\Module\Admin;
use XoopsModules\Rwbanner\{Helper
};

/** @var Admin $adminObject */
/** @var Helper $helper */

require dirname(__DIR__) . '/preloads/autoloader.php';

require dirname(__DIR__, 3) . '/include/cp_header.php';
//require dirname(__DIR__, 3) . '/class/xoopsformloader.php';
require dirname(__DIR__) . '/include/common.php';

$moduleDirName      = basename(dirname(__DIR__));
$moduleDirNameUpper = mb_strtoupper($moduleDirName);
$helper             = Helper::getInstance();

$adminObject = Admin::getInstance();

// Load language files
$helper->loadLanguage('admin');
$helper->loadLanguage('modinfo');
$helper->loadLanguage('common');
$helper->loadLanguage('main');

$path = dirname(__DIR__, 3);
require_once $path . '/mainfile.php';
require_once $path . '/header.php';
require_once $path . '/include/cp_functions.php';
require_once $path . '/include/cp_header.php';

require_once $path . '/kernel/module.php';
require_once $path . '/class/xoopstree.php';
require_once $path . '/class/xoopslists.php';
require_once $path . '/class/xoopsformloader.php';
require_once $path . '/class/pagenav.php';

$dirname = \basename(\dirname(__DIR__));
/** @var \XoopsModuleHandler $moduleHandler */
$moduleHandler = xoops_getHandler('module');
$module        = $moduleHandler->getByDirname($dirname);

if (is_object($xoopsUser)) {
    $xoopsModule = XoopsModule::getByDirname($dirname);
    if (!$xoopsUser->isAdmin($xoopsModule->mid())) {
        redirect_header(XOOPS_URL . '/', 1, _MD_RWBANNER_NOPERM);
    }
} else {
    redirect_header(XOOPS_URL . '/', 1, _MD_RWBANNER_NOPERM);
}

global $xoopsModule;

//$moduleDirName = $GLOBALS['xoopsModule']->getVar('dirname');

//if functions.php file exist
require_once dirname(__DIR__) . '/include/functions.php';
$myts = \MyTextSanitizer::getInstance();

//$xoopsTpl->assign('module_dir', $module->getVar('dirname'));




