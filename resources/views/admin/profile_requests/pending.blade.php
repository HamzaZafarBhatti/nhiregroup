@extends('layouts.master')

@section('title', 'Pending Requests')

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
                    <h6 class="card-title mb-0">Pending Requests</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>User</th>
                                <th>Subadmin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile_requests as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->username ?? 'N/A' }}</td>
                                    <td>{{ $item->subadmin->name ?? 'N/A' }}</td>
                                    <td>
                                        <button onclick="accept({{ $item->id }})" type="button"
                                            class="btn btn-link text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Accept" data-bs-original-title="Accept"><i
                                                class="fa fa-thumbs-up"></i></button>
                                        <button onclick="reject({{ $item->id }})" type="button"
                                            class="btn btn-link text-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Reject" data-bs-original-title="Reject"><i
                                                class="fa fa-thumbs-down"></i></button>
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
        function accept(id) {
            Swal.fire({
                title: "Have you received the payment from the user?",
                input: "radio",
                inputOptions: {
                    '0': 'I have not received the payment from user!',
                    '1': 'I have received the correct amount from user!',
                },
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to choose something!'
                    }
                },
                showCancelButton: true,
                confirmButtonText: "Confirm",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed && result.value == '1') {
                    $.ajax({
                        url: "{{ route('admin.salary_profile_requests.accept') }}",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function(response) {
                            console.log(response);
                            Toast.fire({
                                icon: response.status,
                                title: response.message
                            })
                            if (response.status === 'success') {
                                setTimeout(() => {
                                    window.location.reload();
                                }, 3000);
                            }
                        }
                    })
                }
            });
        }

        function reject(id) {
            Swal.fire({
                title: "Reject Request",
                input: "text",
                inputLabel: 'Rejection Reason',
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to enter rejection reason!'
                    }
                },
                showCancelButton: true,
                confirmButtonText: "Reject",
                confirmButtonColor: '#dc3545',
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.salary_profile_requests.reject') }}",
                        type: "post",
                        data: {
                            id: id,
                            rejection_reason: result.value
                        },
                        success: function(response) {
                            Toast.fire({
                                icon: response.status,
                                title: response.message
                            })
                            if (response.status === 'success') {
                                setTimeout(() => {
                                    window.location.reload();
                                }, 3000);
                            }
                        }
                    })
                }
            });
        }
        $(document).ready(function() {
            $("#myTable").addClass("nowrap").dataTable({
                // responsive: true,
            });
        });
    </script>
@endsection
