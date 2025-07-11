{extends file="layout/base.tpl"}
{block name="header"} 
<link href="{assets_url()}plugins/notify/notify.css" rel="stylesheet" /> 
{/block}
{block name="body"}  
<div class="row">
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Total Community Members</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0">{$total_users}</h3>
					</div>
					<div class="col-5">
						<div class="mt-n2" data-render="apexchart" data-type="bar" data-title="Visitors" data-height="30"></div>
					</div>
				</div>
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Direct Affiliate Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0">{cur_format($user_wallet['referral_bonus'])}</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="donut" data-title="Visitors" data-height="45"></div>
					</div>
				</div>
				{* <div class="small text-inverse text-opacity-50 text-truncate">
					<i class="fa fa-chevron-up fa-fw me-1"></i> 5.3% more than last week<br>
					<i class="far fa-hdd fa-fw me-1"></i> 10.5% from total usage<br>
					<i class="far fa-hand-point-up fa-fw me-1"></i> 2MB per visit
				</div> *}
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Community Matrix Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0">{cur_format($user_wallet['level_bonus'])}</h3>
					</div>
					<div class="col-5">
						<div class="mt-n2" data-render="apexchart" data-type="line" data-title="Visitors" data-height="30"></div>
					</div>
				</div>
				
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Global Community Pool Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0">{cur_format($user_wallet['global_bonus'])}</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="pie" data-title="Visitors" data-height="45"></div>
					</div>
				</div>
				{* <div class="small text-inverse text-opacity-50 text-truncate">
					<i class="fa fa-chevron-up fa-fw me-1"></i> 59.5% more than last week<br>
					<i class="fab fa-facebook-f fa-fw me-1"></i> 45.5% from facebook<br>
					<i class="fab fa-youtube fa-fw me-1"></i> 15.25% from youtube
				</div> *}
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-3 col-lg-6 mt-4">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Missed Income</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0">{cur_format($user_wallet['missed_level_income'])}</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="donut" data-title="Visitors" data-height="45"></div>
					</div>
				</div>
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 mt-4">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Pending Global Pool Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0">{cur_format($pending_bonus)}</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="donut" data-title="Visitors" data-height="45"></div>
					</div>
				</div>
			</div>
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
		</div>
	</div>
</div>
{/block}
{block name="footer"}   
<script type="text/javascript">
	function copyReferral(element) {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(element).text()).select();
		document.execCommand("copy");
		$temp.remove();
		$.notify(
			"{lang('copied_the_referral')}", 
			{ color: "#fff", background: "#22c03c",blur: 0.4, delay:5000}
			);
	}
</script>

{/block}
