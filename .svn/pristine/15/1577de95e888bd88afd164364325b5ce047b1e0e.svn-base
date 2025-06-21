
{form_open("{base_url()}user/member/upgrade_step2/{$package.enc_id}",'id="upgrade_package"')}

<div class="modal-body py-4 px-5">

	<div class="mb-3">
		<label class="form-label" for="modal-auth-name">{lang('package_name')} </label>
		<label class="form-label" for="modal-auth-name"> {$package.name}</label>
	</div>
	<div class="mb-3">
		<label class="form-label" for="modal-auth-email">{lang('package_amount')}</label>
		<label class="form-label" for="modal-auth-email">{cur_format($package.amount)}</label>

	</div>

	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">{lang('free')}</a></li>


	</ul>

	<div class="tab-content border-x border-bottom p-3" id="myTabContent">
		<div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">

			<div class="mb-3">
				<input type="submit" class="btn btn-primary d-block w-100 mt-3"  name="payment_method" value="Free">
			</div>

		</div>
	</div>
</div>


{form_close()} 