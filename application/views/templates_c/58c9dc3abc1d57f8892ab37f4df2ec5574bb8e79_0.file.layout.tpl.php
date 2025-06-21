<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 09:35:15
  from "/var/www/html/WORKS/BTCCLUB/application/views/login/layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68523afb410611_72841876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58c9dc3abc1d57f8892ab37f4df2ec5574bb8e79' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/login/layout.tpl',
      1 => 1747637192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68523afb410611_72841876 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <title> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['site_details']->value['name'];?>
 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
        <link rel="icon" href="<?php echo assets_url();?>
images/logo/<?php echo $_smarty_tpl->tpl_vars['site_details']->value['favicon'];?>
" type="image/x-icon">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_184234451968523afb40d7b4_99279137', 'header');
?>

</head>
<body class='pace-top'>
    <input type="hidden" id="rootPath" value="<?php echo base_url();?>
">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_40847012868523afb40f5e0_41270701', "body");
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62957861168523afb40fc01_48462007', 'footer');
?>

</body>
</html>
<?php }
/* {block 'header'} */
class Block_184234451968523afb40d7b4_99279137 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_184234451968523afb40d7b4_99279137',
  ),
);
public $callsChild = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link href="<?php echo assets_url();?>
backend/css/vendor.min.css" rel="stylesheet">
    <link href="<?php echo assets_url();?>
backend/css/app.min.css" rel="stylesheet">
    <style type="text/css">
        .fa-1sm{
            font-size:1.3em !important;
        }
        @media print{
            .hidden-print{
                display:none !important;
            }
        }
    </style>
    <?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
 
    <?php
}
}
/* {/block 'header'} */
/* {block "body"} */
class Block_40847012868523afb40f5e0_41270701 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_40847012868523afb40f5e0_41270701',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "body"} */
/* {block 'footer'} */
class Block_62957861168523afb40fc01_48462007 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_62957861168523afb40fc01_48462007',
  ),
);
public $callsChild = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="<?php echo assets_url();?>
backend/js/vendor.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo assets_url();?>
backend/js/app.min.js"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
 
    <?php
}
}
/* {/block 'footer'} */
}
