<form wire:submit.prevent="submit">
<div class="row profile-body">
  <!-- left wrapper start -->
  <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
    <div class="card rounded">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="card-title mb-0">SEO</h6>
         
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Meta Title </label>
          <input type="text" class="form-control"  wire:model="meta_title" placeholder="This textarea has a limit of 60 chars.">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Key Words</label>
            <input name="tags" class="form-control"  wire:model="key_words"   id="" value="" />
          </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Meta Description </label>
          <textarea id="maxlength-textarea" wire:model="meta_description"  class="form-control" id="defaultconfig-4" maxlength="100" rows="6" placeholder="This textarea has a limit of 160 chars."></textarea>
        </div>
      </div>
    </div>
    <div class="card rounded my-2">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="card-title mb-0">Social Media</h6>
          
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Instagram </label>
          <input type="text" class="form-control"  wire:model="instagram"   placeholder="Instagram Link">
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Facebook </label>
          <input type="text" class="form-control"  wire:model="facebook"   placeholder="Facebook Link">
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Linkedin </label>
          <input type="text" class="form-control"  wire:model="linkedin"   placeholder="Linkedin Link">
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Twitter </label>
          <input type="text" class="form-control"  wire:model="twitter"   placeholder="Twitter Link">
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Tiktok </label>
          <input type="text" class="form-control"  wire:model="tiktok"   placeholder="Tiktok Link">
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Youtube </label>
          <input type="text" class="form-control"  wire:model="youtube"   placeholder="Youtube Link">
        </div>

      </div>
    </div>
  </div>
  <!-- left wrapper end -->
  <!-- middle wrapper start -->
  <div class="col-md-8 col-xl-6 middle-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card rounded">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">												
                <div class="ms-2">
                  <p>Additonal SEO Code</p>
                </div>
              </div>
             
            </div>
          </div>
          <div class="card-body">
            <textarea id="maxlength-textarea"   wire:model="additional_seo_code"  class="form-control" id="defaultconfig-4" maxlength="100" rows="6" placeholder="This textarea used to add aditional header Seo Codes"></textarea>
          </div>
        </div>
      </div>
      <div class="col-md-12 grid-margin">
        <div class="card rounded">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">												
                <div class="ms-2">
                  <p>Additonal Css Code</p>
                </div>
              </div>
              
            </div>
          </div>
          <div class="card-body">
            <textarea id="maxlength-textarea"   wire:model="additional_css_code"  class="form-control" id="defaultconfig-4" maxlength="100" rows="6" placeholder="This textarea used to add aditional header Css Codes"></textarea>
          </div>
        </div>
      </div>
      <div class="col-md-12 grid-margin">
        <div class="card rounded">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">												
                <div class="ms-2">
                  <p>Additonal Js Code</p>
                </div>
              </div>
              
            </div>
          </div>
          <div class="card-body">
            <textarea id="maxlength-textarea"   wire:model="additional_js_code"  class="form-control" id="defaultconfig-4" maxlength="100" rows="6" placeholder="This textarea used to add aditional header Seo Codes"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12 grid-margin">
        <div class="card rounded">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">												
                <div class="ms-2">
                  <p>Footer Text</p>
                </div>
              </div>
              
            </div>
          </div>
          <div class="card-body">
            <textarea id="maxlength-textarea"   wire:model="footer_text"  class="form-control" id="defaultconfig-4" maxlength="100" rows="6" placeholder="This textarea used to add footer text"></textarea>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <!-- middle wrapper end -->
  <!-- right wrapper start -->
  <div class="d-none d-xl-block col-xl-3">
    <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card rounded">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="card-title mb-0">Banner Info</h6>
               
                </div>
                
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Banner Text</label>
                  <textarea id="maxlength-textarea"  wire:model="banner_text" class="form-control" id="defaultconfig-4" maxlength="100" rows="4" placeholder="Banner Text"></textarea>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Banner Image one</label>
                  <input type="file"   wire:model="banner_image_1" >

                @if($banner_image_1)
                    <div class="col-lg-12"><img class="img-temp-preview" id="preview" src="{{ asset($banner_image_1) }}"> </div>     
                @endif

                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Banner Image two</label>
                  <input type="file"   wire:model="banner_image_2" >
                @if($banner_image_2)
                    <div class="col-lg-12"><img class="img-temp-preview" src="{{ asset($banner_image_2) }}"> </div>     
                @endif
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Banner Image three</label>
                  <input type="file"   wire:model="banner_image_3" >
                  @if($banner_image_3)
                    <div class="col-lg-12"><img class="img-temp-preview" src="{{ asset($banner_image_3) }}"> </div>     
                @endif
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Banner Image four</label>
                  <input type="file"   wire:model="banner_image_4" >
                  @if($banner_image_4)
                    <div class="col-lg-12"><img class="img-temp-preview" src="{{ asset($banner_image_4) }}"> </div>     
                @endif
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-12 grid-margin">
        <div class="card rounded">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="card-title mb-0">Office Info</h6>
               
                </div>
                <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone </label>
                <input type="text"   wire:model="phone"  class="form-control" placeholder="Office Phone Number">
                </div>
                <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase"> Info Mail </label>
                <input type="text"   wire:model="mail"  class="form-control" placeholder="Office Mail Id">
                </div>
                <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Address</label>
                <textarea id="maxlength-textarea"   wire:model="address"  class="form-control" id="defaultconfig-4" maxlength="100" rows="6" placeholder="Office Address"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- right wrapper end -->
</div>

</form>


<x-confirmation-alert />