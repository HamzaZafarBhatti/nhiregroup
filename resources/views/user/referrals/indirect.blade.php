@extends('layouts.master')

@section('title', 'Indirect Trainees')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">
@endsection

@section('content')
    <div class="row g-3">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">My Indirect Trainees</h6>
                </div>
                <div class="card-body">
                    <table class="myDataTable table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referrals as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-uppercase">{{ $item->downline->username }}</td>
                                    <td>{{ $item->downline->email }}</td>
                                    <td>{{ $item->get_amount }}</td>
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
