{extends file="login/layout.tpl"}
{block name="header"}
{/block}
{block name="body"} 
<div id="particles-js"></div>
<div class="container" data-layout="container">


    {include file="layout/flash_message.tpl"} 
    <div class="row flex-center min-vh-100 py-6 text-center">
      <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"> <a class="d-flex flex-center mb-4" href="#"><img class="me-2" src="{assets_url()}images/logo/{$site_details['logo']}" alt="{$site_details['name']}" width="58" />
        <span class="font-sans-serif fw-bolder fs-5 d-inline-block">{$site_details['name']}</span>
    </a>
    <div class="card">
      <div class="card-body p-4 p-sm-5">
        <div class="avatar avatar-4xl">
            <img class="rounded-circle" src="{assets_url('images/profile/')}{$details['user_photo']}" alt="" />
        </div>
        <h5 class="mt-3 mb-0">Hi! {$details['full_name']}</h5><small>Enter your password to Unlock.</small>

        {form_open('', 'class="mt-4 row g-0 mx-sm-4 form-horizontal form-simple needs-validation" novalidate="" id="login-forms"')}

        <div class="mb-3">
            <div class="form-group">
                <div class="controls">
                    <input class="form-control" type="text" placeholder="Enter Username" name="user_name" value="{$datas['user_name']}" required hidden/>
                </div>
                {form_error('user_name')}
            </div>
        </div>

        <div class="col">
            <input class="form-control me-3 mb-3 password" type="password" placeholder="Enter Your Password"  name="pass" required />
            <div class="invalid-feedback">Password field is Required</div>
        <div class="text-danger error-login"></div>
        </div>
        <div class="col-auto ps-2">
            <button class="btn btn-primary px-3 mb-2" type="submit" name="login" value="login">{lang('button_login')}</button>
        </div>
    </div>
</div>
{form_close()}
</div>
</div>
</div>
</div>

</div>


{/block}
{block name="footer"}
<script src="./assets/plugins/particleJS/particlelib.js"></script>
<script src="./assets/plugins/particleJS/particles.js"></script>
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
    $(document).on("submit", "#login-forms", function(event)
    {
        var form = $(this);
        event.preventDefault();
        console.log(form);
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
                    $(".error-login").html('Invalid Password');
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

