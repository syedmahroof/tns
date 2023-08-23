<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="storePost" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <h4 class="card-title">Create Contact </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name</label>
                                    <input class="form-control" wire:model="first_name" type="text">
                                    @error('first_name')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name</label>
                                    <input class="form-control" wire:model="last_name" type="text">
                                    @error('last_name')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Categories</label>
                                    <select class="js-example-basic-single form-select" wire:model="company_id"
                                        data-width="100%">
                                        <option value="" >Please Select</option>
                                        @foreach ($this->companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Employee Number</label>
                                    <input class="form-control" wire:model="employee_number" type="text">
                                    @error('employee_number')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Designation</label>
                                    <input class="form-control" wire:model="designation" type="text">
                                    @error('title')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Department</label>
                                    <input class="form-control" wire:model="department" type="text">
                                    @error('department')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Work Phone </label>
                                    <input class="form-control" wire:model="phone_work" type="text">
                                    @error('phone_work')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Personal Phone </label>
                                    <input class="form-control" wire:model="phone_personal" type="text">
                                    @error('phone_personal')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Work Email</label>
                                    <input class="form-control" wire:model="email_work" type="text">
                                    @error('email_work')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Personal Email</label>
                                    <input class="form-control" wire:model="email_personal" type="text">
                                    @error('email_personal')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">fax</label>
                                    <input class="form-control" wire:model="fax" type="text">
                                    @error('fax')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Address</label>
                                                {{-- <input class="form-control" type="text" name="price"
                                                    wire:model="price" placeholder=""> --}}
                                                <textarea class="form-control" wire:model="address" name="" id="" cols="30" rows="2"></textarea>
                                                @error('address')
                                                    <span style="color:red" class="error"> * {{ $message }} <br>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- <h5 class="py-3">SEO</h5> --}}
                                {{-- <h4 class="card-title">Images</h4> --}}
                                <div class="row mb-3">

                                    <div class="row mb-3">

                                        <div class="col-lg-12">
                                            <label for="defaultconfig-4" class="col-form-label">Photo <small>(
                                                    image size 650*850 )</small></label>
                                            <input type="file" wire:model="photo" />


                                            <div wire:loading wire:target="image">
                                                Uploading...
                                            </div>

                                            <!-- Show the image preview once it's been uploaded -->
                                            @if ($photo)
                                                <img class="img-temp-preview" src="{{ $photo->temporaryUrl() }}" />
                                            @endif

                                            @error('image')
                                                <span style="color:red" class="error"> * {{ $message }} <br>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="card-title">Other Details</h4>
                                    <div>
                                        @foreach ($itineraries as $index => $itinerary)
                                            <div class="row ">
                                                <div class="col-lg-4">
                                                    <input placeholder="Title" type="text"
                                                        class="form-control mb-3"
                                                        id="itineraries_{{ $index }}_title"
                                                        wire:model="itineraries.{{ $index }}.title" />
                                                </div>
                                                <div class="col-lg-5">
                                                    <textarea wire:model="itineraries.{{ $index }}.details" class="form-control" maxlength="300" rows="2"
                                                        placeholder="Details"></textarea>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button type="button"
                                                        wire:click.prevent="removeItinerary({{ $index }})">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                        <button type="button" class="btn btn-light mb-3"
                                            wire:click.prevent="addItinerary()">Add </button>
                                    </div>
                                </div>
                            </div>
                        </div>
       
                        <button class="btn btn-primary  btn-block max-width-button" type="submit"
                            value="Submit">Submit</button>
                        <button wire:click.prevent="cancelPost()"
                            class="btn btn-secondary btn-block max-width-button">Cancel</button>
                        <input type="hidden" wire:model="property_id">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
