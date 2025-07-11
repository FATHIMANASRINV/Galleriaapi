{extends file="layout/base.tpl"}

{block name="body"}   

<div class="card">
	<div class="card-body text-center py-5">
		<div class="row justify-content-center">
			<div class="col-7 col-md-5"><img class="img-fluid" src="{assets_url()}images/icons/spot-illustrations/41.png" alt="" style="width:58%;" /></div>
		</div>
		<h3 class="mt-3 fw-normal fs-2 mt-md-4 fs-md-3">Invite a friend, you both get $100</h3>
		<p class="lead mb-5">Invite your friends and start working together in seconds. <br class="d-none d-md-block" />Everyone you invite will receive a welcome email.
		</p>
		<div class="row justify-content-center">
			<div class="col-md-7">
				<form class="row gx-2">
					<div class="col-sm mb-2 mb-sm-0">
						<input class="form-control" type="email" placeholder="Email address" aria-label="Recipient's username" />
					</div>
					<div class="col-sm-auto">
						<button class="btn btn-primary d-block w-100" type="submit">Send Invitation</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="card-footer bg-light text-center pt-4">
		<div class="row justify-content-center">
			<div class="col-11 col-sm-10">
				<h4 class="fw-normal mb-0 fs-1 fs-md-2">More ways to <br class="d-sm-none" /> invite your friends</h4>
				<div class="row gx-2 my-4">
					<div class="col-lg-4">
						<button class="btn btn-falcon-default d-block w-100 mb-2 mb-xl-0"><img src="{assets_url()}images/logo/gmail.png" width="20" alt="" /><span class="fw-medium ms-2">Invite from Gmail</span></button>
					</div>
					<div class="col-lg-4">
						<button class="btn btn-falcon-default d-block w-100 mb-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#copyLinkModal"><span class="fas fa-link text-700"></span><span class="fw-medium ms-2">Copy Link</span></button>
						<div class="modal fade" id="copyLinkModal" tabindex="-1" role="dialog" aria-labelledby="copyLinkModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content overflow-hidden">
									<div class="modal-header">
										<h5 class="modal-title" id="copyLinkModalLabel">Your personal referral link</h5>
										<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body bg-light p-4">
										<form>
											<input class="form-control form-control-sm invitation-link" value="https://falcon.com/invited" />
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<button class="btn btn-falcon-default d-block w-100 ms-0 mb-xl-0"><span class="fab fa-facebook-square text-facebook" data-fa-transform="grow-2"></span><span class="fw-medium ms-2">Share on Facebook</span></button>
					</div>
				</div>
				<p class="mb-2 fs--1">Once you’ve invited friends, you can <a href="#!">view the status of your referrals</a><br class="d-none d-lg-block d-xxl-none" /> or visit our <a href="#!">Help Center </a>if you have any questions. </p>
			</div>
		</div>
	</div>
</div>
{/block} 