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
						<h3 class="mb-0">{cur_format($wallet_details['referral_total'])}</h3>
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
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">Community Matrix Bonus</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0">{cur_format($wallet_details['level_total'])}</h3>
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
						<h3 class="mb-0">{cur_format($wallet_details['global_bonus'])}</h3>
					</div>
					<div class="col-5">
						<div class="mt-n3 mb-n2" data-render="apexchart" data-type="pie" data-title="Visitors" data-height="45"></div>
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
					<span class="flex-grow-1">Missed Income</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="row align-items-center mb-2">
					<div class="col-7">
						<h3 class="mb-0">{cur_format($wallet_details['missed_level_income'])}</h3>
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
	{* <div class="col-xl-6">
		<div class="card mb-3 h-100">
			<div class="card-body">
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">SERVER STATS</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<div class="ratio ratio-21x9 mb-3">
					<div id="chart-server"></div>
				</div>
				<div class="row">
					<!-- BEGIN col-6 -->
					<div class="col-lg-6 mb-3 mb-lg-0">
						<div class="d-flex align-items-center">
							<!-- BEGIN chart -->
							<div class="w-50px h-50px">
								<div data-render="apexchart" data-type="donut" data-title="Visitors" data-height="50"></div>
							</div>
							<!-- END chart -->
							<!-- BEGIN info -->
							<div class="ps-3 flex-1">
								<div class="fs-10px fw-bold text-inverse text-opacity-50 mb-1">DISK USAGE</div>
								<div class="mb-2 fs-5 text-truncate">20.04 / 256 GB</div>
								<div class="progress h-3px bg-secondary-transparent-2 mb-1">
									<div class="progress-bar bg-theme" style="width: 20%"></div>
								</div>
								<div class="fs-11px text-inverse text-opacity-50 mb-2 text-truncate">
									Last updated 1 min ago
								</div>
								<div class="d-flex align-items-center small">
									<i class="bi bi-circle-fill fs-6px me-2 text-theme"></i> 
									<div class="flex-1">DISK C</div>
									<div>19.56GB</div> 
								</div>
								<div class="d-flex align-items-center small">
									<i class="bi bi-circle-fill fs-6px me-2 text-theme text-opacity-50"></i> 
									<div class="flex-1">DISK D</div>
									<div>0.50GB</div> 
								</div>
							</div>
							<!-- END info -->
						</div>
					</div>
					<!-- END col-6 -->
					<!-- BEGIN col-6 -->
					<div class="col-lg-6">
						<div class="d-flex">
							<!-- BEGIN chart -->
							<div class="w-50px pt-3">
								<div data-render="apexchart" data-type="donut" data-title="Visitors" data-height="50"></div>
							</div>
							<!-- END chart -->
							<!-- BEGIN info -->
							<div class="ps-3 flex-1">
								<div class="fs-10px fw-bold text-inverse text-opacity-50 mb-1">BANDWIDTH</div>
								<div class="mb-2 fs-5 text-truncate">83.76GB / 10TB</div>
								<div class="progress h-3px bg-secondary-transparent-2 mb-1">
									<div class="progress-bar bg-theme" style="width: 10%"></div>
								</div>
								<div class="fs-11px text-inverse text-opacity-50 mb-2 text-truncate">
									Last updated 1 min ago
								</div>
								<div class="d-flex align-items-center small">
									<i class="bi bi-circle-fill fs-6px me-2 text-theme"></i> 
									<div class="flex-1">HTTP</div>
									<div>35.47GB</div> 
								</div>
								<div class="d-flex align-items-center small">
									<i class="bi bi-circle-fill fs-6px me-2 text-theme text-opacity-50"></i> 
									<div class="flex-1">FTP</div>
									<div>1.25GB</div> 
								</div>
							</div>
							<!-- END info -->
						</div>
					</div>
					<!-- END col-6 -->
				</div>
				<!-- END row -->
			</div>
			<!-- END card-body -->
			
			<!-- BEGIN card-arrow -->
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
			<!-- END card-arrow -->
		</div>
		<!-- END card -->
	</div> *}
	<!-- END col-6 -->
	
	<!-- BEGIN col-6 -->
	{* <div class="col-xl-6">
		<!-- BEGIN card -->
		<div class="card mb-3 h-100">
			<!-- BEGIN card-body -->
			<div class="card-body">
				<!-- BEGIN title -->
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">TRAFFIC ANALYTICS</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<!-- END title -->
				<!-- BEGIN map -->
				<div class="ratio ratio-21x9 mb-3">
					<div id="world-map" class="jvectormap-without-padding"></div>
				</div>
				<!-- END map -->
				<!-- BEGIN row -->
				<div class="row gx-4">
					<!-- BEGIN col-6 -->
					<div class="col-lg-6 mb-3 mb-lg-0">
						<table class="w-100 small mb-0 text-truncate text-inverse text-opacity-60">
							<thead>
								<tr class="text-inverse text-opacity-75">
									<th class="w-50">COUNTRY</th>
									<th class="w-25 text-end">VISITS</th>
									<th class="w-25 text-end">PCT%</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>FRANCE</td>
									<td class="text-end">13,849</td>
									<td class="text-end">40.79%</td>
								</tr>
								<tr>
									<td>SPAIN</td>
									<td class="text-end">3,216</td>
									<td class="text-end">9.79%</td>
								</tr>
								<tr class="text-theme fw-bold">
									<td>MEXICO</td>
									<td class="text-end">1,398</td>
									<td class="text-end">4.26%</td>
								</tr>
								<tr>
									<td>UNITED STATES</td>
									<td class="text-end">1,090</td>
									<td class="text-end">3.32%</td>
								</tr>
								<tr>
									<td>BELGIUM</td>
									<td class="text-end">1,045</td>
									<td class="text-end">3.18%</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- END col-6 -->
					<!-- BEGIN col-6 -->
					<div class="col-lg-6">
						<!-- BEGIN card -->
						<div class="card">
							<!-- BEGIN card-body -->
							<div class="card-body py-2">
								<div class="d-flex align-items-center">
									<div class="w-70px">
										<div data-render="apexchart" data-type="donut" data-height="70"></div>
									</div>
									<div class="flex-1 ps-2">
										<table class="w-100 small mb-0 text-inverse text-opacity-60">
											<tbody>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-95"></div> FEED
														</div>
													</td>
													<td class="text-end">25.70%</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-75"></div> ORGANIC
														</div>
													</td>
													<td class="text-end">24.30%</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-55"></div> REFERRAL
														</div>
													</td>
													<td class="text-end">23.05%</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-35"></div> DIRECT
														</div>
													</td>
													<td class="text-end">14.85%</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-15"></div> EMAIL
														</div>
													</td>
													<td class="text-end">7.35%</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- END card-body -->
							
							<!-- BEGIN card-arrow -->
							<div class="card-arrow">
								<div class="card-arrow-top-left"></div>
								<div class="card-arrow-top-right"></div>
								<div class="card-arrow-bottom-left"></div>
								<div class="card-arrow-bottom-right"></div>
							</div>
							<!-- END card-arrow -->
						</div>
						<!-- END card -->
					</div>
					<!-- END col-6 -->
				</div>
				<!-- END row -->
			</div>
			<!-- END card-body -->
			
			<!-- BEGIN card-arrow -->
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
			<!-- END card-arrow -->
		</div>
		<!-- END card -->
	</div> *}
	<!-- END col-6 -->
	
	<!-- BEGIN col-6 -->
	{* <div class="col-xl-6">
		<!-- BEGIN card -->
		<div class="card mb-3 h-100">
			<!-- BEGIN card-body -->
			<div class="card-body">
				<!-- BEGIN title -->
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">TOP PRODUCTS</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<!-- END title -->
				<!-- BEGIN table -->
				<div class="table-responsive">
					<table class="w-100 mb-0 small align-middle text-nowrap">
						<tbody>
							<tr>
								<td>
									<div class="d-flex">
										<div class="position-relative mb-2">
											<div class="bg-position-center bg-size-cover bg-repeat-no-repeat w-80px h-60px" style="background-image: url({assets_url()}backend/img/dashboard/product-1.jpeg);">
											</div>
											<div class="position-absolute top-0 start-0">
												<span class="badge bg-theme text-theme-900 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">1</span>
											</div>
										</div>
										<div class="flex-1 ps-3">
											<div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-secondary bg-opacity-25 text-inverse text-opacity-75 pt-5px">SKU90400</small></div>
											<div class="fw-500 text-inverse">Huawei Smart Watch</div>
											$399.00
										</div>
									</div>
								</td>
								<td>
									<table class="mb-2">
										<tr>
											<td class="pe-3">QTY:</td>
											<td class="text-inverse text-opacity-75 fw-500">129</td>
										</tr>
										<tr>
											<td class="pe-3">REVENUE:</td>
											<td class="text-inverse text-opacity-75 fw-500">$51,471</td>
										</tr>
										<tr>
											<td class="pe-3 text-nowrap">PROFIT:</td>
											<td class="text-inverse text-opacity-75 fw-500">$15,441</td>
										</tr>
									</table>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<div class="d-flex mb-2 align-items-center">
										<div class="position-relative">
											<div class="bg-position-center bg-size-cover bg-repeat-no-repeat w-80px h-60px" style="background-image: url({assets_url()}backend/img/dashboard/product-2.jpeg);">
											</div>
											<div class="position-absolute top-0 start-0">
												<span class="badge bg-theme text-theme-900 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">2</span>
											</div>
										</div>
										<div class="flex-1 ps-3">
											<div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-secondary bg-opacity-25 text-inverse text-opacity-75 pt-5px">SKU85999</small></div>
											<div class="text-inverse fw-500">Nike Shoes Black Version</div>
											$99.00
										</div>
									</div>
								</td>
								<td>
									<table class="mb-2">
										<tr>
											<td class="pe-3">QTY:</td>
											<td class="text-inverse text-opacity-75 fw-500">108</td>
										</tr>
										<tr>
											<td class="pe-3">REVENUE:</td>
											<td class="text-inverse text-opacity-75 fw-500">$10,692</td>
										</tr>
										<tr>
											<td class="pe-3 text-nowrap">PROFIT:</td>
											<td class="text-inverse text-opacity-75 fw-500">$5,346</td>
										</tr>
									</table>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<div class="d-flex mb-2 align-items-center">
										<div class="position-relative">
											<div class="bg-position-center bg-size-cover bg-repeat-no-repeat w-80px h-60px" style="background-image: url({assets_url()}backend/img/dashboard/product-3.jpeg);">
											</div>
											<div class="position-absolute top-0 start-0">
												<span class="badge bg-theme text-theme-900 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">3</span>
											</div>
										</div>
										<div class="flex-1 ps-3">
											<div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-secondary bg-opacity-25 text-inverse text-opacity-75 pt-5px">SKU20400</small></div>
											<div class="text-inverse fw-500">White Sony PS4</div>
											$599
										</div>
									</div>
								</td>
								<td>
									<table class="mb-2">
										<tr>
											<td class="pe-3">QTY:</td>
											<td class="text-inverse text-opacity-75 fw-500">72</td>
										</tr>
										<tr>
											<td class="pe-3">REVENUE:</td>
											<td class="text-inverse text-opacity-75 fw-500">$43,128</td>
										</tr>
										<tr>
											<td class="pe-3 text-nowrap">PROFIT:</td>
											<td class="text-inverse text-opacity-75 fw-500">$4,312</td>
										</tr>
									</table>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<div class="d-flex mb-2 align-items-center">
										<div class="position-relative">
											<div class="bg-position-center bg-size-cover bg-repeat-no-repeat w-80px h-60px" style="background-image: url({assets_url()}backend/img/dashboard/product-4.jpeg);">
											</div>
											<div class="position-absolute top-0 start-0">
												<span class="badge bg-black bg-opacity-50 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">4</span>
											</div>
										</div>
										<div class="flex-1 ps-3">
											<div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-secondary bg-opacity-25 text-inverse text-opacity-75 pt-5px">SKU19299</small></div>
											<div class="text-inverse fw-500">Apple Watch Series 5</div>
											$1,099
										</div>
									</div>
								</td>
								<td>
									<table class="mb-2">
										<tr>
											<td class="pe-3">QTY:</td>
											<td class="text-inverse text-opacity-75 fw-500">53</td>
										</tr>
										<tr>
											<td class="pe-3">REVENUE:</td>
											<td class="text-inverse text-opacity-75 fw-500">$58,247</td>
										</tr>
										<tr>
											<td class="pe-3 text-nowrap">PROFIT:</td>
											<td class="text-inverse text-opacity-75 fw-500">$2,912</td>
										</tr>
									</table>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="position-relative">
											<div class="bg-position-center bg-size-cover bg-repeat-no-repeat w-80px h-60px" style="background-image: url({assets_url()}backend/img/dashboard/product-5.jpeg);">
											</div>
											<div class="position-absolute top-0 start-0">
												<span class="badge bg-black bg-opacity-50 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">5</span>
											</div>
										</div>
										<div class="flex-1 ps-3">
											<div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-secondary bg-opacity-25 text-inverse text-opacity-75 pt-5px">SKU19299</small></div>
											<div class="text-inverse fw-500">Black Nikon DSLR</div>
											1,899
										</div>
									</div>
								</td>
								<td>
									<table>
										<tr>
											<td class="pe-3">QTY:</td>
											<td class="text-inverse text-opacity-75 fw-500">50</td>
										</tr>
										<tr>
											<td class="pe-3">REVENUE:</td>
											<td class="text-inverse text-opacity-75 fw-500">$90,950</td>
										</tr>
										<tr>
											<td class="pe-3 text-nowrap">PROFIT:</td>
											<td class="text-inverse text-opacity-75 fw-500">$2,848</td>
										</tr>
									</table>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- END table -->
			</div>
			<!-- END card-body -->
			
			<!-- BEGIN card-arrow -->
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
			<!-- END card-arrow -->
		</div>
		<!-- END card -->
	</div> *}
	<!-- END col-6 -->
	
	<!-- BEGIN col-6 -->
	{* <div class="col-xl-6">
		<!-- BEGIN card -->
		<div class="card mb-3">
			<!-- BEGIN card-body -->
			<div class="card-body">
				<!-- BEGIN title -->
				<div class="d-flex fw-bold small mb-3">
					<span class="flex-grow-1">ACTIVITY LOG</span>
					<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
				</div>
				<!-- END title -->
				<!-- BEGIN table -->
				<div class="table-responsive">
					<table class="table table-striped table-borderless mb-2px small text-nowrap">
						<tbody>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
										You have sold an item - $1,299
									</span>
								</td>
								<td><small>just now</small></td>
								<td>
									<span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PRODUCT</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-inverse-transparent-3 me-2"></i>
										Firewall upgrade 
									</span>
								</td>
								<td><small>1 min ago</small></td>
								<td>
									<span class="badge d-block text-inverse bg-secondary bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">SERVER</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-inverse-transparent-3 me-2"></i>
										Push notification v2.0 installation
									</span>
								</td>
								<td><small>1 mins ago</small></td>
								<td>
									<span class="badge d-block text-inverse bg-secondary bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">ANDROID</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
										New Subscription - 1yr Plan 
									</span>
								</td>
								<td><small>1 min ago</small></td>
								<td>
									<span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">SALES</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-inverse text-opacity-25 me-2"></i>
										2 Unread enquiry
									</span>
								</td>
								<td><small>2 mins ago</small></td>
								<td>
									<span class="badge d-block text-inverse bg-secondary bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">ENQUIRY</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
										$30,402 received from Paypal
									</span>
								</td>
								<td><small>2 mins ago</small></td>
								<td>
									<span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PAYMENT</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
										3 payment received
									</span>
								</td>
								<td><small>5 mins ago</small></td>
								<td>
									<span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PAYMENT</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-inverse text-opacity-25 me-2"></i>
										1 pull request from github
									</span>
								</td>
								<td><small>5 mins ago</small></td>
								<td>
									<span class="badge d-block text-inverse bg-secondary bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">GITHUB</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-inverse-transparent-3 me-2"></i>
										3 pending invoice to generate
									</span>
								</td>
								<td><small>5 mins ago</small></td>
								<td>
									<span class="badge d-block text-inverse bg-secondary bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">INVOICE</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
							<tr>
								<td>
									<span class="d-flex align-items-center">
										<i class="bi bi-circle-fill fs-6px text-inverse text-opacity-25 me-2"></i>
										2 new message from fb messenger
									</span>
								</td>
								<td><small>7 mins ago</small></td>
								<td>
									<span class="badge d-block text-inverse bg-secondary bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">INBOX</span>
								</td>
								<td><a href="#" class="text-decoration-none text-inverse"><i class="bi bi-search"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- END table -->
			</div>
			<!-- END card-body -->
			
			<!-- BEGIN card-arrow -->
			<div class="card-arrow">
				<div class="card-arrow-top-left"></div>
				<div class="card-arrow-top-right"></div>
				<div class="card-arrow-bottom-left"></div>
				<div class="card-arrow-bottom-right"></div>
			</div>
			<!-- END card-arrow -->
		</div>
		<!-- END card -->
	</div> *}
	<!-- END col-6 -->
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
