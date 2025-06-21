	{extends file="layout/base.tpl"}
	{block name="header"}
	<style type="text/css">
		h5{
			text-align: center;
		}
		button{
			align-items: center;
			width: 150px;
		}
	</style>
	{/block}
	{block name="body"} 
	<div class="row gx-4">
		<div class="col-xl-4 col-md-6 py-3 py-xl-5">
			<div class="card h-100">
				<div class="card-body p-30px d-flex flex-column">
					{form_open()}
					<div class="d-flex align-items-center">
						<div class="flex-1">
							<div class="h6 font-monospace">{$next_package['name']}</div>
							<div class="display-6 fw-bold mb-0">{$next_package['amount']}<small class="h6 text-body text-opacity-50"></small></div>
							<input type="hidden" name="package" class="form-control" value="{$next_package['package_id']}">
						</div>
						<div>
							<span class="iconify display-4 text-body text-opacity-50 rounded-3" data-icon="solar:usb-bold-duotone"></span>
						</div>
					</div>
					<hr class="my-20px" />
					<div class="mx-n2">
						<button  type="submit" name="purchase" value="purchase" class="btn btn-outline-theme btn-lg w-100 font-monospace">Purchase<i class="fa fa-arrow-right"></i></button>
					</div>
				</div>
				{form_close()}
			</div>
		</div>
	</div>
	{/block}
	{block name="footer"}


	{/block}