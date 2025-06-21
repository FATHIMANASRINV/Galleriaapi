{extends file="login/layout.tpl"}
{block name="header"}
<link href="{assets_url()}plugins/select2/select2.min.css" rel="stylesheet" />
{/block}
{block name="body"}
<div id="app" class="app app-full-height app-without-header">
    <div class="register">
        <div class="register-content">
         {include file="layout/flash_message.tpl"}
         {form_open_multipart('', 'class="row needs-validation" novalidate=""')}
         <h1 class="text-center">Sign Up</h1>
         <p class="text-inverse text-opacity-50 text-center">One Admin ID is all you need to access all the Admin services.</p>
         <div class="form-group mb-3">
            <label class="form-label">{lang('sponsor_name')}</label>
            <input class="form-control form-control-lg bg-inverse bg-opacity-5" type="text" autocomplete="on" id="sponsor_name" value="{$default_sponsor}" name="sponsor_name" required=""/>
            <span id="message_box" style="display:none;"></span>
            {form_error('sponsor_name')}
        </div>

        <div class="form-group mb-3">
            <label class="form-label">Username</label> 
            <input class="form-control form-control-lg bg-inverse bg-opacity-5" type="text" autocomplete="on" id="username" name="username" value="{set_value('username')}"  required=""  />
            {form_error('username')}
        </div>
        <div class="form-group mb-3">
            <label class="form-label">Package</label> 
            <input class="form-control form-control-lg bg-inverse bg-opacity-5" type="text" autocomplete="on" id="package" name="package" value="0.0001"  readonly=""  />
            {form_error('package')}
        </div>

       {*   <div class="form-group mb-3">
            <label class="form-label">{lang('lastname')}</label> 
            <input class="form-control form-control-lg bg-inverse bg-opacity-5" type="text" autocomplete="on" id="lastname" name="lastname" value="{set_value('lastname')}" required="" />
            {form_error('lastname')}
        </div>

        <div class="form-group mb-3">
            <label class="form-label">{lang('address')}</label> 
            <input class="form-control form-control-lg bg-inverse bg-opacity-5" type="TextArea" autocomplete="on" id="address" name="address" value="{set_value('address')}"  required="" />
            {form_error('address')}
        </div>

        <div class="form-group mb-3">
            <label class="form-label">{lang('country')}</label> 
            <select class="country_ajax  form-control" name="country" value="{set_select('country',$post_arr['country'])}" required="">
                {if $post_arr['country']}
                <option value="{$post_arr['country']}">{$post_arr['country_name']}</option>
                {/if}
            </select>
            {form_error('country')}
        </div>

        <div class="form-group mb-3">
            <label class="form-label">{lang('mobile')}</label> 
            <input class="form-control form-control-lg bg-inverse bg-opacity-5" type="number" autocomplete="on" min="0" name="mobile" id="mobile" value="{set_value('mobile')}" minlength="{value_by_key('phone_number_length')}" maxlength="{value_by_key('phone_number_length')}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   required="" />
            {form_error('mobile')}
        </div>

        <div class="form-group mb-3">
            <label class="form-label">{lang('email')}</label> 
            <input class="form-control form-control-lg bg-inverse bg-opacity-5" type="email" autocomplete="on" name="email"  id="email" value="{set_value('email')}" required="" />
            {form_error('email')}
        </div> *}

       {*  {if value_by_key('package_status')=='yes'}
        <div class="form-group mb-3">
            <label class="form-label">{lang('package')}</label> 
            <select class="package_ajax  form-control" name="package" value="{set_select('package',$post_arr['package'])}" required="">

                {if $post_arr['package']}
                <option value="{$post_arr['package']}">{$post_arr['package_name']}</option>
                {/if}
            </select>
            {form_error('package')}
        </div>
        {/if} *}
       {*  <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="customCheck1">
                <label class="form-check-label" for="customCheck1">I have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</label>
            </div>
        </div> *}
       {*  <ul class="nav nav-style-1 nav-pills mb-3" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">{lang('free_join')}</a></li>
            <li class="nav-item"><a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">{lang('crypto')}</a></li>
            <li class="nav-item"><a class="nav-link" id="cash_tab" data-bs-toggle="tab" href="#tab-cash" role="tab" aria-controls="tab-cash" aria-selected="false">{lang('cash_free_payment')}</a></li> 
            <li class="nav-item"><a class="nav-link" id="coin_tab" data-bs-toggle="tab" href="#tab-coin" role="tab" aria-controls="tab-coin" aria-selected="false">{lang('coin_base')}</a></li>
            <li class="nav-item"><a class="nav-link" id="stripe_tab" data-bs-toggle="tab" href="#tab-stripe" role="tab" aria-controls="tab-stripe" aria-selected="false">{lang('stripe_payment')}</a></li>

        </ul>
        *}
       {*  <div class="tab-content border-x  p-3" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab"> *}

            <div class="mb-3">
                <button class="btn btn-outline-theme btn-lg d-block w-100" type="submit" name="register" value="free_join">{lang('free_join')}</button>
            </div>

          {*   </div>
            <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">

                <div class="mb-3">
                    <button class="btn btn-outline-theme btn-lg d-block w-100" type="submit" name="register" value="crypto">{lang('pay_crypto')}</button>
                </div>

            </div>

            <div class="tab-pane fade" id="tab-cash" role="tabpanel" aria-labelledby="profile-tab">

                <div class="mb-3">
                    <button class="btn btn-outline-theme btn-lg d-block w-100" type="submit" name="register" value="cash_free">{lang('pay_with_cashfree_payment')}</button>
                </div>

            </div>
            <div class="tab-pane fade" id="tab-coin" role="tabpanel" aria-labelledby="coin-tab">

                <div class="mb-3">
                    <button class="btn btn-outline-theme btn-lg d-block w-100" type="submit" name="register" value="coin_base">{lang('pay_with_coin_base')}</button>
                </div>

            </div>
            <div class="tab-pane fade" id="tab-stripe" role="tabpanel" aria-labelledby="stripe-tab">

                <div class="mb-3">
                    <button class="btn btn-outline-theme btn-lg d-block w-100" type="submit" name="register" id="stripe-button" value="stripe">{lang('pay_with_stripe')}</button>
                </div>

            </div>
            *}
        {* </div> *}
        <div class="text-inverse text-opacity-50 text-center">
            Already have an Admin ID? <a href="{base_url()}login">Sign In</a>
        </div>
        {form_close()}
    </div>
</div>
<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
</div>
{/block}
{block name="footer"}
<script src="{assets_url('js/registration.js')}"></script>
<script src="{assets_url()}plugins/select2/select2.min.js"></script>

<script type="text/javascript">
    var invalid_sponser_user_name = "Invalid Referral ID",
    checking_sponser_user_name = "Checking Referral ID.",
    sponser_name_validated = "Sponsor validated";

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


    $(document).ready(function(){

        $('#sponsor_name').on('change', function(){
            $("#sponsor_name").trigger('blur');
        });

    });

    $('.country_ajax').select2({
        placeholder: '{lang('select_country')}',
        ajax: {
            url:'{base_url()}signup/get_country_ajax',

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

    $('.package_ajax').select2({
        placeholder: '{lang('select_package')}',
        ajax: {
            url:'{base_url()}signup/get_package_ajax',

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



    var stripe = Stripe("pk_test_51IU7z0GrcexVW9h9eWBLkLYeG4poZX11h4WhQYk4oJU25uQxBzJ6AhGBq6pYDojdh23eOPdCjX9777vrwpeTQu1e00pL5SCkgJ");
    var checkoutButton = document.getElementById("stripe-button");
    var urlToSubmit = '{base_url()}'+'signup';

    checkoutButton.addEventListener("click", function () {
        fetch(urlToSubmit, {
            method: "POST",
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (session) {
            return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(function (result) {
            if (result.error) {
                alert(result.error.message);
            }
        })
        .catch(function (error) {
          console.error("Error:", error);
      });
    });
</script>
{/block}
