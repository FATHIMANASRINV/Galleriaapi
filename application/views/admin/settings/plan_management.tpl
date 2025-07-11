{extends file="layout/base.tpl"}
{block name="header"}
{/block}
{block name="body"}
<div class="row g-12">
	<div class="col-xl-12 pe-xl-12">
		<div class="card lg-12">
			<div class="card-header">
				<div class="row flex-between-end">
					<div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
						<h5 class="mb-0" data-anchor="data-anchor">{lang('plan_management')}</h5>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-f1a0c56a-40c8-47fa-a0c0-3da978a3a908" id="dom-f1a0c56a-40c8-47fa-a0c0-3da978a3a908">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">{lang('plan_settings')}</a></li>
							{* <li class="nav-item"><a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">{lang('configuration')}</a></li> *}
							<li class="nav-item"><a class="nav-link" id="level-tab" data-bs-toggle="tab" href="#tab-level" role="tab" aria-controls="tab-level" aria-selected="false">{lang('level_commission')}</a></li>
						</ul>
						<div class="tab-content border-x border-bottom p-3" id="myTabContent">
							<div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
								<div class="table-responsive">
									<div class="table-responsive">		
										{form_open('','role="form" class="needs-validation" novalidate=""')} 
										<table class="table">
											<thead>
												<tr>
													<th class="text-center">#</th>
													<th>{lang('name')}</th>
													<th>{lang('value')}</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-center" >{counter}</td>
													<td >{lang('transaction_fee')}</td>

													<td >
														<div class="form-group">
															<div class="controls">
																<input type="number" class="form-control" min="0" name="transaction_fee" step="0.01"value="{value_by_key('transaction_fee')}" autocomplete="off" required />
																<div class="invalid-feedback">{lang('transaction_fee_amount')}</div>
																{form_error("transaction_fee")}
															</div>
														</div>
													</td>
												</tr>  <tr>
													<td class="text-center" >{counter}</td>
													<td >Global Community Pool Bonus</td>

													<td >
														<div class="form-group">
															<div class="controls">
																<input type="number" class="form-control" min="0" name="global_community_pool_bonus" step="0.01"value="{value_by_key('global_community_pool_bonus')}" autocomplete="off" required />
																<div class="invalid-feedback">{lang('global_community_pool_bonus')}</div>
																{form_error("global_community_pool_bonus")}
															</div>
														</div>
													</td>
												</tr>  
												<td></td>
												<td></td> 
												<td class="td-actions text-right pull-right">
													<input type="submit" name="referral" class="btn btn-outline-theme btn-lg d-block w-50" value="{lang('update')}" > 
												</td>
											</tbody>
										</table>
										{form_close()}
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="table-responsive">
									{form_open('','role="form" class="needs-validation" novalidate=""')} 
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th class="text-center">#</th>
													<th>{lang('name')}</th>
													<th>{lang('value')}</th>
												</tr>
											</thead>
											<tbody>


												{$i=1} 
												<tr>
													<td class="text-center" >{$i++}</td>
													<td >{lang('tree_levels')}</td>

													<td >
														<div class="form-group">
															<div class="controls">
																<input type="number" class="form-control" name="tree_level" min="0" value="{value_by_key('tree_level')}"  autocomplete="off" required />
																<div class="invalid-feedback">{lang('tree_level')}</div>
																{form_error("tree_level")}
															</div>
														</div>
													</td>					
												</tr>  

												<tr>
													<td class="text-center" >{$i++}</td>
													<td >{lang('user_name_max_len')}</td>

													<td >
														<div class="form-group">
															<div class="controls">
																<input type="number" class="form-control" min="0" name="user_name_max_len" value="{value_by_key('user_name_max_len')}" autocomplete="off" required />
																<div class="invalid-feedback">{lang('user_name')}</div>
																{form_error("user_name_max_len")}
															</div>
														</div>
													</td>
												</tr>  
												<tr>
													<td class="text-center" >{$i++}</td>
													<td >{lang('phone_num_len')}</td>

													<td >
														<div class="form-group">
															<div class="controls">
																<input type="number" class="form-control" min="0" name="phone_number_length" value="{value_by_key('phone_number_length')}" autocomplete="off" data-validation-required-message="{lang('phone_num_len')} is required"/>
																{form_error("phone_number_length")}
															</div>
														</div>
													</td>							
												</tr> 


												<tr>
													<td class="text-center" >{$i++}</td>
													<td >{lang('matrix_bonus')}</td>

													<td >
														<div class="form-group">
															<div class="controls">
																<input type="number" min="0" step="0.01"class="form-control" name="matrix_bonus" value="{value_by_key('matrix_bonus')}" autocomplete="off" required />
																<div class="invalid-feedback">{lang('matrix_bonus_required')}</div>
																{form_error("matrix_bonus")}
															</div>
														</div>
													</td>							
												</tr> 
												<tr> 
													<td></td>
													<td></td>


													<td colspan="3" class="td-actions pull-right">
														<input type="submit" name="Configuration" class="btn btn-outline-theme btn-lg d-block w-50" value="{lang('update')}" > 
													</td>
												</tr>
												{form_close()}	 

											</tbody>
										</table>
									</div>
								</div>
							</div>




							<div class="tab-pane fade" id="tab-level" role="tabpanel" aria-labelledby="level-tab">
								<div class="table-responsive">
									{form_open()}
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th class="text-center">#</th>
													<th>{lang('name')}</th>
													<th>{lang('value')}</th>
												</tr>
											</thead>
											<tbody>
												{$j=1}

												{foreach $level_details as $v}
												<tr>
													<td class="text-center" >{$j++}</td>
													<td >{lang('level')}-{$v.level_no}&nbsp;&nbsp;&nbsp;{if $v.level_no==1}(Direct Refferal){/if}</td>

													<td>
														<div class="form-group">
															<div class="controls">
																<input type="number" step="0.01" min="0" class="form-control" name="{$v.id}" value="{$v.level_commission}"  autocomplete="off" required  readonly />
																<div class="invalid-feedback">{lang('tree_level_required')}</div>
																{* {form_error("tree_level")} *}
															</div>
														</div>
													</td>					
												</tr> 
												{/foreach} 

{* 
												<tr> 

													<td></td>
													<td></td>
													<td colspan="5" class="td-actions pull-right">
														<input type="submit" name="level" class="btn btn-outline-theme btn-lg d-block w-50" value="{lang('update')}" > 
													</td>
												</tr> *}
												{form_close()}	 

											</tbody>
										</table>
									</div>
								</div>
							</div>




						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{/block}
{block name="footer"}



{/block}