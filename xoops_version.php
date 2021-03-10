<?php
//  ------------------------------------------------------------------------ //
//                                  RW-Banner                                //
//                    Copyright (c) 2006 BrInfo                              //
//                     <http://www.brinfo.com.br>                            //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- //
// Author: Rodrigo Pereira Lima (BrInfo - Soluções Web)                      //
// Site: http://www.brinfo.com.br                                            //
// Project: RW-Banner                                                        //
// Descrição: Sistema de gerenciamento de mídias publicitárias               //
// ------------------------------------------------------------------------- //

// some bug fixes by luciorota <lucio.rota@gmail.com>

$moduleDirName      = basename(__DIR__);
$moduleDirNameUpper = mb_strtoupper($moduleDirName);

$modversion['name']           = _MI_RWBANNER_NAME;
$modversion['version']        = '1.51';
$modversion['description']    = _MI_RWBANNER_DESC;
$modversion['author']         = 'TheRpLima [Rodrigo Pereira Lima] ';
$modversion['credits']        = 'BrInfo - Soluções Web na medida certa pra você e sua empresa.';
$modversion['help']           = 'page=help';
$modversion['license']        = 'GNU GPL 2.0';
$modversion['license_url']    = 'www.gnu.org/licenses/gpl-2.0.html';
$modversion['official']       = 0; //1 indicates supported by XOOPS Dev Team, 0 means 3rd party supported
$modversion['image']          = 'assets/images/logoModule.png';
$modversion['dirname']        = basename(__DIR__);
$modversion['dirmoduleadmin'] = '/Frameworks/moduleclasses/moduleadmin';
$modversion['icons16']        = '../../Frameworks/moduleclasses/icons/16';
$modversion['icons32']        = '../../Frameworks/moduleclasses/icons/32';

//about
$modversion['module_status']       = 'Beta 3';
$modversion['release_date']        = '2016/04/05';
$modversion['module_website_url']  = 'www.xoops.org/';
$modversion['module_website_name'] = 'XOOPS';
$modversion['author_website_url']  = 'http://www.brinfo.com.br';
$modversion['author_website_name'] = 'TheRpLima [Rodrigo Pereira Lima]';
$modversion['min_php']             = '7.2';
$modversion['min_xoops']           = '2.5.10';
$modversion['min_admin']           = '1.2';
$modversion['min_db']              = ['mysql' => '5.5'];

//$modversion['onInstall'] = 'install.php';

//Definições da classe about
$modversion['developer_lead']         = 'TheRpLima [Rodrigo Pereira Lima]';
$modversion['developer_contributor']  = '';
$modversion['developer_website_url']  = 'http://www.brinfo.com.br';
$modversion['developer_website_name'] = 'BrInfo - Soluções Web na medida certa pra você e sua empresa.';
$modversion['developer_email']        = 'rodrigo@brinfo.com.br';
$modversion['status_version']         = 'RC2'; // big fixes by luciorota
$modversion['status']                 = 'RC2'; // big fixes by luciorota
$modversion['date']                   = '08/01/2009'; // big fixes by luciorota
//$modversion['warning']                = _MI_RWBANNER_WARNING_RC;
$modversion['demo_site_url']     = 'http://rwbanner.brinfo.com.br';
$modversion['demo_site_name']    = 'Página de Demonstração do RW-Banner';
$modversion['support_site_url']  = 'http://rwbanner.brinfo.com.br/modules/newbb/';
$modversion['support_site_name'] = 'Suporte Oficial do RW-BANNER';
$modversion['submit_bug']        = 'http://rwbanner.brinfo.com.br/modules/newbb/viewforum.php?forum=3';
$modversion['submit_feature']    = 'http://rwbanner.brinfo.com.br/modules/newbb/viewforum.php?forum=2';
//$modversion['author_word']            = _MI_RWBANNER_AUTHOR_WORD_DESC;
//$modversion['version_history']        = _MI_RWBANNER_HISTORY;

// ------------------- Help files ------------------- //
$modversion['help']        = 'page=help';
$modversion['helpsection'] = [
    ['name' => _MI_RWBANNER_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_RWBANNER_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_RWBANNER_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_RWBANNER_SUPPORT, 'link' => 'page=support'],
];

// ------------------- Mysql ------------------- //
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables created by sql file (without prefix!)
$modversion['tables'] = [
    $moduleDirName . '_' . 'banner',
    $moduleDirName . '_' . 'categorias',
    $moduleDirName . '_' . 'tags',
];

// Admin
$modversion['hasAdmin']    = 1;
$modversion['adminindex']  = 'admin/index.php';
$modversion['adminmenu']   = 'admin/menu.php';
$modversion['system_menu'] = 1;

// Menu.
$modversion['hasMain'] = 1;
global $xoopsModuleConfig, $xoopsUser;
$show = (isset($xoopsModuleConfig['show_cad_form']) && 1 == $xoopsModuleConfig['show_cad_form']) ? 1 : 0;
if ($show && $xoopsUser) {
    $modversion['sub'][1]['name'] = _MI_RWBANNER_MENU_TITLE3;
    $modversion['sub'][1]['url']  = 'inser.php';
}

