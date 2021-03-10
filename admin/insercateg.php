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
use XoopsModules\Rwbanner\{
    Category
};

require_once __DIR__ . '/admin_header.php';

require_once XOOPS_ROOT_PATH . '/include/cp_functions.php';

$op = $_GET['op'] ?? ($_POST['op'] ?? '');
$id = $_GET['id'] ?? ($_POST['id'] ?? '');

if (isset($_POST['post'])) {
    $op = 'grava';
}
$form = $_POST['form'] ?? '';

global $xoopsDB;
switch ($op) {
    case 'grava':
        if ($_POST['post'] == _AM_RWBANNER_BTN_OP1) {
            $cat = new Category($form);
            if ($cat->grava()) {
                redirect_header('main.php', 1, _AM_RWBANNER_MSG5);
            } else {
                redirect_header('index.php', 1, _AM_RWBANNER_MSG6 . '<br>' . $cat->getError());
            }
        } elseif ($_POST['post'] == _AM_RWBANNER_BTN_OP2) {
            $cat = new Category($form);
            if ($cat->edita()) {
                redirect_header('main.php', 1, _AM_RWBANNER_MSG4);
            } else {
                redirect_header('index.php', 1, _AM_RWBANNER_MSG7 . '<br>' . $cat->getError());
            }
        }
        break;
    case 'editar_categ':
        xoops_cp_header();
        // rwbanner_adminMenu('','Editando Category codigo: '.$id);
        $cat = new Category(null, $id);
        $cat->clearDb();
        foreach ($cat as $key => $value) {
            $form[$key] = $value;
        }
        //echo '<br><br><br><br><br><br>';
        monta_form(_AM_RWBANNER_BTN_OP2);
        xoops_cp_footer();
        break;
    default:
        xoops_cp_header();
        $adminObject = Admin::getInstance();
        $adminObject->displayNavigation('insercateg.php');
        // rwbanner_adminMenu(2,_AM_RWBANNER_VALUE_BTN5);
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
    global $form;
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $id = '';

    $banner_form = new \XoopsThemeForm(_AM_RWBANNER_TITLE38, 'form', 'insercateg.php', 'post', false);
    $banner_form->setExtra('enctype="multipart/form-data"');
    $titulo  = new \XoopsFormText(_AM_RWBANNER_TITLE31, 'form[titulo]', 50, 255, ($form['titulo'] ?? ''));
    $largura = new \XoopsFormText(_AM_RWBANNER_TITLE32, 'form[larg]', 10, 255, ($form['larg'] ?? ''));
    $altura  = new \XoopsFormText(_AM_RWBANNER_TITLE33, 'form[alt]', 10, 255, ($form['alt'] ?? ''));

    $button_tray = new \XoopsFormElementTray('', '');
    if ($value == _AM_RWBANNER_BTN_OP2) {
        // bug fix - luciorota

        $id = new \XoopsFormHidden('form[cod]', $form['cod']);
    }
    $submit_btn = new \XoopsFormButton('', 'post', $value, 'submit');

    $banner_form->addElement($titulo);
    $banner_form->addElement($largura);
    $banner_form->addElement($altura);
    $button_tray->addElement($submit_btn);
    $banner_form->addElement($button_tray);
    $banner_form->addElement($id);
    $banner_form->display();
}
