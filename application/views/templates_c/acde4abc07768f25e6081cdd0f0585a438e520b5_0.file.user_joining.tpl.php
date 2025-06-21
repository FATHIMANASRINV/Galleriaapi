<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2025-06-18 10:51:56
  from "/var/www/html/WORKS/BTCCLUB/application/views/admin/report/user_joining.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-23',
  'unifunc' => 'content_68524cf4b660d6_14727092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'acde4abc07768f25e6081cdd0f0585a438e520b5' => 
    array (
      0 => '/var/www/html/WORKS/BTCCLUB/application/views/admin/report/user_joining.tpl',
      1 => 1749898173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68524cf4b660d6_14727092 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_82723582368524cf4b4dd55_62389072', "header");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_295088968524cf4b505c0_25521409', "body");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_151136611168524cf4b5dd98_12841825', "footer");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout/base.tpl");
}
/* {block "header"} */
class Block_82723582368524cf4b4dd55_62389072 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_82723582368524cf4b4dd55_62389072',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<link rel="stylesheet" type="text/css" href="<?php echo assets_url('plugins/datepicker/css/metallic/zebra_datepicker.min.css');?>
">

<link href="<?php echo assets_url();?>
plugins/DataTables/datatables.min.css" rel="stylesheet" />
<link href="<?php echo assets_url();?>
plugins/DataTables/DataTables-1.12.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="<?php echo assets_url();?>
plugins/select2/select2.min.css" rel="stylesheet" />
<style>
	.form-control:focus {
		color: black;
	}
</style>
<?php
}
}
/* {/block "header"} */
/* {block "body"} */
class Block_295088968524cf4b505c0_25521409 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_295088968524cf4b505c0_25521409',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row "> 
	<div class="col-sm-12"> 
		<?php echo form_open('','');?>

		<div class="form-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="user_id" class="control-label"><?php echo lang('username');?>
