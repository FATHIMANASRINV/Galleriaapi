<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 09:35:15
  from "/var/www/html/WORKS/BTCCLUB/application/views/layout/flash_message.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68523afb415be4_99737562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c35fbae51cb3a624195cc0c01f772a50e9828d2d' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/layout/flash_message.tpl',
      1 => 1747632935,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68523afb415be4_99737562 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['box']->value && $_smarty_tpl->tpl_vars['flashdata']->value) {?> 
<?php if ($_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->_assignInScope('message_class', "alert alert-success");
$_smarty_tpl->_assignInScope('bg_class', "bg-success");
$_smarty_tpl->_assignInScope('icon_class', "<svg class='flex-shrink-0 me-2 svg-success' xmlns='http://www.w3.org/2000/svg' height='1.5rem' viewBox='0 0 24 24' width='1.5rem' fill='#000000'><path d='M0 0h24v24H0V0zm0 0h24v24H0V0z' fill='none'/><path d='M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z'/></svg>");
} else {
$_smarty_tpl->_assignInScope('message_class', "alert alert-danger");
$_smarty_tpl->_assignInScope('bg_class', "bg-danger");
$_smarty_tpl->_assignInScope('icon_class', '<svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><g><path d="M15.73,3H8.27L3,8.27v7.46L8.27,21h7.46L21,15.73V8.27L15.73,3z M19,14.9L14.9,19H9.1L5,14.9V9.1L9.1,5h5.8L19,9.1V14.9z"/><rect height="6" width="2" x="11" y="7"/><rect height="2" width="2" x="11" y="15"/></g></g></g></svg>');
}?>



<div class="<?php echo $_smarty_tpl->tpl_vars['message_class']->value;?>
 alert-dismissible fade show">
	<?php echo $_smarty_tpl->tpl_vars['icon_class']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['flashdata']->value;?>
.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
</div>

<?php }
}
}
