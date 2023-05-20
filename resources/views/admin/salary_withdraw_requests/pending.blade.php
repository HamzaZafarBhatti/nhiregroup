@extends('layouts.master')

@section('title', 'Pending Requests')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}" />
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraw_requests as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->username }}</td>
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
                title: "Accept Request",
                showCancelButton: true,
                confirmButtonText: "Confirm",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.salary_withdrawal_requests.accept') }}",
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
                showCancelButton: true,
                confirmButtonText: "Reject",
                confirmButtonColor: '#dc3545',
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.salary_withdrawal_requests.reject') }}",
                        type: "post",
                        data: {
                            id: id
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
                responsive: true,
            });
        });
    </script>
@endsection
