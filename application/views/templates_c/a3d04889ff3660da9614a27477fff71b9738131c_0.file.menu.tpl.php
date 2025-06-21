<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 09:39:20
  from "/var/www/html/WORKS/BTCCLUB/application/views/layout/menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68523bf097fe61_37397634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3d04889ff3660da9614a27477fff71b9738131c' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/layout/menu.tpl',
      1 => 1747906899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68523bf097fe61_37397634 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="sidebar" class="app-sidebar">
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <div class="menu">
            
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SIDE_MENU']->value, 'category', false, 'cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value => $_smarty_tpl->tpl_vars['category']->value) {
?>
         
            <div class="menu-header"><?php echo lang($_smarty_tpl->tpl_vars['cat']->value);?>
</div>
            <?php $_smarty_tpl->_assignInScope('counter', 0);
?>
            <?php $_smarty_tpl->_assignInScope('sub_menu_count', 0);
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <?php $_smarty_tpl->_assignInScope('sub_menu_count', count($_smarty_tpl->tpl_vars['v']->value['submenu']));
?> 
            <?php if (!$_smarty_tpl->tpl_vars['sub_menu_count']->value) {?>
            <div class="menu-item <?php if ($_smarty_tpl->tpl_vars['v']->value['is_selected'] == 'active') {?>active<?php }?>">
                <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['link'];?>
" class="menu-link">
                    <span class="menu-icon"><i class="<?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
 "></i></span>
                    <span class="menu-text"><?php echo lang($_smarty_tpl->tpl_vars['v']->value['text']);?>
</span>
                </a>
            </div>
            <?php } else { ?>
            <div class="menu-item has-sub <?php if ($_smarty_tpl->tpl_vars['v']->value['is_selected'] == 'active') {?>expand<?php }?>">
                <a href="#" class="menu-link">
                    <span class="menu-icon">
                        <i class=" <?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
"></i>
                    </span>
                    <span class="menu-text"><?php echo lang($_smarty_tpl->tpl_vars['v']->value['text']);?>
</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v']->value['submenu'], 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
                    <div class="menu-item <?php echo $_smarty_tpl->tpl_vars['i']->value['is_selected'];?>
">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['i']->value['link'];?>
" class="menu-link">
                            <span class="menu-text"><?php echo lang($_smarty_tpl->tpl_vars['i']->value['text']);?>
</span>
                        </a>
                    </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


                </div>
            </div>
            <?php }?> 
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            
            
        </div>
       
    </div>
</div><?php }
}
