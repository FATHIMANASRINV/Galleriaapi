{extends file="layout/base.tpl"}

{block body}
<div class="row">

	
	<div class="col-lg-12 pe-lg-2">
		<div class="card mb-3">
			{if $emp_details['enc_id']}
			<div class="card-header">
				<h5 class="mb-0">{lang("edit_sub_admin")}</h5>
			</div>
			{else}
			<div class="card-header">
				<h5 class="mb-0">{lang("add_sub_admin")}</h5>
			</div>
			{/if}
			{form_open('','class="needs-validation" novalidate=""')} 
			<div class="card-body">

				{if $emp_details['enc_id']}
				<div class="row-lg-2">
					<div class="form-group">
						<div class="controls">
							<label for="emp_code">Employee id</label>
							<input type="text" id="emp_code" class="form-control" name="emp_code" value="{$emp_details['user_name']}" autocomplete="off" readonly>
							<div class="invalid-feedback">{lang('the_field_required')}</div>
							{form_error('emp_code')}
						</div>  
					</div>
				</div>
				<input type="hidden" name="id" value="{$emp_details['enc_id']}">
				{/if}


				<div class="row mt-3">
					<div class="col-sm-6 ">
						<div class="form-group"> 
							<label class="form-label" for="first_name">{lang('firstname')}</label>
							<div class="controls">
								<input type="text" id="first_name" class="form-control" name="first_name" value="{set_value('first_name', $emp_details['first_name'])}" autocomplete="off" required>
								<div class="invalid-feedback">{lang('the_field_required')}</div>
								{form_error('first_name')}
							</div>  
						</div>  
					</div>  
					<div class="col-sm-6">
						<div class="form-group">
							<label for="second_name">{lang('second_name')}</label>
							<div class="controls">
								<input type="text" id="second_name" class="form-control" name="second_name" value="{set_value('second_name', $emp_details['second_name'])}" autocomplete="off" required>
								<div class="invalid-feedback">{lang('the_field_required')}</div>
								{form_error('second_name')}
							</div>  
						</div>  
					</div>  
				</div> 
				<div class="row mt-3">
					<div class="col-sm-6"> 
						<div class="form-group">
							<label for="email_id">{lang('email')}</label>
							<div class="controls">
								<input type="emailcol-sm-6 mb-5" id="email_id" class="form-control" name="email_id" value="{set_value('email_id', $emp_details['email'])}" autocomplete="off" required>
								<div class="invalid-feedback">{lang('the_field_required')}
								</div>
								{form_error('email_id')}
							</div>  
						</div>  
					</div>  
					<div class="col-sm-6">
						<div class="form-group">
							<label for="mobile">{lang('mobile')}</label>
							<div class="controls">
								<input type="number" id="mobile" class="form-control" name="mobile" value="{set_value('mobile', $emp_details['mobile'])}" autocomplete="off" min="0" minlength="{value_by_key('phone_number_length')}" maxlength="{value_by_key('phone_number_length')}"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
								<div class="invalid-feedback">{lang('the_field_required')}</div>
								{form_error('mobile')}
							</div>  
						</div>  
					</div>  
				</div>  


				{if $emp_details['enc_id']}
				<div class="row mt-2">
					<div class="mt-3 col-sm-6">
						<div class="form-group">
							<label for="status">{lang('activate_inactivate')}</label>
							{* <div class="col-10"> *}

								<select name="status" id="status" class="form-control"> 

									<option value="1" {if $emp_details['status']=='1'}selected{/if}>{lang('Activate')}</option>
									<option value="0" {if $emp_details['status']=='0'}selected{/if}>{lang('Inactivate')}</option>
									{* <option value="deleted">{lang('text_cancelled')}</option> *}
								</select>	
							{* </div> *}
							{form_error('status')}
						</div> 
					</div>	
					<div class="col mt-5">
						<button type="submit" class="btn btn-primary" name="update_employee" value="update">{lang('Update')}</button>
					</div>
				</div>
				{else}




				<div class="row mt-3">
					<div class="col-sm-6"> 
						<div class="form-group">
							<label for="password">{lang('password')}</label>
							<div class="controls">
								<input type="password" id="password" class="form-control" name="password" autocomplete="off" required>
								<div class="invalid-feedback">{lang('the_field_required')}</div>
								{form_error('password')}
							</div> 
						</div> 
					</div>  
					<div class="col-sm-6">
						<div class="form-group">
							<label for="cnf_password">{lang('confirm_password')}</label>
							<div class="controls">
								<input type="password" id="cnf_password" class="form-control" name="cnf_password" autocomplete="off" required>
								<div class="invalid-feedback">{lang('the_field_required')}</div>
								{form_error('cnf_password')}
							</div> 
						</div> 
					</div>  
				</div> 
				<div>
					<div class="col-sm-12 mt-4">
						<button type="submit" class="btn btn-primary" name="add_employee" value="update">{lang(add_sub_admin)}</button>
					</div> 
				</div>
				{/if}

			</div> 
			{form_close()}	
		</div>
	</div>
	{if $emp_details['enc_id']}


	<div class="col-lg-4 pe-lg-2 ">
		<div class="card mb-3 mt-0">
			<div class="card-header">
				<h5 class="mb-0">{lang('change_password')} </h5>
			</div>

			<div class="card-body bg-light">
				{form_open("",'role="form"  class="row g-3 needs-validation" method="post" name="psw" id="psw" novalidate=""')}



				<div class="mb-3">
					<div class="form-group">
						<label class="form-label" for="new-password">{lang('new_password')}</label>
						<div class="controls">
							<input class="form-control" id="new-password" type="password" name="new_password" required/>
							<div class="invalid-feedback">{lang('the_field_required')}</div>
							{form_error("new_password")}
						</div>
					</div>
				</div>
				<div class="mb-3">
					<div class="form-group">
						<label class="form-label" for="confirm-password">{lang('confirm_password')}</label>
						<div class="controls">
							<input class="form-control" id="confirm-password" type="password" name="confirm_password" required/>
							<div class="invalid-feedback">{lang('the_field_required')}</div>
							{form_error("confirm_password")}
						</div>
					</div>
				</div>
				
				<button class="btn btn-primary d-block w-100" type="submit" name="psw_update" value="psw_update">{lang('update_password')} </button>
				{form_close()}
			</div>
		</div>
	</div>
	{/if}
</div> 
{/block}
