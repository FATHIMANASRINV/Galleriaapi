{extends file="layout/base.tpl"}
{block name="header"}

{/block}
{block name="body"}


 <div class="col-xxl-12 d-flex flex-column align-items-stretched">
      <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({assets_url()}images/icons/spot-illustrations/corner-3.png);">
        </div>
        <div class="card-body position-relative">
          <div class="row">
            <div class="col-lg-8">
              <h3>{lang('cleanup')}</h3>
              <p class="mt-2">{lang('cleanup-msg')}</p>
               <div class="col-lg-12 text-end">
               	{form_open()}
               <button class="btn btn-outline-danger me-1 mb-1" type="submit" name="cleanup" id="cleanup" value="cleanup">{lang('cleanup_button')} <i class="far fa-arrow-alt-circle-right"></i></button>
               {form_close()}
              </div>
            </div>
          </div>
        </div>
      </div>

     <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({assets_url()}images/icons/spot-illustrations/corner-2.png);">
	        </div>
	    
	        <div class="card-body position-relative">
	          <div class="row">
	            <div class="col-lg-8">
	              <h3>{lang('clear_cache')}</h3>
	              <p class="mt-2">{lang('cache-msg')}</p>
	              <div class="col-lg-12 text-end">
	              	{form_open()}
	               <button class="btn btn-outline-warning me-1 mb-1" type="submit" name="clear"  id="clear" value="clear">{lang('cache_button')} <i class="far fa-arrow-alt-circle-right"></i></button>
	               {form_close()}
	              </div>
	            </div>
	          </div>
	        </div>
	     </div>

    </div>

{/block}
{block name="footer"}

</div>
</div>


{/block}