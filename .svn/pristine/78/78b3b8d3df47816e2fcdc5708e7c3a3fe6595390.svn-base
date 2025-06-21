{extends file="login/layout.tpl"}
{block name="body"} 
<div class="container" data-layout="container"> 
    <div class="row flex-center min-vh-100 py-6 text-center">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <a class="d-flex flex-center mb-4" href="#"><img class="me-2" src="{assets_url()}images/logo/{$site_details['logo']}" alt="{$site_details['name']}" width="58" />
                <span class="font-sans-serif fw-bolder fs-5 d-inline-block">{$site_details['name']}</span>
            </a>
            {include file="layout/flash_message.tpl"} 
            
            <div class="card">
              <div class="card-body p-4 p-sm-5">
                <div class="text-center"><img class="d-block mx-auto mb-4" src="{assets_url()}images/icons/spot-illustrations/16.png" alt="Email" width="100" />
                  <h4 class="mb-2">Please check your email!</h4>
                  <p>An email has been sent to <strong>xyz@abc.com</strong>. Please click on the included link to reset your password.
                  </p><a class="btn btn-primary btn-sm mt-3" href="{base_url('login')}"><span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span>Return to login</a>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

{/block}

