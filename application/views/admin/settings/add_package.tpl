{extends file="layout/base.tpl"}
{block name="header"}
<link rel="stylesheet" href="{assets_url()}backend/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{assets_url()}backend/libs/quill/quill.bubble.css"> 
{/block}
{block name="body"}
<div class="card">
	<div class="card-header">
		<h5 class="mb-0" data-anchor="data-anchor">{lang('add_package')}</h5>

	</div>
	<div class="card-body ">
		{form_open('','role="form"  class="row g-3 needs-validation" method="post" name="compose" id="compose" novalidate=""')}
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">{lang('package')}</label>
				<div class="controls">
					<input type="text" class="form-control" id="package_name" name="package_name" placeholder=""  autocomplete="off" value="{set_value('name', $single_details['name'])}"required>
					<div class="invalid-feedback">{lang('the_field_required')}</div>

					{form_error("package_name")}
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">{lang('amount')}</label>
				<div class="controls">
					<div class="input-group mb-3"><span class="input-group-text">$</span> 
						<input type="number" class="form-control" min=0 name="amount"  value="{set_value('amount', $single_details['amount'])}" autocomplete="off" required>
						<div class="invalid-feedback">{lang('the_field_required')}</div>
					</div>
					{form_error("amount")}
				</div>
			</div>
		</div>
		{* <div class="col-md-4">
			<div class="form-group">
				<label class="form-label">{lang('type')}</label>
				<div class="controls">
					<select id="type" name="type" class="form-control" >
						<option value="registration" {if $single_details['type']=='registration'}{/if}>{lang('registration')}</option>
						<option value="purchase" {if $single_details['type']=='purchase'}selected{/if}>{lang('purchase')}</option>
					</select> 
					{form_error("type")}
				</div>
			</div>
		</div> *}
	{* 	<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Roi</label>
				<div class="controls">
					<input type="number" class="form-control" name="roi" min=0 value="{set_value('roi', $single_details['roi'])}" autocomplete="off" required> 
					<div class="invalid-feedback">{lang('the_field_required')}</div>
				</div>
			</div>
		</div> *}
		{* <div class="col-md-4">
			<div class="form-group">
				<label class="form-label">{lang('status')}</label>
				<div class="controls">
					<select id="status" name="status" class="form-control" >
						<option value="active" {if $single_details['status']=='active'}selected{/if}>{lang('active')}</option>
						<option value="inactive" {if $single_details['status']=='inactive'}selected{/if}>{lang('inactive')}</option>
					</select> 
					{form_error("type")}
				</div>
			</div>
		</div> *}
	{* 	<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">{lang('sort_order')}</label>
				<div class="controls">
					<input class="form-control" min=0 name="sort_order" type="number"  value="{set_value('sort_order', $single_details['sort_order'])}" autocomplete="off"required/>
					<div class="invalid-feedback">{lang('the_field_required')}</div>
					{form_error("sort_order")}
				</div>
			</div>
		</div> *}
		
		{if $single_details['enc_id']}
		<div class="col-12">
			<button type="submit" class="btn btn-theme" name="update" value="update" id="update">{lang('update')}</button>
		</div>
		{else}
		<div class="col-12">
			<button type="submit" class="btn btn-theme" name="add" value="add" id="add">{lang('add')}</button>
		</div>
		{/if}
		{form_close()}
	</div>
</div>
{/block}
{block name="footer"}
<script src="{assets_url('plugins/select2/select2.min.js')}"></script> 
<script src="{assets_url('plugins/fileupload/bootstrap-fileupload.min.js')}"></script>
<script src="{assets_url()}backend/libs/quill/quill.min.js"></script>

<!-- Internal Quill JS -->
<script src="{assets_url()}backend/js/quill-editor.js"></script><script type="text/javascript">
	$('#time_zone').select2();
	$('#type').on('change',function() {

		if(this.value == 'registration'){
			$('#description_box').hide();
		}else{
			$('#description_box').show();
		}
	});
$("#compose").on("submit",function(e) {
		var content = $(".ql-editor").html();
		if (content != '<p><br></p>') {
			$("#description").val(content);
		}
	  	
	});
</script> 
</div>
</div>
{/block}