{extends file="login/layout.tpl"}
{block name="body"} 
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-12 col-lg-12 col-xl-5 py-4">
        <div class="login d-flex align-items-center py-2">
            <div class="container p-0">
                {include file="layout/flash_message.tpl"}
                {form_open('', 'class="form form-horizontal form-simple needs-validation" novalidate="" id="login-form"')}
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12 mx-auto">
                        <div class="card-sigin">
                            <div class="main-signup-header">
                                <div class="text-center mb-4">
                                    <h4 class="text-success">Signup Successful</h4>
                                </div>
                                <table class="table table-bordered w-75 mx-auto">
                                    <tr>
                                        <th>Username</th>
                                        <td>{$preview_details['user_name']}</td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td>{$preview_details['password']}</td>
                                    </tr>
                                </table>
                                {if log_user_id()}
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <a href="{base_url()}signup" class="btn btn-outline-theme w-100">Signup another one..!</a>
                                    </div>  
                                    
                                </div>
                                {else}
                                <a href="{base_url('login')}" class="btn btn-theme btn-block w-100 mt-4">{lang('log_in')}</a>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
                {form_close()}
            </div>
        </div>
    </div>
</div>


{/block}

