{extends file="layout/base.tpl"}
{block name="header"}

<link href="{assets_url()}plugins/DataTables/datatables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/DataTables/DataTables-1.12.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
{/block}
{block name="body"}

<div class="row "> 
	<div class="col-sm-12"> 

		{form_open('','')}
		<div class="form-body">
			<div class="row">

				<div class="col-sm-4">
					<div class="form-group">
						{* <label for="amt_type" class="control-label">{lang('wallet')}</label> *}
						<select name="amt_type[]" id="amt_type" class="form-control amount_type_ajax" {set_select('amt_type', set_value('amt_type'))} multiple>
							{foreach from=$amt_type item=v}
							<option value="{$v.id}" {if in_array($v.id,$post_arr['amt_type'])}selected{/if}>{$v.text}</option>
							{/foreach}
						</select>
					</div>
				</div>
				<div class="col-sm-4">

					<button type="submit" class="btn btn-theme" name="submit" value="search"id="submit">
						<i class="fa fa-filter"></i> {lang('filter')}
					</button>
					<button type="submit" class="btn btn-warning mr-1" name="submit" value="reset">
						<i class="fas fa-redo"></i>  {lang('reset')}
					</button> 
				</div>
			</div>
		</div>
		{form_close()}
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
									<th>{lang('wallet')}</th>
									{if $post_arr['amt_type']}
									{foreach from=$post_arr['amt_type'] item=v}
									<th>{lang($v)}</th>
									{/foreach}
									<th>{lang('total')}</th>
									{/if}
								</tr>
							</thead>
							{* <tbody>
								{foreach from=$details item=v}
								<tr>
									<td>{counter}</td>
									<td>{$v.user_name}</td> 
									<td>{cur_format($v.wallet)}</td> 
									{if $post_arr['amt_type']}
									{$total = 0}
									{foreach from=$post_arr['amt_type'] item=a}
									<td>{$v.$a}</td>
									{$total = $total+$v.$a}
									{/foreach}
									<td>{$total}</td>
									{/if}

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
		// 		'copy', 'csv', 'excel', 'pdf', 'print'
		// 		]
		// } );


		$('.amount_type_ajax').select2({
			placeholder: '{lang('select_wallet')}',			
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
				'url':'{base_url()}user/report/get_WalletDetails_ajax',
				"type": "POST",
				"data" : {

					'wallet' : '{$post_arr['wallet']}',

				}

			},

			'columns': [

			{ data: 'index'},
			{ data: 'user_name'},
			{ data: 'wallet'},
			{if $post_arr['amt_type']}
			{foreach from=$post_arr['amt_type'] item=a}
			{ data: 'user_id', mRender: function(data, type, row) {
				var html = '';
				html =  row.{$a};
				return html;
			}},
			{/foreach}
			{ data: 'total'},
			{/if}

			],
			success: function(response) { 
			} 
		});  
		table.buttons().container()
		.appendTo( '#exportTable_wrapper .col-md-6:eq(0)' );
	}); 
</script>


{/block}