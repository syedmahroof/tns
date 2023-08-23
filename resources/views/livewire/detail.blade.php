<div>

    <div class="modal-header">
        <h5 class="modal-title" id="detailsModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="hideModal"></button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <div class="title pt-3 px-3 p-0">
                <h2 class="main-heading ">Visitor information</h2>
                <p class=" text-start ">this data only keep in first point real estate. we will not share any other third party Company. fill your details it will be redirect Investment Property Details page </p>
            </div>
            <form class=" p-3 my-3" wire:submit.prevent="submit">
                <input type="hidden" wire:model="property_id" class="form-control property-id">
                <input type="hidden" class="form-control">
                <div class="form-group">
                    <label for="" class="py-2">Name</label>
                    <input type="text" class="form-control" wire:model="name" name="name" placeholder="Name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="" class="py-2">Phone</label>
                    <input type="number" class="form-control" wire:model="mobile" name="mobile" placeholder="05** ** ****">
                    @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="" class="py-2">Email</label>
                    <input type="email" class="form-control" wire:model="email" name="email" placeholder="examble@gmail.com">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="text-center my-3">
                    <input type="submit" href="" value="View Details Page" class="btn px-3 w-100">
                </div>
            </form>
        </div>
    </div>
</div>