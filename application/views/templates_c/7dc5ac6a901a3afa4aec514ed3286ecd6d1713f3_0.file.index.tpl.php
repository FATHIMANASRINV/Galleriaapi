<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 09:39:20
  from "/var/www/html/WORKS/BTCCLUB/application/views/user/dashboard/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68523bf0965b44_19283093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7dc5ac6a901a3afa4aec514ed3286ecd6d1713f3' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/user/dashboard/index.tpl',
      1 => 1749878434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68523bf0965b44_19283093 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_156191878768523bf0962107_33457204', "header");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_199543502968523bf0962e53_19880507', "body");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169260810068523bf0965359_63581769', "footer");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout/base.tpl");
}
/* {block "header"} */
class Block_156191878768523bf0962107_33457204 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_156191878768523bf0962107_33457204',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 
<link href="<?php echo assets_url();?>
plugins/notify/notify.css" rel="stylesheet" /> 
<?php
}
}
/* {/block "header"} */
/* {block "body"} */
class Block_199543502968523bf0962e53_19880507 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_199543502968523bf0962e53_19880507',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  
<div class="row">
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Total Community Members</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0"><?php echo $_smarty_tpl->tpl_vars['total_users']->value;?>
</h3>
					</div>
					<div class="col-5">
						<div class="mt-n2" data-render="apexchart" data-type="bar" data-title="Visitors" data-height="30"></div>
					</div>
				</div>
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Direct Affiliate Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0"><?php echo cur_format($_smarty_tpl->tpl_vars['user_wallet']->value['referral_bonus']);?>
</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="donut" data-title="Visitors" data-height="45"></div>
					</div>
				</div>
				
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Community Matrix Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0"><?php echo cur_format($_smarty_tpl->tpl_vars['user_wallet']->value['level_bonus']);?>
</h3>
					</div>
					<div class="col-5">
						<div class="mt-n2" data-render="apexchart" data-type="line" data-title="Visitors" data-height="30"></div>
					</div>
				</div>
				
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Global Community Pool Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0"><?php echo cur_format($_smarty_tpl->tpl_vars['user_wallet']->value['global_bonus']);?>
</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="pie" data-title="Visitors" data-height="45"></div>
					</div>
				</div>
				
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-3 col-lg-6 mt-4">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Missed Income</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0"><?php echo cur_format($_smarty_tpl->tpl_vars['user_wallet']->value['missed_level_income']);?>
</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="donut" data-title="Visitors" data-height="45"></div>
					</div>
				</div>
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 mt-4">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Pending Global Pool Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0"><?php echo cur_format($_smarty_tpl->tpl_vars['pending_bonus']->value);?>
</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="donut" data-title="Visitors" data-height="45"></div>
					</div>
				</div>
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "footer"} */
class Block_169260810068523bf0965359_63581769 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_169260810068523bf0965359_63581769',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   
<?php echo '<script'; ?>
 type="text/javascript">
	function copyReferral(element) {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(element).text()).select();
		document.execCommand("copy");
		$temp.remove();
		$.notify(
			"<?php echo lang('copied_the_referral');?>
", 
			{ color: "#fff", background: "#22c03c",blur: 0.4, delay:5000}
			);
	}
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "footer"} */
}
