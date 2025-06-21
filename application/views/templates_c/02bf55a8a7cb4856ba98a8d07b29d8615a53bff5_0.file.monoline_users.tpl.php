<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 11:01:02
  from "/var/www/html/WORKS/BTCCLUB/application/views/user/report/monoline_users.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68524f160ba7f5_12477051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02bf55a8a7cb4856ba98a8d07b29d8615a53bff5' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/user/report/monoline_users.tpl',
      1 => 1750224661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68524f160ba7f5_12477051 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_176662265468524f160b6511_91453292', "header");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_23557563168524f160b6d01_22410249', "body");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_78319169068524f160b9d12_78098765', "footer");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout/base.tpl");
}
/* {block "header"} */
class Block_176662265468524f160b6511_91453292 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_176662265468524f160b6511_91453292',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style>



</style>
<?php
}
}
/* {/block "header"} */
/* {block "body"} */
class Block_23557563168524f160b6d01_22410249 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_23557563168524f160b6d01_22410249',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row">
	<div class="card h-100 w-100">
		<div class="messenger">
			<div class="messenger-sidebar" style="max-width:100%;">
				<div class="messenger-sidebar-header text-center mb-3">
					<h3 style="color: white; display: inline-block; padding: 5px 15px; border-radius: 5px;">Monoline Users</h3>
				</div>
				<div class="messenger-sidebar-body">
					<div class="col-ms-12 user-grid mb-3">
						<div class="table-responsive">
							<table class="table table-bordered color-table primary-table w-100" id="exportTable" style="width: 100%;">
								<thead>
									<tr>
										<th>Level</th>
										<th>Username</th>
										<th>Package</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php $_smarty_tpl->_assignInScope('count', count($_smarty_tpl->tpl_vars['users']->value));
?>
									<?php $_smarty_tpl->_assignInScope('counts', 1);
?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['counts']->value;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['package_name'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['date_of_joining'];?>
</td>
										<?php $_smarty_tpl->_assignInScope('counts', $_smarty_tpl->tpl_vars['counts']->value+1);
?>
									</tr>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

								</tbody>
							</table>

						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?php
}
}
/* {/block "body"} */
/* {block "footer"} */
class Block_78319169068524f160b9d12_78098765 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_78319169068524f160b9d12_78098765',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="module" src="<?php echo assets_url();?>
backend/js/demo/page-messenger.demo.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "footer"} */
}
