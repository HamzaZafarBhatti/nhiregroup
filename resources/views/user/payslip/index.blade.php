@extends('layouts.master')

@section('title', 'Payslips')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Payslips</h6>
                </div>
                <div class="card-body">
                    <table class="myDataTable table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Direct Earning</th>
                                <th>Indirect Earning</th>
                                <th>Tax</th>
                                <th>Expected Earning</th>
                                <th>Status</th>
                                <th>Date/Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payslips as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->get_direct_earning }}</td>
                                    <td>{{ $item->get_indirect_earning }}</td>
                                    <td>{{ $item->tax }}%</td>
                                    <td>{{ $item->get_expected_earning }}</td>
                                    <td>{{ $item->get_status }}</td>
                                    <td>{{ $item->get_created_at }}</td>
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
        $('.myDataTable').addClass('nowrap').dataTable({
            responsive: true,
            searching: true,
            paging: true,
            ordering: true,
            info: false,
        });
    </script>
@endsection
