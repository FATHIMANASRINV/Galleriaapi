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
		{form_open('','')}
		<div class="form-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="rank" class="control-label">{lang('rank')}</label>
						<select name="rank" id="rank" class="form-control" >
							<option value="all" selected>{lang("all")}</option>
							{foreach from=$rank_details item=v key=key}
							<option value="{$v.rank_id}" {if $post_arr['rank']==$v.rank_id}selected{/if}>{$v.name}</option>
							{$i = $i+1}
							{/foreach}
						</select>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">

						<label for="from_date">{lang('from_date')}</label>
						<div class="col-10">
							<input class="form-control" type="text"  id="from_date" name="from_date" value="{set_value('from_date', $post_arr['from_date'])}">
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">

						<label for="end_date">{lang('end_date')}</label>
						<div class="col-10">
							<input class="form-control" type="text" id="end_date" name="end_date" value="{set_value('end_date', $post_arr['end_date'])}">
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				
				<div class="">
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
									<th>{lang('fullname')}</th>
									<th>{lang('current_rank')}</th>  
									<th>{lang('new_rank')}</th>  
									<th>{lang('date')}</th>  
								</tr>
							</thead>
							{* <tbody>
								{foreach from=$details item=v}
								<tr>
									<td>{counter}</td>
									<td>{$v.user_name}</td> 
									<td>{$v.full_name}</td>
									<td>{$v.date_of_joining|date_format}</td> 
									<td>{$v.sponsor_name}</td> 
									<td>{cur_format($v.wallet)}</td> 

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
		$('.user_name_ajax').select2({
			placeholder: '{lang('select_a_user')}',
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
				'url':'{base_url()}user/report/get-RankReport-ajax',
				"type": "POST",
				"data" : {
					'start_date' : '{$post_arr['from_date']}',
					'end_date' : '{$post_arr['end_date']}',
					'rank_id' : '{$post_arr['rank']}'
				}

			},

			'columns': [


			{ data: 'index'},
			{ data: 'user_name' },
			{ data: 'full_name' },
			{ data: 'current_name' },
			{ data: 'new_name' },
			{ data: 'date' },
			],
			success: function(response) { 
			} 
		});  
		table.buttons().container()
		.appendTo( '#exportTable_wrapper .col-md-6:eq(0)' );
	}); 
</script>

{/block}