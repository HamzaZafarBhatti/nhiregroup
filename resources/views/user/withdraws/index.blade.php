@extends('layouts.master')

@section('title', 'Withdraw List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}" />
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Withdraw List</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Debited From</th>
                                <th>Credited To</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraws as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
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
                                    <td>
                                        {!! $item->get_status !!}
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