//Blocks
$modversion['blocks'][] = [
    'file'        => 'banner.php',
    'name'        => _MI_RWBANNER_BLOCK1_NAME,
    'description' => _MI_RWBANNER_BLOCK1_NAME_DESC,
    'can_clone'   => true,
    'show_func'   => 'exibe_banner',
    'edit_func'   => 'edita_banner',
    'options'     => '1|1|1|1',
    'template'    => 'block_banner.tpl',
];

$modversion['blocks'][] = [
    'file'        => 'estatisticas.php',
    'name'        => _MI_RWBANNER_BLOCK2_NAME,
    'description' => _MI_RWBANNER_BLOCK2_NAME_DESC,
    'show_func'   => 'estatisticas_banner',
    'template'    => 'block_estatisticas_banner.tpl',
];

$modversion['blocks'][] = [
    'file'        => 'popadbanner.php',
    'name'        => _MI_RWBANNER_BLOCK3_NAME,
    'description' => _MI_RWBANNER_BLOCK3_NAME_DESC,
    'can_clone'   => true,
    'show_func'   => 'exibe_adbanner',
    'edit_func'   => 'edita_adbanner',
    'options'     => '1|1|1|10|1|F0FFF0|008000|0|1|',
    'template'    => 'block_popad_banner.tpl',
];

$modversion['blocks'][] = [
    'file'        => 'ajaxbanner.php',
    'name'        => _MI_RWBANNER_BLOCK4_NAME,
    'description' => _MI_RWBANNER_BLOCK4_NAME_DESC,
    'can_clone'   => true,
    'show_func'   => 'exibe_ajaxbanner',
    'edit_func'   => 'edita_ajaxbanner',
    'options'     => '1|1|1|30000',
    'template'    => 'block_ajax_banner.tpl',
];
/*
$modversion['blocks'][] = [
'file' =>  "banner_plugins.php",
'name' =>  'Plugin Banner',
'description' =>  'Exibe banner com conteúdo de outros módulos',
'can_clone' =>  true ,
'show_func' =>  "exibe_plugin_banner",
'edit_func' =>  "edita_plugin_banner",
'options' =>  "|1|1",
'template' =>  'block_plugin_banner.tpl',
];
*/

$modversion['blocks'][] = [
    'file'        => 'dropinbanner.php',
    'name'        => _MI_RWBANNER_BLOCK5_NAME,
    'description' => _MI_RWBANNER_BLOCK5_NAME_DESC,
    'can_clone'   => true,
    'show_func'   => 'exibe_dropbanner',
    'edit_func'   => 'edita_dropbanner',
    'options'     => '1|1|1|1|5|up|200|100|ED710F|',
    'template'    => 'block_dropin_banner.tpl',
];

$modversion['blocks'][] = [
    'file'        => 'lightboxbanner.php',
    'name'        => _MI_RWBANNER_BLOCK6_NAME,
    'description' => _MI_RWBANNER_BLOCK6_NAME_DESC,
    'can_clone'   => true,
    'show_func'   => 'exibe_lightboxbanner',
    'edit_func'   => 'edita_lightboxbanner',
    'options'     => '1|1|5|',
    'template'    => 'block_lightbox_banner.tpl',
];

//Configs
$modversion['config'][] = [
    'name'        => 'dir_images',
    'title'       => '_MI_RWBANNER_DIRIMAGES',
    'description' => '_MI_RWBANNER_DIRIMAGES_DESC',
    'formtype'    => 'texbox',
    'valuetype'   => 'text',
    'default'     => XOOPS_ROOT_PATH . '/uploads/' . $modversion['dirname'],
];

$modversion['config'][] = [
    'name'        => 'show_cad_form',
    'title'       => '_MI_RWBANNER_SHOWCADFORM',
    'description' => '_MI_RWBANNER_SHOWCADFORM_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];

$modversion['config'][] = [
    'name'        => 'total_reg_index',
    'title'       => '_MI_RWBANNER_NUMREGISTROS',
    'description' => '_MI_RWBANNER_NUMREGISTROS_DESC',
    'formtype'    => 'texbox',
    'valuetype'   => 'int',
    'default'     => 10,
];

$modversion['config'][] = [
    'name'        => 'perm_client',
    'title'       => '_MI_RWBANNER_PERMCLIENT',
    'description' => '_MI_RWBANNER_PERMCLIENT_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];

$modversion['config'][] = [
    'name'        => 'campos_perm',
    'title'       => '_MI_RWBANNER_CAMPOSPERM',
    'description' => '_MI_RWBANNER_CAMPOSPERM_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => [
        '_MI_RWBANNER_USER_OPT0' => 'maxexib',
        '_MI_RWBANNER_USER_OPT1' => 'maxclick',
        '_MI_RWBANNER_USER_OPT2' => 'periodo',
        '_MI_RWBANNER_USER_OPT3' => 'grafico',
        '_MI_RWBANNER_USER_OPT4' => 'url',
    ],
    'default'     => ['url'],
];
/**
 * Make Sample button visible?
 */
$modversion['config'][] = [
    'name'        => 'displaySampleButton',
    'title'       => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON',
    'description' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];

/**
 * Show Developer Tools?
 */
$modversion['config'][] = [
    'name'        => 'displayDeveloperTools',
    'title'       => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_DEV_TOOLS',
    'description' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_DEV_TOOLS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
