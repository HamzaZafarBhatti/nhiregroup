@extends('layouts.master')

@section('title', 'Package List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}" />
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Packages</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Name</th>
                                <th>Grade</th>
                                <th>Price</th>
                                <th>Direct Referral Bonus</th>
                                <th>Indirect Referral Bonus</th>
                                <th>E-Pin Prefix</th>
                                <th>E-Pin Length</th>
                                <th>Minimum Points Required to Cashout</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->grade }}</td>
                                    <td>₦{{ $item->price }}</td>
                                    <td>₦{{ $item->direct_ref_bonus }}</td>
                                    <td>₦{{ $item->indirect_ref_bonus }}</td>
                                    <td>{{ $item->epin_prefix }}</td>
                                    <td>{{ $item->epin_length }}</td>
                                    <td>{{ $item->min_points_to_cashout }}</td>
                                    <td>
                                        @if ($item->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.packages.edit', $item->id) }}" type="button"
                                            class="btn btn-link text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.packages.destroy', $item->id) }}" type="button"
                                            onclick="event.preventDefault(); document.getElementById('formDelete{{ $item->id }}').submit();"
                                            class="btn btn-link text-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                        <form action="{{ route('admin.packages.destroy', $item->id) }}" method="post"
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
