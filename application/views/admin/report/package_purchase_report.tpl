{extends file="layout/base.tpl"}
{block name="header"}

<link rel="stylesheet" type="text/css" href="{assets_url('plugins/datepicker/css/metallic/zebra_datepicker.min.css')}">

<link href="{assets_url()}plugins/DataTables/datatables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/DataTables/DataTables-1.12.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />

{/block}
{block name="body"}

<div class="row "> 
	<div class="col-sm-12"> 
	{* 	<div class="card">
			
		<div class="card-body">  *}
			{form_open('','')}
			<div class="form-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							{* <label for="user_name" class="control-label">{lang('username')}</label> *}
							<select name="user_name" id="user_name" class="form-control user_name_ajax" {set_select('user_name', set_value('user_name'))}>
								{if $post_arr['user_name']}
								<option value="{$post_arr['user_name']}" selected>{$post_arr['user_names']}</option>
								{/if}
							</select>
							
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">

							{* <label for="from_date">{lang('from_date')}</label> *}
							<div class="col-10">
								<input class="form-control" type="date"  id="from_date" name="from_date" value="{$post_arr['from_date']}">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">

							{* <label for="end_date">{lang('end_date')}</label> *}
							<div class="col-10">
								<input class="form-control" type="date" id="end_date" name="end_date" value="{$post_arr['end_date']}">
							</div>
						</div>
					</div>
					<div class="col-sm-4"> <br>
						<button type="submit" class="btn btn-theme" name="submit" value="search">
							<i class="fa fa-filter"></i> {lang('filter')}
						</button>
						<button type="submit" class="btn btn-warning mr-1" name="submit" value="reset">
							<i class="fas fa-retweet"></i>  {lang('reset')}
						</button> 
					</div>
				</div>
			</div>
			{form_close()}
			{* </div>
			
		</div>  *}
	</div> 
</div><br>

<div class="row "> 
	<div class="col-sm-12"> 
		<div class="card"> 

			<div class="card-header">
				<h5>{$title}</h5>
				
			</div>

			<div class="card-content">
				<div class="card-body">  
					
					<div class="table-responsive">
						<table class="table color-table primary-table" id="exportTable">
							<thead >
								<tr>
									<th>#</th>
									{* <th>{lang('type')}</th>   *}
									<th>{lang('username')}</th>
									<th>{lang('new_package')}</th>  
									<th>{lang('old_package')}</th>
									<th>{lang('package_amount')}</th>  
									<th>Activated Date</th>  
								</tr>
							</thead>
							{* <tbody>
								{foreach from=$report item=v}
								<tr>
									<td>{counter}</td>
									<td>{$v->user_name}</td> 
									<td>{if $v->old_package_name}{$v->old_package_name}{else}None{/if}</td>
									<td>{$v->new_package_name}</td> 
									<td>{cur_format($v->package_amount)}</td> 
									<td>{$v->date|date_format:"%d-%m-%y"}</td> 

								</tr> 
								{/foreach}
							</tbody> *}
						</table>

					</div>
				</div>
			</div>
		</div> 
	</div> 
</div>

{/block}
{block name="footer"}

<script src="{assets_url('plugins/datepicker/zebra_datepicker.min.js')}"></script>

<script src="{assets_url()}plugins/DataTables/datatables.min.js"></script>
<script src="{assets_url('plugins/DataTables/media/js/jquery.dataTables.min.js')}"></script>
<script src="{assets_url()}plugins/select2/select2.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/dataTables.buttons.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/jszip.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/pdfmake.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/vfs_fonts.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/buttons.html5.min.js"></script>
<script src="{assets_url()}plugins/DataTables/DataTables-1.12.1/js/buttons.print.min.js"></script>
<script src="{assets_url()}plugins/select2/select2.min.js"></script>

<script type="text/javascript">

	$('#from_date').Zebra_DatePicker({
		pair: $('.to_date')
	});
	$('#end_date').Zebra_DatePicker();

	$(document).ready(function() {
		// $('#exportTable').DataTable( {
		// 	dom: 'Bfrtip',
  //       buttons: [
  //           'copyHtml5',
  //           'excelHtml5',
  //           'csvHtml5',
  //           'pdfHtml5'
  //       ]
		// } );
		


		$('.user_name_ajax').select2({
			placeholder:'{lang('select_a_user')}',
			ajax: {
				url: '{base_url()}admin/autocomplete/getUser_ajax',
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
					'url':'{base_url()}admin/report/get_PackagePurchase_ajax',
					"type": "POST",
					"data" : {

						'start_date' : '{$post_arr['from_date']}',
						'end_date' : '{$post_arr['end_date']}',
						'user_id' : '{$post_arr['user_id']}',

					}

				},

				'columns': [


					{ data: 'index'},
					{ data: 'user_name' },
					{ data: 'new_package_name'},
					{ data: 'old_package_name', mRender: function(data, type, row) {
						var html = '';
						if(row.old_package_name){ 
							html =  row.old_package_name ;
						}else{
							html += 'None'
						}
						return html;
					}},
					{ data: 'package_amount'},
					{ data: 'date'},
				],
				success: function(response) { 
				} 
			});  
		table.buttons().container()
		.appendTo( '#exportTable_wrapper .col-md-6:eq(0)' );
	}); 
</script>

{/block}