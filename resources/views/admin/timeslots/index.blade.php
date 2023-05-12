@extends('layouts.master')

@section('title', 'Subadmin List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/sweetalert2.min.css') }}" />
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
                                <th>Title</th>
                                <th>Type</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeslots as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ date('h:i A', strtotime($item->start_time)) }}</td>
                                    <td>{{ date('h:i A', strtotime($item->end_time)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.timeslots.edit', $item->id) }}" type="button"
                                            class="btn btn-link btn-sm text-info" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-link btn-sm text-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete"
                                            onclick="deleteRecord({{ $item->id }})" data-bs-original-title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <form action="{{ route('admin.timeslots.destroy', $item->id) }}" method="post"
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
                responsive: true,
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
