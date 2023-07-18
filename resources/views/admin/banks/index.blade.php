@extends('layouts.master')

@section('title', 'Bank List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}" />
    <style>
        .dataTables_wrapper {
            overflow: auto;
        }
    </style>
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Bank
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.banks.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" name="name" required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">E-Pins</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banks.edit', $item->id) }}" type="button"
                                            onclick="event.preventDefault(); editModal({{ $item->id }})"
                                            class="btn btn-link text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.banks.destroy', $item->id) }}" type="button"
                                            onclick="event.preventDefault(); document.getElementById('formDelete{{ $item->id }}').submit();"
                                            class="btn btn-link text-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                        <form action="{{ route('admin.banks.destroy', $item->id) }}" method="post"
                                            id="formDelete{{ $item->id }}" style="display: none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <h4 class="modal-title">Edit Bank</h4>
                    <div class="row g-4 mt-3">
                        <input type="hidden" class="form-control" id="id" />
                        <div class="col-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" />
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" role="switch"
                                    id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Active</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="button" id="updateButton" onclick="update()">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#myTable").addClass("nowrap").dataTable({
                // responsive: true,
            });

        });

        function editModal(bank_id) {
            console.log(bank_id);
            $.ajax({
                url: `{{ url('/') }}/admin/banks/${bank_id}/edit`,
                success: function(response) {
                    console.log(response);
                    $('#editModal #id').val(response.id);
                    $('#editModal #name').val(response.name);
                    $('#editModal #is_active').prop('checked', response.is_active);
                    $('#editModal').modal('show')
                }
            })
        }

        function update() {
            let id = $('#editModal #id').val();
            let name = $('#editModal #name').val();
            let is_active = $('#editModal #is_active').is(':checked') ? 1 : 0;
            $.ajax({
                url: `{{ url('/') }}/admin/banks/${id}`,
                method: 'PATCH',
                data: {
                    name: name,
                    is_active: is_active,
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.message
                        })
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function(jqXHR) {
                    console.log(jqXHR.responseJSON.message);
                    Toast.fire({
                        icon: 'error',
                        title: jqXHR.responseJSON.message
                    })
                }
            })
        }
    </script>
@endsection
