{extends file="layout/base.tpl"}
{block name="header"}
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/tree/css/hierarchy-view.css" rel="stylesheet" type="text/css" />
{/block}
{block name="body"}   
<div class="card-header ">
	{form_open('', 'role="form" class="smart-wizard form-horizontal" method="post"  name="user_category" id="user_form"')}
	<input type="hidden" name="category_type" id="category_type" value="{$category_type}" >
	<div class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">
				{lang('text_user_name')} <span class="symbol required"></span>
			</label>
			<div class="col-sm-3">
				<select name="user_id" id="user_id" class="form-control user_name_ajax" {set_select('user_id', set_value('user_id'))} required>
					{if $user_id}
					<option value="{$user_id}" selected>{$user_name}</option>
					{/if}
				</select>
				{form_error("user_id")}
			</div> 
			<div class="col-sm-4 "> 
				<button class="btn btn-primary" name="view_user_tree" id="view_user_tree" value="view_user_tree" type="submit">{lang('button_search')}</button>
			</div>
		</div>
	</div>
	{form_close()}  
</div>
<section class="management-view g-0"> 
	<div class="h-lg-100 overflow-hidden">
		<div class="card-header">
			<div class="row align-items-center">
				<div class="loading-div"></div> 
				<div class="ne-container">
					<div class="ne-wrapper">
						<div class="ne-item" id="tree"></div>
					</div>
				</div> 
			</div>
		</div>
	</div> 
</section>
{/block}

{block name="footer"}
<script type="text/javascript" src="{assets_url()}plugins/tree/js/tree.js"></script>
<script src="{assets_url()}plugins/select2/select2.min.js"></script>
<script>
	jQuery(document).ready(function () {
		generateTree('{$enc_id}', '{log_user_type()}', "sponsor_tree");
		$('.user_name_ajax').select2({
			placeholder: 'Select a User',
			ajax: {
				url: '{base_url()}user/autocomplete/getUserDownline_ajax',
				type:'post',
				dataType: 'json',
				data: function (params) {
					var query = {
						term: params.term,
						type: 'sponsor',

					}
					return query;
				},
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