</label>
						<select name="user_id" id="user_id" class="form-control user_name_ajax" >
							<?php if ($_smarty_tpl->tpl_vars['post_arr']->value['user_id']) {?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['user_id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['post_arr']->value['user_name'];?>
</option>
							<?php }?>
						</select>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">

						<label for="from_date"><?php echo lang('from_date');?>
</label>
						<div class="col-10">
							<input class="form-control" type="date"  id="from_date" name="from_date" value="<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['from_date'];?>
">
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">

						<label for="end_date"><?php echo lang('end_date');?>
</label>
						<div class="col-10">
							<input class="form-control" type="date" id="end_date" name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['end_date'];?>
">
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="user_name" class="control-label"><?php echo lang('sponsor_name');?>
</label>
						<select name="sponsor_id" id="sponsor_id" class="form-control user_name_ajax" >
							<?php if ($_smarty_tpl->tpl_vars['post_arr']->value['sponsor_id']) {?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['sponsor_id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['post_arr']->value['sponsor_name'];?>
</option>
							<?php }?>
						</select>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="user_name" class="control-label">Level</label>
						<select name="level" id="level" class="form-control" >
							<option value="all" <?php if ($_smarty_tpl->tpl_vars['post_arr']->value['level'] == 'all') {?>selected<?php }?>>All</option>
							<?php
$_smarty_tpl->tpl_vars['level'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['level']->step = 1;$_smarty_tpl->tpl_vars['level']->total = (int) ceil(($_smarty_tpl->tpl_vars['level']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['level']->step));
if ($_smarty_tpl->tpl_vars['level']->total > 0) {
for ($_smarty_tpl->tpl_vars['level']->value = 1, $_smarty_tpl->tpl_vars['level']->iteration = 1;$_smarty_tpl->tpl_vars['level']->iteration <= $_smarty_tpl->tpl_vars['level']->total;$_smarty_tpl->tpl_vars['level']->value += $_smarty_tpl->tpl_vars['level']->step, $_smarty_tpl->tpl_vars['level']->iteration++) {
$_smarty_tpl->tpl_vars['level']->first = $_smarty_tpl->tpl_vars['level']->iteration == 1;$_smarty_tpl->tpl_vars['level']->last = $_smarty_tpl->tpl_vars['level']->iteration == $_smarty_tpl->tpl_vars['level']->total;?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['post_arr']->value['level'] == $_smarty_tpl->tpl_vars['level']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['level']->value;?>
</option>
							<?php }
}
?>

						</select>

					</div>
				</div>
				
				<div class="col-sm-4">
					<br>
					<button type="submit" class="btn btn-theme" name="submit" value="search">
						<i class="fa fa-filter"></i> <?php echo lang('filter');?>

					</button>
					<button type="submit" class="btn btn-warning mr-1" name="submit" value="reset">
						<i class="fas fa-retweet"></i>  <?php echo lang('reset');?>

					</button> 
				</div>
			</div>
		</div>

		<?php echo form_close();?>

	</div>


</div><br>

<div class="row "> 
	<div class="col-sm-12"> 
		<div class="card"> 

			<div class="card-header">
				<h5><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h5>
				
			</div>

			<div class="card-content">
				<div class="card-body">  
					
					<div class="table-responsive">
						<table class="table color-table primary-table" id="exportTable">
							<thead >
								<tr>
									<th>#</th>
									
									<th><?php echo lang('username');?>
</th>
									
									<th><?php echo lang('date_of_joining');?>
</th>  
									<th><?php echo lang('sponsor_name');?>
</th>  
									<th>Earn Amount</th>  
									<th>Rank</th>  
									
									
								</tr>
							</thead>
							
						</table>

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
class Block_151136611168524cf4b5dd98_12841825 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_151136611168524cf4b5dd98_12841825',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php echo '<script'; ?>
 src="<?php echo assets_url('plugins/datepicker/zebra_datepicker.min.js');?>
"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/DataTables/datatables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url('plugins/DataTables/media/js/jquery.dataTables.min.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/select2/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/DataTables/DataTables-1.12.1/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/DataTables/DataTables-1.12.1/js/jszip.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/DataTables/DataTables-1.12.1/js/pdfmake.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/DataTables/DataTables-1.12.1/js/vfs_fonts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/DataTables/DataTables-1.12.1/js/buttons.html5.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/DataTables/DataTables-1.12.1/js/buttons.print.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo assets_url();?>
plugins/select2/select2.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">

	$('#from_date').Zebra_DatePicker({
		pair: $('.to_date')
	});
	$('#end_date').Zebra_DatePicker();

	$(document).ready(function() {
		// $('#exportTable').DataTable( {
		// 	dom: 'Bfrtip',
		// 	buttons: [
		// 		'copyHtml5',
		// 		'excelHtml5',
		// 		'csvHtml5',
		// 		'pdfHtml5'
		// 		]
		// } );



		$('.user_name_ajax').select2({
			placeholder: '<?php echo lang('select_a_user');?>
',
			ajax: {
				url: '<?php echo base_url();?>
admin/autocomplete/getUser_ajax',
				type:'post',
				dataType: 'json',
				delay: 250,
				processResults: function (data) { 
					return {
						results: data
					};

				},
				cache: true
			}

		}); 
		$('.country_name_ajax').select2({
			placeholder: 'Select a Country',
			ajax: {
				url:'<?php echo base_url();?>
signup/get-country-ajax',
				type: 'post',
				dataType: 'json',
				delay:250,
				processResults: function(data) {
					return {
						results: data
					};
				}
			},

		}); 
	});

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		var order = $('#exportTable').DataTable({
			dom: 'Bfrtip',
			lengthMenu: [
				[10, 50, 100,200,500,1000, <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
],
				[10, 50, 100,200,500,1000, 'All'],
			],
			buttons: [
				'pageLength', 'copy', 'csv', 'pdf', 'print',{
					extend: 'excelHtml5',
					title: 'Transaction',
					customizeData: function(data) {
						for(var i = 0; i < data.body.length; i++) {
							for(var j = 0; j < data.body[i].length; j++) {
								data.body[i][j] = '\u200C' + data.body[i][j];
							}
						}
					},      
					orientation: 'landscape'
				}],

				'processing': true,
				'serverSide': true,
				"autoWidth": false,
				'serverMethod': 'post', 
				"pagingType": "full_numbers",
				"pageLength": 10,
				"sortable": true,
				"pagingType": "full_numbers",

				"aaSorting": [],
				"order": [],
				"aoColumnDefs": [
					{ "bSortable": false, "aTargets": [ 0, 1, 2, 3, 4, 5
					] },
				],

				"columnDefs": [{
					"targets": 'no-sort',
					"orderable": false,
					"order": [],
				}],

				'ajax': {
					'url':'<?php echo base_url();?>
admin/report/get_UserJoining_ajax',
					"type": "POST",
					"data" : {

						'start_date' : '<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['from_date'];?>
',
						'end_date' : '<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['end_date'];?>
',
						'user_id' : '<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['user_id'];?>
',
						'sponsor_id' : '<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['sponsor_id'];?>
',
						'country' : '<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['country'];?>
',
						'level' : '<?php echo $_smarty_tpl->tpl_vars['post_arr']->value['level'];?>
',

					}

				},

				'columns': [


					{ data: 'index'},
					{ data: 'user_name' },
					// { data: 'full_name' },
					{ data: 'date_of_joining' },
					{ data: 'sponsor_name' },
					{ data: 'wallet' },
					{ data: 'package_name' },
					// { data: 'email' },
					// { data: 'mobile' },
				],
				success: function(response) { 
				} 
			});  
		table.buttons().container()
		.appendTo( '#exportTable_wrapper .col-md-6:eq(0)' );
	}); 
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "footer"} */
}
