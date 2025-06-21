{extends file="login/layout.tpl"}
{block name="header"}

{/block}
{block name="body"} 
<div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
    <div class="login d-flexex align-items-center py-2">
        <!-- Demo content-->
        <div class="container p-0 mt-5">
            {include file="layout/flash_message.tpl"}
            
                    
            <div class="row">
                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                    <div class="card-sigin">
                        <div class="mb-5 d-flex">
                            <a href="index.html" class="header-logo"><img src="{assets_url()}images/logo/{$site_details['logo']} " class="desktop-logo ht-40" alt="logo">
                                <img src="{assets_url()}images/logo/{$site_details['logo']}"
                                class="desktop-white ht-40" alt="logo">
                            </a>
                        </div>
                        <div class="card-sigin">
                            <div class="main-signup-header">
                                 <h5 class="mb-0">{lang('forgot_username')}</h5><small>{lang('enter_mail_username')}</small>
                                 {form_open('', 'class="form form-horizontal form-simple needs-validation" novalidate=""')}
                                <div class="mt-4">
                                      <div class="mb-3">
                                    <div class="form-group ">
                                        <div class="controls position-relative">
                                        <input class="form-control" type="email" placeholder="Email address"  name="mail" required />
                                      <div class="invalid-feedback">The field is Required</div>
                                    <span class="position-absolute top-0 pt-10px end-0 p-2 fs--1" ><a class="text-800"></a></span>
                                  
                                    {form_error('user_name')}
                                    </div>
                                    </div></div>
                                    
                                    <div class="text-danger error-login"></div>
                                   <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="forgot" value="forgot">{lang('send_reset_link_user')}</button>
</div>
                              {form_close()}
                                <div class="main-signin-footer mt-5">
                                    <p class="mb-1"><a class="fs--1 text-600" href="./forgot-password"><span class="d-inline-block ms-1">&larr;</span>{lang('button_back')}</a></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {form_close()}
        </div><!-- End -->
    </div>
</div>

{/block}
{block name="footer"}
<script type="text/javascript">
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    var loginBtn = true;
    $(document).on("submit", "#login-form", function(event)
    {
        var form = $(this);
        event.preventDefault();

        if(loginBtn == true){
            $.ajax({
                url: '{base_url()}'+'login/authenticate-login',
                type: 'POST',
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function(){
                    loginBtn = false;
                    $(".btn-login-submit").html('<div class="spinner-border text-light" role="status"><span class="visually-hidden"></span></div>');
                    $(".error-login").html('');
                },
                complete: function (response, status)
                {
                    $(".btn-login-submit").html('{lang('button_login')}');
                },
                success: function (response, status)
                {
                    loginBtn = true;
                    if(response.status){
                      window.location = response.location;
                  }else{
                    $(".error-login").html(response.msg);
                } 
            },
            error: function (xhr, desc, err)
            {
                loginBtn = true;
                alert(desc);
            }
        });
        }
    });
</script>
{/block}

