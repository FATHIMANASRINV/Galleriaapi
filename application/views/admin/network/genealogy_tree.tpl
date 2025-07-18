{extends file="layout/base.tpl"}
{block name="header"}
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/tree/css/hierarchy-view.css" rel="stylesheet" type="text/css" /> 
{/block}
{block name="body"}   

<div >
	<div class="card-body ">
		{form_open()} 
		<div class="form-group">
			<div class="row">
				<label class="col-sm-2 col-form-label">
					{lang('text_user_name')} <span class="symbol required"></span>
				</label>
				<div class="col-sm-5">
					<select name="user_id" id="user_id" class="form-control user_name_ajax" {set_select('user_id', set_value('user_id'))} required>
						{if $post_array['user_id']}
						<option value="{$post_array['user_id']}" selected>{$user_name}</option>
						{/if}
					</select>
					{form_error("user_id")}
				</div> 
				<div class="col-sm-4 "> 
					<button class="btn btn-theme" name="view_user_tree" id="view_user_tree" value="view_user_tree" type="submit">{lang('button_search')}</button>
				</div>
			</div>
		</div>
		{form_close()}  
	</div>

</div> 
<br>
<br>
<section class="management-view g-0"> 
	<div class="h-lg-100 overflow-hidden"> 
		<div class="row align-items-center">
			<div class="loading-div"></div> 
			<div class="ne-container">
				<div class="ne-wrapper">
					<div class="ne-item" id="tree"></div>
				</div>
			</div> 
		</div>
	</div> 
	
</section>

{/block}

{block name="footer"}

{* <script src="{assets_url()}plugins/dropzone/dist/js/dropify.min.js"></script> *}
<script type="text/javascript" src="{assets_url()}plugins/tree/js/tree.js"></script>
<script>
	jQuery(document).ready(function () {

		generateTree('{$enc_id}', '{log_user_type()}', "plan_tree");
        //UserValidation.init();
	});
	$(document).ready(function(){
		$('.user_name_ajax').select2({
			placeholder: 'Select a User',
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
<script src="{assets_url()}plugins/select2/select2.min.js"></script>

{/block}
