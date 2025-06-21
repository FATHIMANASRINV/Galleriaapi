{extends file="layout/base.tpl"}

{block name="head"} 
<link href="{assets_url('plugins/autocomplete/jquery-ui.min.css')}" rel="stylesheet" />
<link href="{assets_url('plugins/autocomplete/style.css')}" rel="stylesheet" />   
<link href="{assets_url('plugins/select2/select2.css')}" rel="stylesheet" />   
<link href="{assets_url()}plugins/DataTables/datatables.min.css" rel="stylesheet" />
<link href="{assets_url()}plugins/DataTables/DataTables-1.12.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<style type="text/css">
	
	@media print {
		.hidden-print { display: none; }
	}
</style> 
{/block}
{block body } 

<div class="row "> 
	<div class="col-sm-12"> 
		<div class="card"> 

			<div class="card-header">
				<h5>{$title}</h5>
			</div>

			<div class="card-content">
				<div class="card-body">  
					
					<div class="table-responsive">
						<table class="table color-table primary-table" id="exportTable">
							<thead >
								<tr>
									<th>#</th>
									<th>{lang('package')}</th>  
									<th>{lang('Total_Income')}</th>  
									<th>{lang('Pending_Amount')}</th>  
									<th>{lang('Payout_Release')}</th> 
									<th>{lang('transaction_fee')}</th> 
									<th>{lang('Earned_Commission')}</th> 
									<th>{lang('Current_Balance')}</th> 
									
								</tr>
							</thead>
							<tbody>
								{foreach from=$details item=v}
								<tr>
									<td>{counter}</td> 
									<td>{$v.name}</td> 
									<td>{if $v.total_income}{cur_format($v.total_income)}{else}{cur_format(0)}{/if}</td> 
									<td>{if $v.pending_amount}{cur_format($v.pending_amount)}{else}{cur_format(0)}{/if}</td> 
									<td>{if $v.payout}{cur_format($v.payout)}{else}{cur_format(0)}{/if}</td> 
									<td>{cur_format($v.transaction_fee)}</td> 
									<td>{cur_format($v.earned_commission)}</td> 
									<td>{cur_format($v.current_balance)}</td> 
									
								</tr> 
								{$total = $total + $v.total_income}
								{* {$admin_total = $admin_total + $v.admin_fee} *}
								{$pending_total = $pending_amount + $v.pending_amount}
								{$payout_total = $payout_total + $v.payout}
								{$transaction_fee = $transaction_fee + $v.transaction_fee}
								{$earned_total = $earned_total + $v.earned_commission}
								{$current_balance = $current_balance + $v.current_balance}
								{/foreach}
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2"><strong>{lang('Total')}</strong></td>
									<td><strong>{cur_format($total)}</strong></td>
									{* <td><strong>{cur_format($admin_total)}</strong></td> *}
									<td><strong>{cur_format($pending_total)}</strong></td>
									<td><strong>{cur_format($payout_total)}</strong></td>
									<td><strong>{cur_format($transaction_fee)}</strong></td>
									<td><strong>{cur_format($earned_total)}</strong></td>
									<td><strong>{cur_format($current_balance)}</strong></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div> 
{/block}
