@extends('layouts.master')

@section('title', 'Subadmin List')

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
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Subadmins</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Whatsapp</th>
                                <th>Time Slot</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subadmins as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone ?? 'N/A' }}</td>
                                    <td>{{ $item->timeslot->get_label ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.subadmins.edit', $item->id) }}" type="button"
                                            class="btn btn-link btn-sm text-info" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-link btn-sm text-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete"
                                            onclick="deleteRecord({{ $item->id }})" data-bs-original-title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <form action="{{ route('admin.subadmins.destroy', $item->id) }}" method="post"
                                            id="formDelete{{ $item->id }}" style="display: none;">
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
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#myTable").addClass("nowrap").dataTable({
                // responsive: true,
            });
        });

        function deleteRecord(id) {
            Swal.fire({
                title: "Do you want to delete the record?",
                showDenyButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#formDelete' + id).submit();
                }
            });
        }
    </script>
@endsection
