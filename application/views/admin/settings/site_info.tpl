{extends file="layout/base.tpl"}
{block name="header"}
<link rel="stylesheet" type="text/css" href="{assets_url('plugins/select2/select2.min.css')}">
<link rel="stylesheet" type="text/css" href="{assets_url('plugins/fileupload/bootstrap-fileupload.min.css')}">
{* <link rel="stylesheet" type="text/css" href="{assets_url('plugins/validation/css/form-validation.css')}"> *}
<link rel="stylesheet" href="{assets_url()}backend/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{assets_url()}backend/libs/quill/quill.bubble.css">

{/block}

{block name="body"}   

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0" data-anchor="data-anchor">{lang('site_info')}</h5>
			</div>
			<div class="card-body ">

				{form_open_multipart('','role="form"  class="row g-3 needs-validation" method="post" name="compose" id="compose" novalidate=""')}

				<div class="col-sm-6">
					<div class="form-group">
						<label class="form-label">{lang('name')}</label>
						<div class="controls">
							<input class="form-control" name="name" type="text" value="{set_value('name', $site_info['name'])}" autocomplete="off" required="" minlength="5" required>
							<div class="invalid-feedback">{lang('the_field_required')}</div>

							{form_error("name")}
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label class="form-label" for="email">{lang('email')}</label>
						<div class="controls">
							<input type="email" class="form-control" name="email"  value="{set_value('email', $site_info['email'])}" required="" required>
							<div class="invalid-feedback">{lang('the_field_required')}</div>
							{form_error("email")}
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="form-label" >{lang('address')}</label>
					<div class="controls">
						<div id="editor">{$site_info['address']}</div>
						<textarea cols="50" rows="5" class="form-control d-none"  name='address' id='address' required>{set_value('address', $site_info['address'])}</textarea>
						{form_error("address")}
					</div>
				</div>


				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="form-label">{lang('phone')}</label>
								<div class="controls">
									<input class="form-control"  name="phone" type="text" value="{set_value('phone', $site_info['phone'])}" required="" required />
									<div class="invalid-feedback">{lang('the_field_required')}</div>
									{form_error("phone")}
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<label class="form-label" >{lang('time_zone')}</label>
							<select class="form-control " id="time_zone" name="time_zone">
								{foreach $timezones as $v }
								<option value="{$v}" {set_select('time_zone', {$v}, ($v == $site_info['time_zone']))}>{$v}</option>
								{/foreach}
							</select>
							{form_error("time_zone")}
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label" >{lang('facebook')}</label>
								<div class="controls">
									<input class="form-control" name="facebook" id="facebook" type="text" value="{set_value('facebook', $site_info['facebook'])}"  required="" required />
									<div class="invalid-feedback">{lang('the_field_required')}</div>
									{form_error("facebook")}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">{lang('twitter')}</label>
								<div class="controls">
									<input class="form-control" name="twitter" id="" type="text"  value="{set_value('twitter', $site_info['twitter'])}" required="" required />
									<div class="invalid-feedback">{lang('the_field_required')}</div>
									{form_error("twitter")}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="row">
						<div class="col-md-6">
							<label class="form-label">{lang('logo')}</label>					 
							<div class="fileupload fileupload-new " data-provides="fileupload">
								<div class="fileupload-preview thumbnail border" style="width: 200px; height: 150px;"><img src="{assets_url('images/logo/')}{$site_info['logo']}" alt="">
								</div>
								<div>
									<span class="btn btn-info me-1 mb-1 btn-file">
										<span class="fileupload-new">{lang('select_image')}</span>
										<span class="fileupload-exists">{lang('change')}</span>
										<input type="file" name="userfile">
									</span>
									<a href="#" class="btn btn-outline-dark me-1 mb-1 fileupload-exists" data-dismiss="fileupload">{lang('remove')}</a>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<label class="form-label">{lang('favicon')}</label>					 
							<div class="fileupload fileupload-new " data-provides="fileupload">
								<div class="fileupload-preview thumbnail border" style="width: 200px; height: 150px;"><img src="{assets_url('images/logo/')}{$site_info['favicon']}" alt="{lang('favicon')}">
								</div>
								<div>
									<span class="btn btn-info me-1 mb-1 btn-file">
										<span class="fileupload-new">{lang('select_fav')}</span>
										<span class="fileupload-exists">{lang('change')}</span>
										<input type="file" name="favicon">

									</span>
									<a href="#" class="btn btn-outline-dark me-1 mb-1 fileupload-exists" data-dismiss="fileupload">{lang('remove')}</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-outline-theme btn-lg d-block w-50" name="update" value="update">{lang('update')}</button>
				</div>
				{form_close()}
			</div>
		</div>
	</div>
</div>
{/block} 
{block name="footer"}
<script src="{assets_url('plugins/select2/select2.min.js')}"></script> 
<script src="{assets_url('plugins/fileupload/bootstrap-fileupload.min.js')}"></script>
{* <script src="{assets_url('plugins/validation/js/jqBootstrapValidation.js')}"></script>
<script src="{assets_url('plugins/validation/js/form-validation.js')}"></script> *}
<script src="{assets_url()}backend/vendors/tinymce/tinymce.min.js"></script>
<!-- Quill Editor JS -->
<script src="{assets_url()}backend/libs/quill/quill.min.js"></script>

<!-- Internal Quill JS -->
<script src="{assets_url()}backend/js/quill-editor.js"></script>


<script type="text/javascript">
	$('#time_zone').select2();

	$("#compose").on("submit",function(e) {
		var content = $(".ql-editor").html();
		if (content != '<p><br></p>') {
			$("#address").val(content);
		}

	});
</script> 

{/block} 