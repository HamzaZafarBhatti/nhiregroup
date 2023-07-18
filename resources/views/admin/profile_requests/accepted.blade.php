@extends('layouts.master')

@section('title', 'Accepted Requests')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}" />
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Accepted Requests</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>User</th>
                                <th>Subadmin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile_requests as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->username ?? 'N/A' }}</td>
                                    <td>{{ $item->subadmin->name ?? 'N/A' }}</td>
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
