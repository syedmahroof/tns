@extends('layout.master')

@section('content')
    @if (session('success') || session('error'))
        <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
            {{ session('success') ?? session('error') }}
            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h6 class="card-title">Contacts</h6>
                </div>
                <div class="col-md-9 text-end">
                    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary mb-3">Create Contact</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="contacts-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
<script>
    $(document).ready(function() {
        $('#contacts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.contacts.getContacts') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'email_work', name: 'email_work' }, // Use 'email_work' instead of 'email'
            { 
                data: 'id',
                name: 'status',
                render: function(data, type, row, meta) {
                    return `
                        <div class="mb-3 col-md-2">
                            <div class="form-check form-switch mb-2">
                                <input type="checkbox" class="form-check-input my-2 toggle-status" id="formSwitch${data}" ${row.status === 1 ? 'checked' : ''} data-id="${data}">
                            </div>
                        </div>
                    `;
                }
            },
            { 
                data: 'id',
                name: 'actions',
                render: function(data, type, row) {
                    return `
                        <a href="{{ route('admin.contacts.edit', ':id') }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.contacts.destroy', ':id') }}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    `.replace(/:id/g, data);
                }
            }
        ]
    });

        $(document).on('change', '.toggle-status', function() {
            // Your toggle status code
            // ...
        });

        // Rest of your toggle-status and Swal code
        // ...

    });
</script>
<!-- Include your necessary JavaScript libraries here, like jQuery, DataTables, and Swal -->
@endpush

@push('scripts')
   
@endpush
