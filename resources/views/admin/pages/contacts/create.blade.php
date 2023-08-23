@extends('layout.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Create Contact</h6>
        <form action="{{ route('admin.contacts.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') }}" required>
                        @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name') }}" required>
                        @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror"
                            value="{{ old('designation') }}" required>
                        @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_work">Work Phone:</label>
                        <input type="text" name="phone_work" id="phone_work"
                            class="form-control @error('phone_work') is-invalid @enderror" value="{{ old('phone_work') }}"
                            required>
                        @error('phone_work')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="background_color">Background Color:</label>
                        <input type="color" name="background_color" id="background_color" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_personal">Personal Phone:</label>
                        <input type="text" name="phone_personal" id="phone_personal"
                            class="form-control @error('phone_personal') is-invalid @enderror" value="{{ old('phone_personal') }}"
                            required>
                        @error('phone_personal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email_work">Work Email:</label>
                        <input type="email" name="email_work" id="email_work"
                            class="form-control @error('email_work') is-invalid @enderror" value="{{ old('email_work') }}"
                            required>
                        @error('email_work')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="website">Website:</label>
                        <input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror"
                            value="{{ old('website') }}">
                        @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Address">Address:</label>
                        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                                  rows="3">{{ old('address') }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="social_media">Social Media:</label>
                    <div id="social-media-inputs">
                        {{-- <div class="social-media-entry d-flex align-items-center">
                            <input type="text" name="social_media[0][platform]" class="form-control mr-2" placeholder="Platform">
                            <input type="text" name="social_media[0][username]" class="form-control mr-2" placeholder="Username">
                            <input type="text" name="social_media[0][link]" class="form-control mr-2" placeholder="Link">
                            <input type="file" name="social_media[0][icon]" class="form-control-file mr-2" accept="image/*">
                            <button type="button" class="btn btn-sm btn-danger remove-social-media">Remove</button>
                        </div> --}}
                    </div>
                    <button type="button" id="add-social-media" class="btn btn-sm btn-primary mt-2">Add Social Media</button>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary mt-3">Create Contact</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script>
  $(document).ready(function() {
      var socialMediaCounter = 1;

      $('#add-social-media').click(function() {
          var newEntry = `
            <div class="social-media-entry" style="display: flex; align-items: center;">
                <input type="text" name="social_media[${socialMediaCounter}][platform]" class="form-control" placeholder="Platform">
                <input type="text" name="social_media[${socialMediaCounter}][username]" class="form-control" placeholder="Username">
                <input type="text" name="social_media[${socialMediaCounter}][link]" class="form-control" placeholder="Link">
                <input type="file" name="social_media[${socialMediaCounter}][icon]" class="form-control" placeholder="Icon">
                <button type="button" class="btn btn-sm btn-danger remove-social-media">Remove</button>
            </div>
          `;
          $('#social-media-inputs').append(newEntry);
          socialMediaCounter++;
      });

      $(document).on('click', '.remove-social-media', function() {
          $(this).closest('.social-media-entry').remove();
      });
  });
</script>


  @endpush
