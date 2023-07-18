@extends('layouts.master')

@section('title', 'Workflow Income Log')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">
    <style>
        td {
            vertical-align: middle;
        }

        .dataTables_wrapper {
            overflow: auto;
        }
    </style>
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Workflow Income Log</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Account Type: <b>{{ auth()->user()->package->name }}</b></h5>
                    </div>
                    <table class="myDataTable table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Employer</th>
                                <th>Earning</th>
                                <th>Date/Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomes as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ $item->employer->get_image }}" alt="{{ $item->name }}"
                                            class="avatar xl rounded-5">
                                    </td>
                                    <td>
                                        {{ $item->employer->name }}
                                    </td>
                                    <td>{{ $item->get_amount }}</td>
                                    <td>{{ $item->get_time }}</td>
                                    <td>
                                        @if ($item->cashed_out)
                                            Completed
                                        @else
                                            <a href="{{ route('user.transfer_workflow_income_to_nhire_wallet', $item->id) }}"
                                                class="btn btn-success" type="button">Transfer to NHIRE MAIN WALLET</a>
                                        @endif
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
            $('.myDataTable').addClass('nowrap').dataTable({
                // responsive: true,
                searching: true,
                paging: true,
                ordering: true,
                info: false,
            });
        })
    </script>
@endsection
