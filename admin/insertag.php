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

use Xmf\Module\Admin;
use XoopsModules\Rwbanner\{Tag
};

require_once __DIR__ . '/admin_header.php';

require_once XOOPS_ROOT_PATH . '/include/cp_functions.php';

$op = $_GET['op'] ?? ($_POST['op'] ?? '');
$id = $_GET['id'] ?? ($_POST['id'] ?? '');

if (isset($_POST['post'])) {
    $op = 'grava';
}
$form = $_POST['form'] ?? [];

global $xoopsDB;
switch ($op) {
    case 'grava':
        if (_AM_RWBANNER_BTN_OP1 == $_POST['post']) {
            $form['modid'] = serialize($form['modid']);
            $tag           = new Tag($form);
            if ($tag->grava()) {
                redirect_header('index.php', 1, _AM_RWBANNER_MSG22);
            } else {
                redirect_header('index.php', 1, _AM_RWBANNER_MSG23);
            }
        } elseif (_AM_RWBANNER_BTN_OP2 == $_POST['post']) {
            $form['modid'] = serialize($form['modid']);
            $tag           = new Tag($form);
            if ($tag->edita()) {
                redirect_header('index.php', 1, _AM_RWBANNER_MSG24);
            } else {
                redirect_header('index.php', 1, _AM_RWBANNER_MSG25 . '<br>' . $tag->getError());
            }
        }
        break;
    case 'editar_tag':
        xoops_cp_header();
        // rwbanner_adminMenu('','Modifico Tag: '.$id);
        $tag = new Tag(null, $id);
        $tag->clearDb();
        foreach ($tag as $key => $value) {
            $form[$key] = $value;
        }
        //echo '<br><br><br><br><br><br>';
        monta_form(_AM_RWBANNER_BTN_OP2);
        xoops_cp_footer();
        break;
    default:
        xoops_cp_header();
        // rwbanner_adminMenu(5,_AM_RWBANNER_VALUE_BTN12);
        $adminObject = Admin::getInstance();
        $adminObject->displayNavigation('insertag.php');
        //echo '<br><br><br><br><br><br>';
        monta_form(_AM_RWBANNER_BTN_OP1);
        xoops_cp_footer();
        break;
}

/**
 * @param $value
 */
function monta_form($value)
{
    global $xoopsDB, $form;
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
    $id = '';

    $banner_form = new \XoopsThemeForm(_AM_RWBANNER_TAG_TITLE08, 'form', 'insertag.php', 'post', false);

    $title = new \XoopsFormText(_AM_RWBANNER_TAG_TITLE09, 'form[title]', 50, 255, ($form['title'] ?? ''));
    $name1 = new \XoopsFormText(_AM_RWBANNER_TAG_TITLE14, 'form[name]', 50, 255, ($form['name'] ?? ''));
    $name1->setDescription(_AM_RWBANNER_TAG_TITLE15);
    $codbanner = new \XoopsFormText(_AM_RWBANNER_TAG_TITLE22, 'form[codbanner]', 10, 255, ($form['codbanner'] ?? ''));
    $codbanner->setDescription(_AM_RWBANNER_TAG_TITLE23);
    $categ = new \XoopsFormSelect(_AM_RWBANNER_TAG_TITLE10, 'form[categ]', ($form['categ'] ?? ''));
    $categ->addOption(0, _AM_RWBANNER_TAG_TITLE13);
    //mb ---------------------------
    $db = \XoopsDatabaseFactory::getDatabaseConnection();

    $myDB = $db->prefix('rwbanner_categorias');
    //  $sql = "SELECT titulo,cod FROM ".$xoopsDB->prefix("rwbanner_categorias");
    $sql      = 'SELECT titulo, cod FROM ' . $myDB;
    $consulta = $xoopsDB->queryF($sql);
    while (list($titulo, $cod) = $xoopsDB->fetchRow($consulta)) {
        $categ->addOption($cod, $titulo);
    }

    $form['modid'] = unserialize(($form['modid'] ?? ''));
    $mid_selbox    = new \XoopsFormSelect(_AM_RWBANNER_TAG_TITLE16, 'form[modid]', $form['modid'], 5, true);
    $mid_selbox->addOption(0, _AM_RWBANNER_TAG_TITLE17);
    $sql    = 'SELECT mid,name FROM ' . $xoopsDB->prefix('modules') . ' WHERE (hasmain="1" or mid="1") and isactive="1" and (weight!="0" or mid="1") ORDER BY name';
    $result = $xoopsDB->queryF($sql);
    while (list($mid, $name) = $xoopsDB->fetchRow($result)) {
        $mid_selbox->addOption($mid, $name);
    }
    $mid_selbox->setDescription(_AM_RWBANNER_TITLE37);

    $qtde = new \XoopsFormText(_AM_RWBANNER_TAG_TITLE11, 'form[qtde]', 10, 255, ($form['qtde'] ?? ''));
    $cols = new \XoopsFormText(_AM_RWBANNER_TAG_TITLE12, 'form[cols]', 10, 255, ($form['cols'] ?? ''));

    $obs = new \XoopsFormTextArea(_AM_RWBANNER_TAG_TITLE20, 'form[obs]', ($form['obs'] ?? ''));
    $obs->setDescription(_AM_RWBANNER_TAG_TITLE21);

    $status = new \XoopsFormSelect(_AM_RWBANNER_TAG_TITLE18, 'form[status]', ($form['status'] ?? ''));
    $status->addOption(1, _AM_RWBANNER_TAG_STATUS1);
    $status->addOption(0, _AM_RWBANNER_TAG_STATUS2);

    $button_tray = new \XoopsFormElementTray('', '');
    if (_AM_RWBANNER_BTN_OP4 == $value) {
        // bug fix - luciorota

        $id = new \XoopsFormHidden('form[id]', $form['id']);
    }
    $submit_btn = new \XoopsFormButton('', 'post', $value, 'submit');

    $banner_form->addElement($title);
    $banner_form->addElement($name1);
    $banner_form->addElement($codbanner);
    $banner_form->addElement($categ);
    $banner_form->addElement($mid_selbox);
    $banner_form->addElement($qtde);
    $banner_form->addElement($cols);
    $banner_form->addElement($obs);
    $banner_form->addElement($status);
    $button_tray->addElement($submit_btn);
    $banner_form->addElement($button_tray);
    $banner_form->addElement($id);
    $banner_form->display();
}
