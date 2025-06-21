{extends file="layout/base.tpl"}
{block name="header"}
{* <link rel="stylesheet" type="text/css" href="{assets_url('plugins/validation/css/form-validation.css')}"> *}
<link rel="stylesheet" href="{assets_url()}backend/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{assets_url()}backend/libs/quill/quill.bubble.css">
{/block}

{block name="body"}
<div class="card"> 
	<div class="card-body ">		
		{form_open('','role="form"  class="row g-3 needs-validation" method="post" name="compose" id="compose" novalidate=""')}
		<div class="col-md-12">		
			<div class="form-group">
				<div class="controls">
					<div id="editor">{$single_details.content}</div>
					<textarea cols="100" rows="50" class="tinymce d-none" name="content" id="content" required>{$single_details.content}</textarea>
				</div>
				<div class="invalid-feedback">{lang('the_field_required')}</div>

				{form_error("content")}
			</div>
		</div> 
		<div class="col-12">
			<button type="submit" class="btn btn-theme" name="update" value="update" id="update">{lang('update')}</button>
		</div>

		{form_close()}
	</div>
</div>
{/block}

{block name="footer"} 
<script src="{assets_url()}backend/vendors/tinymce/tinymce.min.js"></script>
<!-- Quill Editor JS -->
<script src="{assets_url()}backend/libs/quill/quill.min.js"></script>
<!-- Internal Quill JS -->
<script src="{assets_url()}backend/js/quill-editor.js"></script>
<script type="text/javascript">
	$("#compose").on("submit",function(e) {
		var content = $(".ql-editor").html();
		if (content != '<p><br></p>') {
			$("#content").val(content);
		}
	});
</script>
{* <script src="{assets_url('plugins/validation/js/jqBootstrapValidation.js')}"></script>
<script src="{assets_url('plugins/validation/js/form-validation.js')}"></script> *}
{/block}