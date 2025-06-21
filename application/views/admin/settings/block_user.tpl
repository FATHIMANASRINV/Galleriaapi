{extends file="layout/base.tpl"}
{block name="header"} 
<link rel="stylesheet" type="text/css" href="{assets_url('plugins/autocomplete/jquery-ui.min.css')}">
<link rel="stylesheet" type="text/css" href="{assets_url('plugins/autocomplete/style.css')}">
<link rel="stylesheet" type="text/css" href="{assets_url('plugins/sweetalert/lib/sweet-alert.css')}">

{/block}
{block body}  
<div style="display:none;">
	<span id="base_url">{base_url()}</span>
	<span id="text_are_you_sure">{lang('text_are_you_sure')}</span>
	<span id="text_you_will_not_recover">{lang('text_you_will_not_recover')}</span>
	<span id="text_yes_delete_it">{lang('text_yes_delete_it')}</span>
	<span id="text_no_cancel_please">{lang('text_no_cancel_please')}</span>
	<span id="text_deleted">{lang('text_deleted')}</span>
	<span id="text_news_deleted">{lang('text_news_deleted')}</span>
	<span id="text_cancelled">{lang('text_cancelled')}</span>
	<span id="text_news_safe">Request is Safe</span>
	<span id="text_you_want_edit_news">{lang('text_you_want_edit_news')}</span>
	<span id="text_yes_edit_it">{lang('text_yes_edit_it')}</span>
	<span id="error_the_fieldid_field_is_required">{lang('error_the_fieldid_field_is_required')}</span>
	<span id="error_atleast_number">{lang('error_atleast_number')}</span>
	<span id="error_enter_greater_number">{lang('error_enter_greater_number')}</span>
</div>  
<!-- Breadcrumb -->
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Block Users</h3>
	</div>

	<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Block Users</h4> 
            </div>
            <hr>
            <div class="card-body">
                <fieldset>
                    {form_open('','id="block_form" name="block_users"  id="block_users" class="user" enctype="multipart/form-data"')}
                   <div class="row p-t-20">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">
									Text User Name <span class="symbol required"></span>
								</label>
								<input type="text"  class="form-control" data-lang="{lang('text_username')}" id="user_name" name="user_name"  onClick="autoComplete(this, 'admin', 'autocomplete/user_filter')" autocomplete="Off" value="{set_value('user_name')}">
								{form_error("user_name")}
							</div>
						</div>
					</div>



                    <div  id="tofullname" style="display: none;">
                        <div class="form-group" >
                            <label>Full Name <font color="red">*</font></label>
                            <input type="text" class="form-control form-control-user" id="to_fullname" name="to_fullname"  
                            value= "" autocomplete="off" readonly>
                            {form_error("to_fullname")}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="bmd-label-floating">
                            Reason<span class="symbol required"></span>
                        </label>
                        <textarea class="form-control form-control-user" id="reason" name="reason" ></textarea>
                        {form_error("reason")}
                    </div>

                    <hr>
                    <div class="form-actions">
                        <button class="btn btn-primary " type="submit" id="block_users" name="block_users" value="block_users">
                            Block Now 
                        </button>

                    </div>
                    {form_close()}
                </fieldset>
            </div>
        </div>
    </div>

</div>

<br>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Blocked Users</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {if count($block_users_details) > 0} 
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Full Name</th>
                                <th>{lang('reason')}</th>
                                <th>{lang('date')}</th>
                                <th>{lang('action')}</th> 
                            </tr>
                        </thead>

                        <tbody>

                             {foreach $block_users_details as $v} 
                            {$i=$i+1} 
                            <tr>
                                <td>{$i}</td>
                                <td>{$v.user_name}</td>
                                <td>{$v.full_name}</td>
                                <td>{$v.reason}</td> 
                                <td>{$v.date|date_format:'%d/%m/%Y '}</td>
                                <td class="hidden-xs">
                                    <a  href="javascript:activate_users({$v.user_id})" class="btn btn-xs btn-primary tooltips" data-placement="top" data-original-title="{lang('text_activate')}" title="{lang('text_activate')}"><i class="fa fa-unlock"></i></a>
                                </td>
                            </tr>
                        {/foreach} 
                        </tbody>

                    </table>
                     {else} 
                    <div class="card-body">
                        <p>
                            <h4 class="text-center"> 
                                <i class="fa fa-exclamation"> {lang('text_no_transfer_details_found')}</i>
                            </h4>
                        </p>
                    </div>
                     {/if} 
                </div>
            </div>
        </div>
    </div>
</div>

</div> 
{/block}
{block name="head"}





<link href="{assets_url('plugins/autocomplete/jquery-ui.min.css')}" rel="stylesheet" />
<link href="{assets_url('plugins/autocomplete/style.css')}" rel="stylesheet" /> 

{/block}

{block name="footer"}

<script src="{assets_url('plugins/autocomplete/jquery-ui.min.js')}"></script>
<script src="{assets_url('plugins/autocomplete/filter.js')}"></script>
<script src="{assets_url('plugins/sweetalert/lib/sweet-alert.min.js')}"></script>
<script src="{assets_url('js/confirm.js')}"></script>

<script type="text/javascript">
function activate_users(id)
{
  
    swal({
        title: $("#text_are_you_sure").html(),
        text: $("#text_you_want_activate").html(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $("#text_yes_activate_it").html(),
        cancelButtonText: $("#text_no_cancel_please").html(),
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            var check_user_available =  rootPath + "admin/settings/active_users";

            $.post(check_user_available, { user_id: id,$new_status: "yes"}, function(data)
            {
                swal({
                    title:"User Activated", 
                    text: "Activate User", 
                    type: "success"
                },function() {
                    document.location.href = rootPath + "admin/settings/block-user";
                });
            });            
        } else {
            swal($("#text_cancelled").html(),$("#text_package_safe").html(), "error");
        }
    });
}
</script>

{/block}