{extends file="layout/base.tpl"}
{block name="header"}
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
<link href="{assets_url()}/plugins/notify/notify.css" rel="stylesheet" />   
<link type="text/javascript" src="{assets_url()}plugins/autocomplete/jquery-ui.min.css"></link>
<style type="text/css">
	.card-top-header {
		min-height: 100px;
		max-height: 100px;
	}

	.management-view{
		background-color: #edf2f9;
	}
</style>

{/block}
{block name="body"}  

<div class="card">
	<div class="card-body text-center py-5">
		<div class="row justify-content-center">
			<div class="col-7 col-md-5"><img class="img-fluid" src="{assets_url('images/icons/spot-illustrations/41.png')}" alt="" style="width:58%;" /></div>
		</div>
		<h3 class="mt-3 fw-normal fs-2 mt-md-4 fs-md-3">{lang('invite_friend')} {cur_format($referral_bonus)}</h3>
		<p class="lead mb-5">{lang('invite_your_friends')} <br class="d-none d-md-block" />{lang('everyone_you_invite')}
		</p>
		<div class="row justify-content-center">
			<div class="col-md-7">
				{form_open('')}
				<div class="row gx-2">
					<div class="col-sm mb-2 mb-sm-0">
						<input class="form-control" name="email" id="subscribe-email" type="email" placeholder="{lang('email_address')}" aria-label="Recipient's username" required />
					</div>
					<div class="col-sm-auto">
						<button class="btn btn-primary d-block w-100 email-button" id="submit" type="submit" name="submit" value="submit">{lang('send_invitation')}</button>
					</div>
				</div>
				{form_close()}
			</div>
		</div>
	</div>
	<div class="card-footer bg-light text-center pt-4">
		<div class="row justify-content-center">
			<div class="col-11 col-sm-10">
				<h4 class="fw-normal mb-0 fs-1 fs-md-2">{lang('more_ways_to')} <br class="d-sm-none" />{lang('invite_your_friendss')}</h4>
				<div class="row gx-2 my-4">
					<div class="col-lg-4">
						<button class="btn btn-falcon-default d-block w-100 mb-2 mb-xl-0"><img src="{assets_url('images/logo/gmail.png')}" width="20" alt="" /><span class="fw-medium ms-2"><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1" target="_blank">{lang('invite_from_gmail')}</a></span></button>
					</div>
					<div class="col-lg-4">
						<button class="btn btn-falcon-default d-block w-100 mb-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#copyLinkModal"><span class="fas fa-link text-700"></span><span class="fw-medium ms-2">{lang('copy_link')}</span></button>
						<div class="modal fade" id="copyLinkModal" tabindex="-1" role="dialog" aria-labelledby="copyLinkModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content overflow-hidden">
									<div class="modal-header">
										<h5 class="modal-title" id="copyLinkModalLabel">{lang('your_personal_link')}</h5>
										<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body bg-light p-4">
										<div class="row gx-2">
											<div class="col-sm mb-2 mb-sm-0">
												<input class="form-control form-control-sm invitation-link" id="myInput" value={base_url()}referral/{log_user_name()} />
											</div>
											<div class="col-sm-auto">
												<button class="btn btn-falcon-default d-block w-100  " onclick="myFunction()">{lang('copy')}</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<button class="btn btn-falcon-default d-block w-100 ms-0 mb-xl-0"><span class="fab fa-facebook-square text-facebook" data-fa-transform="grow-2"></span><span class="fw-medium ms-2"><a href="http://www.facebook.com/sharer.php?u={base_url()}referral/{log_user_name()}" target="_blank">{lang('share_on_facebook')}</a></span></button>
					</div>
				</div>
				<p class="mb-2 fs--1">{lang('once_you_invited')} <a href='{base_url()}admin/network/referral-tree'>{lang('view_the_status')}</a><br class="d-none d-lg-block d-xxl-none" />{lang('or_visit')}<a href="https://neomlmsoftware.com/contact/">{lang('help_center')}</a>{lang('if_you_have_any_questions')} </p>
			</div>
		</div>
	</div>
</div>

{/block}

{block name="footer"}
<script src="{assets_url()}/plugins/notify/notify.js"></script> 
<script>
	function myFunction() {
		var Text = document.getElementById("textbox");
		var copyText = document.getElementById("myInput");
		copyText.select();
		copyText.setSelectionRange(0, 99999); 
		navigator.clipboard.writeText(copyText.value);
		$('#copyLinkModal').modal('hide')
		$.notify(
			"{lang('copied_the_referral')}", 
			{ color: "#fff", background: "#38D9C8",blur: 0.4, delay:5000}
			);
	} 
</script>

{/block}