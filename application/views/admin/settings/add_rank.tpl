{extends file="layout/base.tpl"}
{block name="header"}

{/block}
{block name="body"}

<div class="card">
	<div class="card-header">
		
		<h5 class="mb-0" data-anchor="data-anchor">{lang('add_rank')}</h5>

	</div>
	<div class="card-body ">
		
		{form_open('','role="form"  class="row g-3 needs-validation" method="post" name="compose" id="compose" novalidate=""')}


		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">{lang('rank')}</label>
				<div class="controls">
					<input type="text" class="form-control" id="rank_name" name="rank_name" placeholder=""  autocomplete="off" value="{set_value('rank_name', $single_details['name'])}" required>
					<div class="invalid-feedback">{lang('the_field_required')}</div>

					{form_error("rank_name")}
				</div>
			</div>
		</div>
		

		
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">{lang('referral_count')}</label>
				<div class="controls">
					<input type="number" class="form-control" min="0"  name="referral_count"  value="{set_value('referral_count', $single_details['referral_count'])}" autocomplete="off" required>
					<div class="invalid-feedback">{lang('the_field_required')}</div>

					{form_error("referral_count")}
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">{lang('bonus')}</label>
				<div class="controls">
					<div class="input-group mb-3"><span class="input-group-text">$</span> 
						<input type="number" class="form-control" min="0"  name="bonus"  value="{set_value('bonus', $single_details['bonus'])}" autocomplete="off" required> 
						<div class="invalid-feedback">{lang('the_field_required')}</div>
					</div>
					{form_error("bonus")}
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">{lang('status')}</label>
				<div class="controls">
					<select id="status" name="status" class="form-control" >
						<option value="active" {if $single_details['status']=='active'}selected{/if}>{lang('active')}</option>
						<option value="inactive" {if $single_details['status']=='inactive'}selected{/if}>{lang('inactive')}</option>

					</select> 

				</div>
			</div>
		</div>



		{if $single_details['enc_id']}
		<div class="col-12  justify-content-end">
			<button type="submit" class="btn btn-outline-theme btn-lg d-block w-50" name="update" value="update" id="update">{lang('update')}</button>

		</div>
		{else}
		<div class="col-12  justify-content-end">
			<button type="submit" class="btn btn-outline-theme btn-lg d-block w-50" name="add" value="add" id="add">{lang('add')}</button>

		</div>
		{/if}
		{form_close()}
	</div>
</div>
{/block}
{block name="footer"}

</div>
</div>


{/block}