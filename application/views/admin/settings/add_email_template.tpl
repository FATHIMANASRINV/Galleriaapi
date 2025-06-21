{extends file="layout/base.tpl"}
{block name="header"}
<link rel="stylesheet" href="{assets_url()}backend/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{assets_url()}backend/libs/quill/quill.bubble.css">
{/block}
{block name="body"}

<div class="card">
	<div class="card-header">
		
		<h5 class="mb-0" data-anchor="data-anchor">{if $single_details['enc_id']}{lang('edit_mail')}{else}{lang('add_mail')}{/if}</h5>

	</div>
	<div class="card-body ">
		
		{form_open('','role="form"  class="row g-3 needs-validation" method="post" name="compose" id="compose" novalidate=""')}

		
		<div class="col-md-12">
			<div class="form-group">
				<label class="form-label">{lang('type')}</label>
				<div class="controls">
					<input class="form-control"  name="type" type="text" {if $single_details['type']} value="{$single_details['type']}" {else} value="{set_value('type')}"{/if} autocomplete="off" required />
					<div class="invalid-feedback">{lang('the_field_required')}</div>

					{form_error("type")}
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<label class="form-label">{lang('Content')}</label><br>
			<!-- <div class="form-group" id="select"> -->
				<span id="username" class="badge rounded-pill badge-soft-warning" style="cursor: pointer; ">{lang('username')}</span>
				<span id="firstname" class="badge rounded-pill badge-soft-warning" style="cursor: pointer;">{lang('firstname')}</span>
				<span id="password" class="badge rounded-pill badge-soft-warning" style="cursor: pointer;">{lang('password')}</span>
				<!-- </div> -->
				<div class="form-group">
					<div class="controls">
						<div id="editor">{$single_details['content']}</div>
						<textarea name="content" id="content" cols="80" rows="10"  class="tinymce d-none" >{$single_details['content']}</textarea>

						{form_error("content")}
					</div>
					
				</div>
			</div>


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

</div>
</div>

<script src="{assets_url()}backend/vendors/tinymce/tinymce.min.js"></script>
<!-- Quill Editor JS -->
<script src="{assets_url()}backend/libs/quill/quill.min.js"></script>
<!-- Internal Quill JS -->
<script src="{assets_url()}backend/js/quill-editor.js"></script>

<script type="text/javascript">
	// $(function() {
	// 	$("#select").change(function() {
	// 		var s = $(this).val(); 
	// 		alert(s);
	// 		tinyMCE.activeEditor.setContent(s);
	// 	});
	// });

	$(document).ready(function() {

		$("#username").on("click", function() {
			var myContent = tinymce.activeEditor.getContent({ format: "text" });
			var s=$(this).text();
			var result = myContent.concat(" ", s);
			// alert(result);
			tinyMCE.activeEditor.setContent(result);
		});
		$("#firstname").on("click", function() {
			var myContent = tinymce.activeEditor.getContent({ format: "text" });
			var s=$(this).text();
			var result = myContent.concat(" ", s);
			tinyMCE.activeEditor.setContent(result);
		});
		$("#password").on("click", function() {
			var myContent = tinymce.activeEditor.getContent({ format: "text" });
			var s=$(this).text();
			var result = myContent.concat(" ", s);
			tinyMCE.activeEditor.setContent(result);
		});

		$("#compose").on("submit",function(e) {
			var content = $(".ql-editor").html();
			if (content != '<p><br></p>') {
				$("#content").val(content);
			}
		});
	});
</script>

{/block}