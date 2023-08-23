<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form>
                 <h4 class="card-title">Create Company </h4>
                <div class="form-group mb-3">
                    <label for="title">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Enter Name" wire:model="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-lg-4 form-group mb-3">
                        <label for="title">Phone:</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            placeholder="Enter Phone Number" wire:model="phone">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 form-group mb-3">
                        <label for="title">Email:</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="Enter Email" wire:model="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-lg-4 form-group mb-3">
                        <label for="title">Website:</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website"
                            placeholder="Enter Website" wire:model="website">
                        @error('website')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-3">


                    <div class="col-lg-4 form-group mb-3">
                        <label for="title">Facebook:</label>
                        <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                            id="facebook" placeholder="Enter Facebook" wire:model="facebook">
                        @error('facebook')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 form-group mb-3">
                        <label for="title">Instagram:</label>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                            id="instagram" placeholder="Enter Instagram" wire:model="instagram">
                        @error('instagram')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 form-group mb-3">
                        <label for="title">Twitter:</label>
                        <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter"
                            placeholder="Enter Twitter" wire:model="twitter">
                        @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 form-group mb-3">
                        <label for="title">Linkedin:</label>
                        <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                            id="linkedin" placeholder="Enter Linkedin" wire:model="linkedin">
                        @error('linkedin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 form-group mb-3">
                        <label for="title">Youtube:</label>
                        <input type="text" class="form-control @error('youtube') is-invalid @enderror" id="youtube"
                            placeholder="Enter Youtube" wire:model="youtube">
                        @error('youtube')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <textarea class="form-control" wire:model="address" name="" id="" cols="30" rows="2"></textarea>
                            @error('address')
                                <span style="color:red" class="error"> * {{ $message }} <br>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <label for="defaultconfig-4" class="col-form-label">Image <small>(
                                image size 650*850 )</small></label>
                        <input type="file" wire:model="image" />

                        <div wire:loading wire:target="image">
                            Uploading...
                        </div>
                        @if ($image)
                            <img class="img-temp-preview" src="{{ $image->temporaryUrl() }}" />
                        @endif

                        @error('image')
                            <span style="color:red" class="error"> * {{ $message }} <br>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <button wire:click.prevent="storePost()"
                        class="btn btn-success btn-block max-width-button">Save</button>
                    <button wire:click.prevent="cancelPost()"
                        class="btn btn-secondary btn-block max-width-button">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
