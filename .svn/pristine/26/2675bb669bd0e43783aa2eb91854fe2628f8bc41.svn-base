{extends file="layout/base.tpl"}
{block name="header"}
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
{/block}

{block name="body"}  
<div class="card-body ">
	{form_open()} 
	<div class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">
				{lang('text_user_name')} <span class="symbol required"></span>
			</label>
			<div class="col-sm-4">
				<select name="user_name" id="user_name" class="form-control" readonly>
					<option value="{$user_name}" selected>{$user_name}</option>
				</select>
				{form_error("user_name")}
			</div> 

			<div class="col-sm-3"> 
				<select class="col-sm-5 form-select" name="level" aria-label="Select Level">
					<option value="" {set_select('level', '')}>{lang('select_level')}</option>
					{for $level=1 to 100}
					<option value="{$level}" {set_select('level', $level)}>{$level}</option>
					{/for}
				</select>
			</div> 
			<div class="col-sm-3 " > 
				<button class="btn btn-primary" name="view_user_tree" id="view_user_tree" value="view_user_tree" type="submit">{lang('button_search')}</button>
			</div>
		</div>
	</div>
	{form_close()}  
</div>


{if ($level_users) }
{foreach from=$level_users item=$users}
<div class="mt-3" >
	<div class="card" >
		<div class="card-header bg-light">
			<div class="row align-items-center">
				<div class="col">
					<h5 class="mb-0" id="followers">{lang('text_level')}-{$users['user_level']} <span class="d-none d-sm-inline-block">({$users['count']})</span></h5>
				</div>
				<div class="col">
					<form>
						<div class="row g-0" >
							<div class="col">
								<input class="form-control form-control-sm " type="text" placeholder="Search..." />
							</div> 
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="card-body bg-light px-1 py-0">
			<div class="row g-0 text-center fs--1">
				{foreach from=$users item=user key=index name=users}
				{if is_numeric($index)}
				<div class="col-6 col-md-8 col-lg-3 col-xxl-2 mb-1" style="width:20%;">
					<div class="bg-white dark__bg-1100 p-3 h-100"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"  src="{assets_url()}images/profile/{$user.profile_pic}" alt="" width="100" />
						<h6 class="mb-1">{$user.user_name}</h6>
						<p class="fs--2 mb-1">{$user.full_name}</p>
					</div>
				</div>
				{/if}
				{/foreach}

			</div>
		</div>
	</div>
</div>
{/foreach}
{else}
<div class="display-5 mb-3" >
	<div class="card" >
		<div class="card-header bg-light text-center">		<p>
			<div class="display-5 mb-3" > 
				{lang('empty_level')}

			</div>
		</p>
	</div>
</div>
</div>
{/if} 


{/block}

{block name="footer"}

<script src="{assets_url()}plugins/select2/select2.min.js"></script>
<script>

	$(document).ready(function(){
		$('.user_name_ajax').select2({
			placeholder: "{lang('select_a_user')}",
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