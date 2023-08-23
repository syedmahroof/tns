@extends('layout.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Edit Contact</h6>
        <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name', $contact->first_name) }}" required>
                        @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name', $contact->last_name) }}" required>
                        @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror"
                            value="{{ old('designation', $contact->designation) }}" required>
                        @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_work">Work Phone:</label>
                        <input type="text" name="phone_work" id="phone_work"
                            class="form-control @error('phone_work') is-invalid @enderror" value="{{ old('phone_work', $contact->phone_work) }}"
                            required>
                        @error('phone_work')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_personal">Personal Phone:</label>
                        <input type="text" name="phone_personal" id="phone_personal"
                            class="form-control @error('phone_personal') is-invalid @enderror" value="{{ old('phone_personal', $contact->phone_personal) }}"
                            required>
                        @error('phone_personal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email_work">Work Email:</label>
                        <input type="email" name="email_work" id="email_work"
                            class="form-control @error('email_work') is-invalid @enderror" value="{{ old('email_work', $contact->email_work) }}"
                            required>
                        @error('email_work')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="website">Website:</label>
                        <input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror"
                            value="{{ old('website', $contact->website) }}">
                        @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                            rows="3">{{ old('address', $contact->address) }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="background_color">Background Color:</label>
                        <input type="color" name="background_color" id="background_color" class="form-control"
                               value="{{ old('background_color', $contact->background_color) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="social_media">Social Media:</label>
                        <div id="social-media-inputs">
                            @foreach($contact->socialMedia as $index => $socialMedia)
                                <div class="social-media-entry">
                                    <input type="hidden" name="social_media[{{ $index }}][id]" value="{{ $socialMedia->id }}">
                                    <input type="text" name="social_media[{{ $index }}][platform]" class="form-control @error('social_media.' . $index . '.platform') is-invalid @enderror" placeholder="Platform" value="{{ old('social_media.' . $index . '.platform', $socialMedia->platform) }}">
                                    @error('social_media.' . $index . '.platform')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="social_media[{{ $index }}][username]" class="form-control @error('social_media.' . $index . '.username') is-invalid @enderror" placeholder="Username" value="{{ old('social_media.' . $index . '.username', $socialMedia->username) }}">
                                    @error('social_media.' . $index . '.username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="social_media[{{ $index }}][link]" class="form-control @error('social_media.' . $index . '.link') is-invalid @enderror" placeholder="Link" value="{{ old('social_media.' . $index . '.link', $socialMedia->link) }}">
                                    @error('social_media.' . $index . '.link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="file" name="social_media[{{ $index }}][icon]" class="form-control @error('social_media.' . $index . '.icon') is-invalid @enderror" placeholder="Icon" value="{{ old('social_media.' . $index . '.icon', $socialMedia->icon) }}">
                                    @error('social_media.' . $index . '.icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <button type="button" class="btn btn-sm btn-danger remove-social-media">Remove</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-social-media" class="btn btn-sm btn-primary mt-2">Add Social Media</button>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-3">Update Contact</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script>
    $(document).ready(function() {
        var socialMediaCounter = {{ count($contact->socialMedia) }};

        $('#add-social-media').click(function() {
            var newEntry = `
                <div class="social-media-entry">
                    <input type="text" name="social_media[${socialMediaCounter}][platform]" class="form-control" placeholder="Platform">
                    <input type="text" name="social_media[${socialMediaCounter}][username]" class="form-control" placeholder="Username">
                    <input type="text" name="social_media[${socialMediaCounter}][link]" class="form-control" placeholder="Link">
                    <input type="text" name="social_media[${socialMediaCounter}][icon]" class="form-control" placeholder="Icon">
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
