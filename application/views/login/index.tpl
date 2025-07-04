{extends file="login/layout.tpl"}
{block name="header"}

{/block}
{block name="body"} 
<div id="app" class="app app-full-height app-without-header">
    <div class="login">
        <div class="login-content">
            {include file="layout/flash_message.tpl"}
            {form_open('', 'class="form form-horizontal form-simple needs-validation" novalidate="" id="login-form"')}
            <h1 class="text-center">Sign In</h1>
            <div class="text-inverse text-opacity-50 text-center mb-4">
                For your protection, please verify your identity.
            </div>
            <div class="mb-3">
                <label class="form-label">Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" placeholder="Enter Username" name="user_name" required  {if $user_name}value="{$user_name}"{/if} />
                {form_error('user_name')}
            </div>
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label">Password <span class="text-danger">*</span></label>
                    {* <a href="{base_url('forgot-password')}" class="ms-auto text-inverse text-decoration-none text-opacity-50">Forgot password?</a> *}
                </div>
                <input type="password" id="dz-password" class="form-control" name="pass" required {if $password} value="{$password}" {/if} placeholder="Password">
                {form_error('pass')}
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</button>
          {*   <div class="text-center text-inverse text-opacity-50">
                Don't have an account yet? <a href="{base_url()}signup">Sign up</a>.
            </div> *}
            {form_close()}
        </div>

    </div>
    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
</div> 
{/block}
{block name="footer"}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const eyeSlashIcon = document.getElementById('eyeSlashIcon');
        const eyeIcon = document.getElementById('eyeIcon');
        const passwordField = document.getElementById('dz-password');

        eyeIcon.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'inline-block';
            } else {
                passwordField.type = 'password';
                eyeIcon.style.display = 'inline-block';
                eyeSlashIcon.style.display = 'none';
            }
        });

        eyeSlashIcon.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'inline-block';
            } else {
                passwordField.type = 'password';
                eyeIcon.style.display = 'inline-block';
                eyeSlashIcon.style.display = 'none';
            }
        });
    });
</script>
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

