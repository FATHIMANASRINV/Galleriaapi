{extends file="login/layout.tpl"}
{block name="header"}
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
{/block}
{block name="body"} 
<div id="particles-js"></div>
<div class="container" data-layout="container">

    <div class="row flex-center min-vh-100 py-6">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <a class="d-flex flex-center mb-4" href="#"><img class="me-2" src="{assets_url()}images/logo/{$site_details['logo']}" alt="{$site_details['name']}" width="58" />
                <span class="font-sans-serif fw-bolder fs-5 d-inline-block">{$site_details['name']}</span>
            </a>
            {include file="layout/flash_message.tpl"} 
            {* {form_open('', 'class="form form-horizontal form-simple needs-validation" novalidate="" id="login-form"')} *}
            <div class="card">
                <div class="card-body p-4 p-sm-4">
                    <div class="row">
                     <div class="col-sm-3 p-sm-1">
                        <select class="country_ajax  form-control" name="country" required="" id="phone_code">
                            <option value="{$default_phone_code['phone_code']}" selected>+{$default_phone_code['phone_code']}</option>
                        </select>
                        <div class="invalid-feedback">{lang('select_country')}</div>
                        {form_error('country')}
                    </div>  
                    <div class="col-md-9 p-sm-1">
                        <div class="form-group">
                            <div class="controls">
                                <input class="form-control" type="text" placeholder="Enter Mobile Number" name="mobile" class="number"  required />
                                <div class="invalid-feedback">Mobile Number Required</div>
                                <span id="message_box" style="display:none;display: none;
                                width: 100%;
                                margin-top: 0.25rem;
                                font-size: 75%;
                                color: #e63757;"></span>
                            </div>
                            {form_error('mobile')}
                        </div>
                    </div>
                </div>
                <div id="recaptcha-container"></div>
                <div class="mb-3">
                  <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="login" value="login" onclick="PhoneAuth()">{lang('send_verification_code')}</button>
              </div>
              <div class="text-center"><i class="fa fa-arrow-circle-left" style="color:#1e477e
              ;"></i><a class="fs--1" href="{base_url('login')}">{lang('button_back')}</a></div>
          </div>
      </div>
      {* {form_close()} *}

  </div>
</div>
</div>
<div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
    <div class="modal-dialog mt-6" role="document">
        <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
              <div class="position-relative z-index-1 light">
                 <h4 class="mb-0 text-white" id="authentication-modal-label">{lang('please_enter_verification_code')}</h4>
             </div>
             <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body py-4 px-5">
            <div class="col-md-9 p-sm-1">
                <div class="form-group">
                    <div class="controls">
                        <input class="form-control" type="text" placeholder="Enter verification Code" name="verify_code" class="verify_code"  required />
                        <span id="message_boxs" style="display:none;display: none;
                        width: 100%;
                        margin-top: 0.25rem;
                        font-size: 75%;
                        color: #e63757;"></span>
                    </div>
                    {form_error('mobile')}
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-block w-100 mt-3" name="submit" onclick="submitPhoneNumberAuthCode();">{lang('login')}</button>
            </div>
        </div>
    </div>
</div>
</div> 

{/block}
{block name="footer"}
<script src="./assets/plugins/particleJS/particlelib.js"></script>
<script src="./assets/plugins/particleJS/particles.js"></script>
<script src="./assets/js/firebase-app.js"></script>
<script src="./assets/js/firebase-auth.js"></script>
<script src="./assets/js/firebase-analytics.js"></script>
<script src="{assets_url()}plugins/select2/select2.min.js"></script>
<script type="text/javascript">
    const firebaseConfig = {
        apiKey: "AIzaSyDTD1MaB5X401QabyGWs6mQZd439p6dvOY",
        authDomain: "matrix-demo-7850a.firebaseapp.com",
        projectId: "matrix-demo-7850a",
        storageBucket: "matrix-demo-7850a.appspot.com",
        messagingSenderId: "989180478903",
        appId: "1:989180478903:web:ed25849b9193e558a91432",
        measurementId: "G-1L52RFNZGY"
    };
    firebase.initializeApp(firebaseConfig);

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
    $('.country_ajax').select2({
        placeholder: 'Phone Code',
        ajax: {
            url:'{base_url()}login/get_Phone_ajax',

            type: 'post',
            dataType: 'json',
            delay:250,
            processResults: function(data) {
                return {
                    results: data
                };
            }
        },
    });

</script>
<script type="text/javascript">
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        "recaptcha-container"
        );
    function PhoneAuth() {
        var phoneNumber1 =$('input[name="mobile"]').val();
        var phonecode =$('#phone_code').val();
        if(phoneNumber1 && phonecode){
            var Phone_number=phonecode.concat(phoneNumber1);
            $.ajax({
                type:'POST',
                url:'{base_url("login/CheckValidMobileNumber")}',
                data: { mobile: phoneNumber1 } ,
                dataType:'json',
            })
            .done(function( response ) { 
                if(!response.status){
                    $("#message_box").html(response.msg).show();
                }else{
                    var appVerifier = window.recaptchaVerifier;
                    firebase.auth().signInWithPhoneNumber(Phone_number, appVerifier)
                    .then(function(confirmationResult)  {
                      window.confirmationResult = confirmationResult;
                      coderesult=confirmationResult;
                      $('#recaptcha-container').hide();
                      $('#authentication-modal').modal('show'); 
                  }).catch(function(error) {
                      $("#message_box").html(error.message).show();

                  });
              }
          })  
        }else{
            $("#message_box").html("Please Enter Mobile Number And Phone Code").show();
        }
    }
    function submitPhoneNumberAuthCode() {
        var code =$('input[name="verify_code"]').val();
        confirmationResult
        .confirm(code)
        .then(function(result) {
            var user = result.user;
            var phoneNumber1 =$('input[name="mobile"]').val();
            $.ajax({
                type:'POST',
                url: '{base_url()}'+'login/OTP_login',
                data: { mobile: phoneNumber1 } ,
                dataType:'json',
            }).done(function( response ) { 
                if(!response.status){
                    $("#message_boxs").html(response.msg).show();
                }else{
                  window.location = response.location;
              }
          })  
        })
        .catch(function(error) {
            $("#message_boxs").html(error.message).show();
        });
    }
</script>
{/block}

