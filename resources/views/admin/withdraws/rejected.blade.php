@extends('layouts.master')

@section('title', 'Rejected Requests')

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
                    <h6 class="card-title mb-0">Rejected Requests</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>User</th>
                                <th>Debited From</th>
                                <th>Credited To</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraws as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->username }}</td>
                                    <td>{{ $item->wallet_type->getLabel() }}</td>
                                    <td>
                                        {{ $item->withdraw_to->getLabel() }} -
                                        @if ($item->withdraw_to === App\Enum\WithdrawToEnum::USDT)
                                            <b>
                                                {{ $item->usdt_wallet->wallet_address }}
                                            </b>
                                        @endif
                                        @if ($item->withdraw_to === App\Enum\WithdrawToEnum::BANK)
                                            <b>
                                                {{ $item->bank_user->get_bank_details }}
                                            </b>
                                        @endif
                                    </td>
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
        $(document).ready(function() {
            $("#myTable").addClass("nowrap").dataTable({
                // responsive: true,
            });
        });
    </script>
@endsection
