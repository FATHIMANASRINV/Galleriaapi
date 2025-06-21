{extends file="layout/base.tpl"}

{block body}
<div class="row">
	<div class="col-md-12">
		<div class="card-group">
			<div class="card">
				<div class="card-header">
					<h5>{lang('Employee Details')}</h5>
				</div>
				<div class="card-body bg-light">
					<table class="table table-bordered">
						<tr>
							<th>Employee Code:</th>
							<td>{$emp_details['user_name']}</td>
						</tr>
						<tr>
							<th>{lang('text_full_name')} :</th>
							<td>{$emp_details['full_name']}</td>
						</tr>
						<tr>
							<th>{lang('text_email_id')} :</th>
							<td>{$emp_details['email']}</td>
						</tr>
						<tr>
							<th>{lang('mobile')} : </th>
							<td>{$emp_details['mobile']}</td>
						</tr>
						<tr>
							<th>Created Date</th>
							<td>{$emp_details['date_of_joining']}</td>
						</tr>
					</table>    
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Allocate Permission</h5>
				</div>
				
				{form_open('','name="permission_allocate"  id="permission_allocate" class="form-login"')}
				<div class="card-body pt-0">

					<div class="list-group">
						{foreach from=$employee_menus['main'] item=menu}

						<a class="list-group-item list-group-item-action {if in_array($menu.id, [1,2])}disabled bg-200{/if}" href="javascript:void(0)">
							<label class="switch">
								<input type="checkbox" class="form-check-input" {set_checkbox('menus[]', $menu.id, in_array($menu.id, $perm_menus))}   name="menus[]" id="menu{$m}" value="{$menu.id}">
							</label>
							<label class="col-form-label" for="menu{$m}"> {lang($menu.text)}</label>

							{if count($menu.submenu)}
							<hr class="mt-1">
							<ol class="dd-list">
								{foreach from=$menu.submenu item=i}
								<div class="media">
									<div class="media-body text-left switch-sm ">
										<label class="switch">
											<input class="form-check-input" type="checkbox"  {set_checkbox('menus[]', $i.id, in_array($i.id, $perm_menus))} name="menus[]" id="submenu{$menu.id}{$i.id}" value="{$i.id}"><span class="switch-state "></span>
										</label>
										<label class="col-form-label" for="submenu{$menu.id}{$i.id}"> {lang($i.text)}</label>
									</div>
								</div> 
								{/foreach}
							</ol> 
							{/if}

						</a>
						{/foreach}
						
					</div>
					
				</div>
				<div class="card-footer">
					<div class="text-center">
						<button class="btn btn-primary" type="submit" id="set_permission" name="set_permission" value="set_permission">
							Set Permission <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>  
				</div>
				{form_close()}

			</div> 
		</div> 
	</div> 
</div> 

{/block}
