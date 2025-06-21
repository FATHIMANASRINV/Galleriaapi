{extends file="login/layout.tpl"}
{block name="body"} 
<main class="main" id="top">
  <div class="container" data-layout="container">

    <div class="row flex-center min-vh-100 py-6 text-center">
      <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5">
         <a class="d-flex flex-center mb-4" href="#"><img class="me-2" src="{assets_url()}images/logo/{$site_details['logo']}" alt="{$site_details['name']}" width="58" />
            <span class="font-sans-serif fw-bolder fs-5 d-inline-block">{$site_details['name']}</span>
        </a>
        <div class="card">
          <div class="card-body p-4 p-sm-5">
            <h1 >We’ll be back soon!</h1>

            <hr />
            <p>Sorry for the inconvenience. We’re performing some maintenance at the moment. We’ll be back up shortly!</p><a class="btn btn-primary btn-sm mt-3" href='{base_url()}user/dashboard/index'><span class="fas fa-home me-2"></span>Take me home</a>
        </div>
    </div>
</div>
</div>
</div>
</main>
{/block}