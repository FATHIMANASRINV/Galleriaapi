{extends file="layout/base.tpl"}
{block name="header"}
<link rel="stylesheet" type="text/css" href="{assets_url('plugins/datepicker/css/metallic/zebra_datepicker.min.css')}">
<link href="{assets_url()}plugins/DataTables/datatables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/DataTables/DataTables-1.12.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
<style>
	.form-control:focus {
		color: black;
	}
</style>
{/block}
{block name="body"}

<div class="row "> 
	<div class="col-sm-12"> 
		{form_open('','')}
		<div class="form-body">
			<div class="row">

				<div class="col-sm-4">
					<div class="form-group">

						<label for="from_date">{lang('from_date')}</label>
						<div class="col-10">
							<input class="form-control" type="date"  id="from_date" name="from_date" value="{$post_arr['from_date']}">
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">

						<label for="end_date">{lang('end_date')}</label>
						<div class="col-10">
							<input class="form-control" type="date" id="end_date" name="end_date" value="{$post_arr['end_date']}">
						</div>
					</div>
				</div> 
				<div class="col-sm-4">
					<div class="form-group">
						<label for="user_name" class="control-label">Level</label>
						<select name="level" id="level" class="form-control" >
							<option value="all" {if $post_arr['level']=='all'}selected{/if}>All</option>
							{for $level=1 to 10}
							<option value="{$level}"{if $post_arr['level']==$level}selected{/if} >{$level}</option>
							{/for}
						</select>

					</div>
				</div>
			{* 	<div class="col-sm-4">
					<div class="form-group">
						<label for="user_name" class="control-label">Country</label>
						<select name="country" id="country" class="form-control country_name_ajax" >
							{if $post_arr['country']}
							<option value="{$post_arr['country']}" selected>{$post_arr['country_name']}</option>
							{/if}
						</select>

					</div>
				</div> *}
				<div class="col-sm-4">
					<br>
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


</div>
<div class="row mt-3"> 
	<div class="col-sm-12"> 
		<div class="card"> 

			<div class="card-header">
				<h5>{$title}</h5>
				
			</div>

			<div class="card-content">
				<div class="card-body">  
					{if $smarty.post.submit}

					<div class="table-responsive">
						<table class="table color-table primary-table" id="exportTable">
							<thead >
								<tr>
									<th>#</th>
									{* <th>{lang('type')}</th>   *}
									<th>{lang('username')}</th>
									{* <th>{lang('fullname')}</th> *}
									<th>{lang('date_of_joining')}</th>  
									<th>{lang('sponsor_name')}</th>  
									<th>Earn Amount</th>  
																		<th>Rank</th>  

								</tr>
							</thead>
						</table>

					</div>
					{/if}

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

		$('.country_name_ajax').select2({
			placeholder: 'Select a Country',
			ajax: {
				url:'{base_url()}signup/get-country-ajax',
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
					'url':'{base_url()}user/report/get_UserJoining_ajax',
					"type": "POST",
					"data" : {

						'start_date' : '{$post_arr['from_date']}',
						'end_date' : '{$post_arr['end_date']}',
						'country' : '{$post_arr['country']}',
						'level' : '{$post_arr['level']}',

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
				],
				success: function(response) { 
				} 
			});  
		table.buttons().container()
		.appendTo( '#exportTable_wrapper .col-md-6:eq(0)' );
	}); 
</script>

{/block}