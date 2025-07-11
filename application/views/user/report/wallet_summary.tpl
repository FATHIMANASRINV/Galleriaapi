{extends file="layout/base.tpl"}
{block name="header"}

<link href="{assets_url()}plugins/DataTables/datatables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/DataTables/DataTables-1.12.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
{/block}
{block name="body"}
<div class="row">
	<div class="col-md-12">

		{form_open('','id="trans_form" name="trans_form" class="form-login"' )}

		<div class="row">


			<!--/span-->
			<div class="col-md-6">
				<div class="form-group"> 

					<label class="bmd-label-floating">
						{lang('category')} <span class="symbol required"></span>
					</label>

					<select class="form-select form-select-sm mb-3" name="category" id="category">
						{* <option value="all">{lang('all_transactions')}</option> *}
						{foreach $category_details as $v}
						<option value="{$v.id}" {if $category_id == $v.id}selected{/if}>{lang($v.db_amt_type)}</option>
						{/foreach}
					</select>
					{form_error("category")}

				</div> 
			</div>
			<div class="col-md-4">
				<br>
				<button class="btn btn-theme pull-right" type="submit" id="view_details" name="view_details" value="add_amount">
					{lang('button_search')} <i class="fa fa-arrow-circle-right"></i>
				</button>  
			</div>

			{form_close()} 
		</div>
	</div>
</div>

<br>

<div class="row "> 
	<div class="col-sm-12"> 
		<div class="card"> 

			<div class="card-header">
				<h5>{$title}</h5>

			</div>

			<div class="card-content">
				<div class="card-body">  
					{if $smarty.post.view_details}
					<div class="table-responsive">
						<table class="table color-table primary-table" id="exportTable">
							<thead >

								<tr>
									<th>{lang('sl_no')}</th>
									
									<th>{lang('from_user')}</th>                              
									<th>Total Amount</th>        
									<th>Package</th>        
									<th>Transaction Fee</th>             
									{if $category_name=='level_bonus'}
									<th>{lang('level_no')}</th>  
									{/if}                      
									<th>{lang('method')}</th>                                 

									<th>{lang('date')}</th>
									<th>{lang('text_total')}</th>
								</tr>
							</thead>
							{* <tbody>
								{$last_total = 0}
								{foreach $account_details as $v}
								<tr>
									<td>{counter}</td>
									{if $category_id == "all"}
									<td>{lang($v.category_name)}</td>
									{/if}                                
									<td class="text-right">{$v.from_name}</td>
									<td class="text-right">{cur_format($v.amount_payable)}

									</td>
									<td>{lang($v.category_name)}</td>

									<td>{$v.date_of_submission|date_format:"%d-%m-%y"}</td>
									<td class="text-right"><b>{cur_format($v.user_page_total_amountuser_page_total_amount)}</b></td>
								</tr>
								{$last_total = $v.user_page_total_amount}
								{/foreach}

							</tbody> *}
						</table> 
						<br>

						<h4> {lang('aggregate_details')}</h4>
						<div class="col-lg-4 col-md-8"> 
							<table class="table table-bordered table-hover">
								{if {set_value('user_name')}}
								<tr>
									<td>{lang('username')}</td>
									<td>{set_value('user_name')} </td>
								</tr>
								{/if}   
								<tr>
									<td>{lang('date')}</td>
									<td>{$smarty.now|date_format:"%d-%m-%y"}</td>
								</tr> 
								<tr>
									<td>{lang('text_total')}</td>
									<td>{$total}</td>
								</tr>
							</table>
						</div>  
					</div>
					{/if}
				</div>
			</div>
		</div>
	</div> 
</div>


{/block}
{block name="footer"}

<script src="{assets_url()}plugins/DataTables/datatables.min.js"></script>
<script src="{assets_url('plugins/DataTables/media/js/jquery.dataTables.min.js')}"></script>
<script src="{assets_url()}plugins/select2/select2.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/dataTables.buttons.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/jszip.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/pdfmake.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/vfs_fonts.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/buttons.html5.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/buttons.print.min.js"></script>


<script type="text/javascript">


	$(document).ready(function() {
			// $('#exportTable').DataTable( {
			// 	dom: 'Bfrtip',
			// 	buttons: [
			// 	'copy', 'csv', 'excel', 'pdf', 'print'
			// 	]
			// } );


		$('.amount_type_ajax').select2({
			placeholder: '{lang('select_wallet')}',
			ajax: {
				url: '{base_url()}admin/autocomplete/getAmountType_ajax',
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
	});



</script>
<script type="text/javascript">
	$(document).ready(function(){
		var order = $('#exportTable').DataTable({
			dom: 'Bfrtip',
			lengthMenu: [
				[10, 50, 100,200,500,1000, {$count}],
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
				'url':'{base_url()}user/report/get_WalletSummary_ajax',
				"type": "POST",
				"data" : {

					'category_type' : '{$category_name}',
					'table' : '{$table}',

				}

			},

			'columns': [


				{ data: 'index'},
				
				{ data: 'from_name' },
				{ data: 'total_amount' },
				{ data: 'package_name' },
				{ data: 'transaction_fee' },
				{if $category_name=='level_bonus'}
				{ data: 'transaction_note' },
				{/if}
				{ data: 'category_name' },
				{ data: 'date_of_submission' },
				{ data: 'user_page_total_amount' },
				],
			success: function(response) { 
			} 
		});  
		table.buttons().container()
		.appendTo( '#exportTable_wrapper .col-md-6:eq(0)' );
	}); 
</script>


{/block}

