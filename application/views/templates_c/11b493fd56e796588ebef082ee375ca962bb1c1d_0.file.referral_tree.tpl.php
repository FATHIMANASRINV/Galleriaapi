<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 10:52:10
  from "/var/www/html/WORKS/BTCCLUB/application/views/user/network/referral_tree.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68524d02da8555_29656396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11b493fd56e796588ebef082ee375ca962bb1c1d' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/user/network/referral_tree.tpl',
      1 => 1748951403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68524d02da8555_29656396 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_205040966768524d02d9e890_25435093', "header");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_65861575068524d02da0933_57946183', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_151307965468524d02da5216_67606519', "footer");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout/base.tpl");
}
/* {block "header"} */
class Block_205040966768524d02d9e890_25435093 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_205040966768524d02d9e890_25435093',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link href="<?php echo assets_url();?>
plugins/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo assets_url();?>
plugins/tree/css/hierarchy-view.css" rel="stylesheet" type="text/css" />
<?php
}
}
/* {/block "header"} */
/* {block "body"} */
class Block_65861575068524d02da0933_57946183 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_65861575068524d02da0933_57946183',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   
<div class="card-header ">
	<?php echo form_open('','role="form" class="smart-wizard form-horizontal" method="post"  name="user_category" id="user_form"');?>

	<input type="hidden" name="category_type" id="category_type" value="<?php echo $_smarty_tpl->tpl_vars['category_type']->value;?>
" >
	<div class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">
				<?php echo lang('text_user_name');?>
 <span class="symbol required"></span>
			</label>
			<div class="col-sm-3">
				<select name="user_id" id="user_id" class="form-control user_name_ajax" <?php echo set_select('user_id',set_value('user_id'));?>
 required>
					<?php if ($_smarty_tpl->tpl_vars['user_id']->value) {?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</option>
					<?php }?>
				</select>
				<?php echo form_error("user_id");?>

			</div> 
			<div class="col-sm-4 "> 
				<button class="btn btn-primary" name="view_user_tree" id="view_user_tree" value="view_user_tree" type="submit"><?php echo lang('button_search');?>
</button>
			</div>
		</div>
	</div>
	<?php echo form_close();?>
  
</div>
<section class="management-view g-0"> 
	<div class="h-lg-100 overflow-hidden">
		<div class="card-header">
			<div class="row align-items-center">
				<div class="loading-div"></div> 
				<div class="ne-container">
					<div class="ne-wrapper">
						<div class="ne-item" id="tree"></div>
					</div>
				</div> 
			</div>
		</div>
	</div> 
</section>
<?php
}
}
/* {/block "body"} */
/* {block "footer"} */
class Block_151307965468524d02da5216_67606519 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_151307965468524d02da5216_67606519',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo assets_url();?>
plugins/tree/js/tree.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/select2/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
	jQuery(document).ready(function () {
		generateTree('<?php echo $_smarty_tpl->tpl_vars['enc_id']->value;?>
', '<?php echo log_user_type();?>
', "sponsor_tree");
		$('.user_name_ajax').select2({
			placeholder: 'Select a User',
			ajax: {
				url: '<?php echo base_url();?>
user/autocomplete/getUserDownline_ajax',
				type:'post',
				dataType: 'json',
				data: function (params) {
					var query = {
						term: params.term,
						type: 'sponsor',

					}
					return query;
				},
				delay: 250,
				processResults: function (data) { 
					return {
						results: data
					};
				},
				cache: true
			}
		}); 
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "footer"} */
}
