{extends file="layout/base.tpl"}
{block name="header"}
{/block}
{block name="body"}

<div class="heading-elements" style="text-align: right;">
	<a href="{base_url()}admin/settings/add-email-template/{$mail_contents['enc_id']}" class="btn btn-outline-theme mr-1 mb-1" title=""><i class="fa fa-plus"></i></a>
</div>
<div class="row "> 
	<div class="col-sm-12"> 
		<div class="card"> 
			<div class="card-header">
				<h5>{lang('email_template')}</h5>
			</div>
			<div class="card-content">
				<div class="card-body">  
					<div class="table-responsive">
						<table class="table color-table primary-table" id="exportTable">
							<thead >
								<tr>
									<th>#</th>
									<th>{lang('type')}</th>  
									{* <th>{lang('Content')}</th> *}
									<th>{lang('status')}</th>
									<th colspan="2" style="text-align: center;">{lang('action')}</th>  
								</tr>
							</thead>
							<tbody>
								{foreach from=$mail_contents item=v}
								{if $v.type != 'welcome_letter'}
								<tr>
									<td>{counter}</td>
									<td>{lang($v.type)}</td> 
									<td>{if $v.status==1}{lang('deleted')}{else}{lang('active')}{/if}</td>
									<td class="text-center">
										{if $v.status==0}
										<a href="{base_url()}admin/settings/add-email-template/{$v.enc_id}" type="submit" id="submit" name="submit" value="send" >
											<i class="fas fa-edit"></i>
										</a>
										{/if} 
										{if $v.status==0}
										<a href="{base_url()}admin/settings/add_email_template/{$v.enc_id}/delete" type="submit" id="submit" name="submit" value="send" >
											<i class="fas fa-trash text-danger"></i>
										</a>
										{else}
										<a href="{base_url()}admin/settings/add_email_template/{$v.enc_id}/recover" type="submit" id="submit" name="submit" value="send" >
											<i class="fas fa-retweet"></i>
										</a>
										{/if}
									</td> 

								</tr> 
								{/if}
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