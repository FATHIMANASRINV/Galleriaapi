{extends file="layout/base.tpl"}
{block name="header"}
<link rel="stylesheet" type="text/css" href="{assets_url('plugins/select2/select2.min.css')}">
{/block}
{block name="body"}

<div class="card">
	<div class="card-header">
		
		<h5 class="mb-0" data-anchor="data-anchor">{lang('change_sponsorname')}</h5>

	</div>
	<div class="card-body ">
		
		{form_open('','role="form"  class="row g-3 needs-validation" method="post" name="compose" id="compose" novalidate=""')}


		<div class="col-md-12">
			<label class="form-label">{lang('username')}</label>
			<select class="form-control user_name_ajax" name="user_name" id="user_name">
				{if $post_arr['user_name']}
				<option value="{$post_arr['user_name']}" selected>{$post_arr['user_name']}</option>
				{/if}
			</select>
		{form_error('user_name')}
		</div>

		<div class="col-md-12" id="full_name_div" style="display: none;">
			<label class="form-label">{lang('full_name')}</label>
			<div class="form-group" >				
				<input type="text" class="form-control" id="full_name" name="full_name"  
				value= "" autocomplete="off" readonly>

			</div>

		</div>

		<div class="col-md-12" id="sponsor_div" style="display: none;">
			<label class="form-label">{lang('current_sponsor_name')}</label>
			<div class="form-group" >				
				<input type="text" class="form-control" id="sponsor" name="sponsor"  
				value= "" autocomplete="off" readonly>

			</div>

		</div>	

		<div class="col-md-12">
			<label class="form-label">{lang('new_sponsor_name')}</label>
			<select class="form-control user_name_ajax" name="new_sponsor" id="new_sponsor">
				{if $post_arr['new_sponsor']}
				<option value="{$post_arr['new_sponsor']}" selected>{$post_arr['new_sponsor']}</option>
				{/if}
			</select>
		{form_error('new_sponsor')}
		</div>

		<div class="col-12">
			<button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">{lang('change')}</button>
			
		</div>
		{form_close()}
	</div>
</div>
{/block}
{block name="footer"}

</div>
</div>

<script src="{assets_url('plugins/select2/select2.min.js')}"></script>
<script type="text/javascript"> 
	$('#user_name').select2(); 
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#user_name').on('change', function(){

			var value= $(this).val();

			$.post( "{base_url()}admin/settings/get_sponsor_name", { user_id: value })
			.done(function( data ) {
				$('#sponsor').val(data['sponsor_name']);
				$('#sponsor_div').show();
				$('#full_name').val(data['full_name']);
				$('#full_name_div').show();

			});

		});

	});
	$(document).ready( function () {

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

{/block}