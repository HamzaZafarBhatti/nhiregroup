@extends('layouts.master')

@section('title', 'Bank Details List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}" />
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Bank Details</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Account Type</th>
                                <th>Primary?</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_banks as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->bank->name }}</td>
                                    <td>{{ $item->account_name }}</td>
                                    <td>{{ $item->account_number }}</td>
                                    <td class="text-capitalize">{{ $item->account_type }}</td>
                                    <td>
                                        @if ($item->is_primary)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-warning">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.banks.edit', $item->id) }}" type="button"
                                            class="btn btn-link text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('user.banks.destroy', $item->id) }}" type="button"
                                            onclick="event.preventDefault(); document.getElementById('formDelete{{ $item->id }}').submit();"
                                            class="btn btn-link text-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                        <form action="{{ route('user.banks.destroy', $item->id) }}" method="post"
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
    </div>
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
