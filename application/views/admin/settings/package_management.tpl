{extends file="layout/base.tpl"}
{block name="header"}
{/block}
{block name="body"}
{* 
<div class="heading-elements">
	<a href="{base_url()}admin/settings/add-package/{$package_details['enc_id']}" class="btn btn-outline-info mr-1 mb-1" title=""><i class="fa fa-plus"></i></a>
</div> *}
<div class="row "> 
	<div class="col-sm-12"> 
		<div class="card"> 

			<div class="card-header">
				<h5>{lang('package_management')}</h5>
				
			</div>

			<div class="card-content">
				<div class="card-body">  
					
						<div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">

							<div class="table-responsive">
								<table class="table table-bordered color-table primary-table" id="exportTable">
									<thead >
										<tr>
											<th>#</th>
											<th>{lang('package')}</th>
											<th>{lang('status')}</th>
											<th>{lang('BTC')}</th>
											
											{* <th>{lang('action')}</th>   *}
										</tr>
									</thead>
									<tbody>
										{foreach from=$package_details item=v}
										<tr>
											<td>{counter}</td> 
											<td>{$v.name}</td> 
											<td>{ucfirst($v.status)}</td>
											<th>{cur_format($v.amount)}</th>
											{* <td>
												<a href="{base_url()}admin/settings/add-package/{$v.enc_id}" class="" type="submit" id="submit" name="submit" value="send" >
													<i class="fa fa-edit"></i>
												</a>
											</td>  *}

										</tr> 
										{/foreach}
									</tbody>
								</table>

							</div>
						</div>
				</div>
			</div> 
		</div> 
	</div>
	{/block}
	{block name="footer"}
	{/block}