@extends('layouts.master')

@section('title', 'Employer List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}" />
    <style>
        td {
            vertical-align: middle;
        }

        img {
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Employers</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Package</th>
                                <th>Earning Amount</th>
                                <th>Minimum Amount to move Funds to NHIRE Wallet</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employers as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ $item->get_image }}" alt="{{ $item->name }}" height="50px"
                                            width="50px"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->package->name }}</td>
                                    <td>{{ $item->get_earning_amount }}</td>
                                    <td>{{ $item->get_min_amount }}</td>
                                    <td>{!! $item->get_status !!}</td>
                                    <td>
                                        <a href="{{ route('admin.employers.edit', $item->id) }}" type="button"
                                            class="btn btn-link text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.employers.destroy', $item->id) }}" type="button"
                                            onclick="event.preventDefault(); document.getElementById('formDelete{{ $item->id }}').submit();"
                                            class="btn btn-link text-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                        <form action="{{ route('admin.employers.destroy', $item->id) }}" method="post"
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
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#myTable").addClass("nowrap").dataTable({
                responsive: true,
            });
        });
    </script>
@endsection
