{extends file="layout/base.tpl"}

{block name="body"}

<div class="heading-elements">
	<a href="{base_url(log_user_type())}/settings/edit-employee/{$emp_details.enc_id}"  class="btn btn-outline-theme mr-1 mb-1" title=""><i class="fa fa-plus"></i></a>
</div>
<div class="row"> 
	<div class="col-md-12">
		<div class="card"> 
			<div class="card-header">
				<h5>{lang('employee_details')}</h5>
			</div> 
			<div class="card-content collapse show">
				<div class="card-body">  
					<div class="table-responsive"> 
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>{lang('emp_code')}</th> 
									<th>{lang('text_email_id')}</th>
									<th>{lang('join_date')}</th>
									<th>{lang('status')}</th>
									<th>{lang('action')}</th> 
								</tr>
							</thead>
							<tbody> 
								{foreach from=$emp_details item=v}
								<tr>
									<td class="text-center" >{counter}</td>
									<td >{$v.user_name}</td>
									<td >
										{$v.full_name|wordwrap:20:"<br />\n"}
										<span class="clearfix"></span>
										<small>
											{$v.mobile}
										</small>
										<span class="clearfix"></span>
										<small>
											{$v.email}
										</small>
									</td>

									<td >{$v.date_of_joining}</td>
									<td>
										{if $v.status == 1}
										<span class="badge badge rounded-pill d-block p-2 badge-soft-success">Active<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
										{else}
										<span class="badge badge rounded-pill d-block p-2 badge-soft-secondary">Inactive<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
										{/if}
										
									</td>

									<td class="text-end">
										<div>
											<a class="btn p-0"  href="{base_url(log_user_type())}/settings/set-permission/{$v.enc_id}" data-bs-toggle="tooltip" data-bs-placement="top" title="Set Permission-{$v.user_name}"><span class="text-500 fas fa-server"></span></a>

											<a  href="{base_url(log_user_type())}/settings/edit-employee/{$v.enc_id}"  class="btn p-0 ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit-{$v.user_name}"><span class="text-500 fas fa-edit"></span></a>
										</div>
									</td>

								</tr>  
								{/foreach}
							</tbody>
						</table>
					</div> 
				</div>
			</div>
			<div class="d-flex justify-content-center">  
				<ul class="pagination start-links"></ul> 
			</div>
		</div>
	</div>  
</div>
{/block}
