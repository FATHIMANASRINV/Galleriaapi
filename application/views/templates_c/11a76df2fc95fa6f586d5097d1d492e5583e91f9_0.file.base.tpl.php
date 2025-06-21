<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 09:39:20
  from "/var/www/html/WORKS/BTCCLUB/application/views/layout/base.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68523bf096d337_35411190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11a76df2fc95fa6f586d5097d1d492e5583e91f9' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/layout/base.tpl',
      1 => 1747895493,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/top_nav_bar.tpl' => 1,
    'file:layout/menu.tpl' => 1,
    'file:layout/flash_message.tpl' => 1,
  ),
),false)) {
function content_68523bf096d337_35411190 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_213809708668523bf0968878_26036010', 'header');
?>

</head>
<body>
    <input type="hidden" id="rootPath" value="<?php echo base_url();?>
">
    <div id="app" class="app">
        <?php $_smarty_tpl->_subTemplateRender("file:layout/top_nav_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php $_smarty_tpl->_subTemplateRender("file:layout/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
        <div id="content" class="app-content">
         <?php $_smarty_tpl->_subTemplateRender("file:layout/flash_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

         <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_115257380768523bf096ab14_91101665', 'body');
?>

     </div>
     <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
 </div>
 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_143582546568523bf096b228_68374972', 'footer');
?>

</body>
</html>
<?php }
/* {block 'header'} */
class Block_213809708668523bf0968878_26036010 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_213809708668523bf0968878_26036010',
  ),
);
public $callsChild = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link href="<?php echo assets_url();?>
backend/css/vendor.min.css" rel="stylesheet">
    <link href="<?php echo assets_url();?>
backend/css/app.min.css" rel="stylesheet">
    <link href="<?php echo assets_url();?>
backend/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet"> 
    <link href="<?php echo assets_url();?>
backend/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">

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
/* {block 'body'} */
class Block_115257380768523bf096ab14_91101665 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_115257380768523bf096ab14_91101665',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'footer'} */
class Block_143582546568523bf096b228_68374972 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_143582546568523bf096b228_68374972',
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
 <?php echo '<script'; ?>
 src="<?php echo assets_url();?>
backend/plugins/jvectormap-next/jquery-jvectormap.min.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
 src="<?php echo assets_url();?>
backend/plugins/jvectormap-content/world-mill.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
 src="<?php echo assets_url();?>
backend/plugins/apexcharts/dist/apexcharts.min.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
 src="<?php echo assets_url();?>
backend/js/demo/dashboard.demo.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
 src="<?php echo assets_url();?>
backend/plugins/summernote/dist/summernote-lite.min.js"><?php echo '</script'; ?>
>

 <?php echo '<script'; ?>
 type="text/javascript">
    function changeCurrency(currency_id) {
        $.ajax({
            type:'POST',
            url:'<?php echo base_url('login/change-currency');?>
',
            data: { currency_id: currency_id },
            dataType:'json',
        })
        .done(function( html ) {
            window.location.reload();
        });
    }$(document).on("click","#messageDropdown",function() {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>
'+'<?php echo log_user_type();?>
'+'/autocomplete/get-user-message',
            dataType:'json',
            beforeSend: function() {
                $('.list-group-item').hide();
                $(".loading").delay(3).fadeIn("slow");
            },
        })
        .done(function(response) { 
            if (response.success) {
                $(".notif").html(response.recent_message)
            }               
            $(".loading").delay(3).fadeOut("slow");

        });
    });

<?php echo '</script'; ?>
>
<?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
 
<?php
}
}
/* {/block 'footer'} */
}
