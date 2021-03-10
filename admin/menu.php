<?php
/*
                                  RW-Banner
                          Copyright (c) 2006 BrInfo
                          <http://www.brinfo.com.br>
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  You may not change or alter any portion of this comment or credits
  of supporting developers from this source code or any supporting
  source code which is considered copyrighted (c) material of the
  original comment or credit authors.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA
*/

/**
 * XOOPS rwbanner Admin menu
 *
 * @copyright::  {@link www.brinfo.com.br BrInfo - Soluções Web}
 * @license  ::    {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author   ::     Rodrigo Pereira Lima aka RpLima (http://www.brinfo.com.br)
 * @package  ::    rwbanner
 *
 */

use Xmf\Module\Admin;
use XoopsModules\Rwbanner\{Helper
};

/** @var Admin $adminObject */
/** @var Helper $helper */

include dirname(__DIR__) . '/preloads/autoloader.php';

$moduleDirName      = basename(dirname(__DIR__));
$moduleDirNameUpper = mb_strtoupper($moduleDirName);

$helper = Helper::getInstance();
$helper->loadLanguage('admin');
$helper->loadLanguage('common');
$helper->loadLanguage('feedback');

$pathIcon32    = Admin::menuIconPath('');
$pathModIcon32 = XOOPS_URL . '/modules/' . $moduleDirName . '/assets/images/icons/32/';
if (is_object($helper->getModule()) && false !== $helper->getModule()->getInfo('modicons32')) {
    $pathModIcon32 = $helper->url($helper->getModule()->getInfo('modicons32'));
}

$adminmenu[] = [
    'title' => _MI_RWBANNER_MENU_TITLE0,
    'link'  => 'admin/index.php',
    'icon'  => $pathIcon32 . '/home.png',
];

$adminmenu[] = [
    'title' => _MI_RWBANNER_MENU_TITLE1,
    'link'  => 'admin/main.php',
    'icon'  => $pathIcon32 . '/manage.png',
];

//++$i;
//$adminmenu[$i]["title"] = _MI_RWBANNER_MENU_TITLE2;
//$adminmenu[$i]["link"] = "admin/myblocksadmin.php";
//$adminmenu[$i]["icon"] = $pathIcon32.'/block.png';

$adminmenu[] = [
    'title' => _MI_RWBANNER_MENU_TITLE3,
    'link'  => 'admin/inser.php',
    'icon'  => '././assets/images/icon/32/page_add.png',
];

$adminmenu[] = [
    'title' => _MI_RWBANNER_MENU_TITLE4,
    'link'  => 'admin/insercateg.php',
    'icon'  => $pathIcon32 . '/categoryadd.png',
];

$adminmenu[] = [
    'title' => _MI_RWBANNER_MENU_TITLE8,
    'link'  => 'admin/insertag.php',
    'icon'  => '././assets/images/icon/32/tag_blue_add.png',
];

$adminmenu[] = [
    'title' => _AM_RWBANNER_IMPORT,
    'link'  => 'admin/import.php',
    'icon'  => $pathIcon32 . '/download.png',
];

// Blocks Admin
$adminmenu[] = [
    'title' => constant('CO_' . $moduleDirNameUpper . '_' . 'BLOCKS'),
    'link'  => 'admin/blocksadmin.php',
    'icon'  => $pathIcon32 . '/block.png',
];

//++$i;
//$adminmenu[$i]["title"] = _AM_RWBANNER_PERMISSIONS;
//$adminmenu[$i]["link"] = "admin/permissions.php";
//$adminmenu[$i]["icon"] = $pathIcon32.'/permissions.png';

//++$i;
//$adminmenu[$i]["title"] = _MI_RWBANNER_MENU_TITLE6;
//$adminmenu[$i]["link"] = "admin/about2.php";
//$adminmenu[$i]["icon"] = $pathIcon32.'/about.png';

$adminmenu[] = [
    'title' => _MI_RWBANNER_MENU_TITLE6,
    'link'  => 'admin/about.php',
    'icon'  => $pathIcon32 . '/about.png',
];
