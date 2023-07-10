@extends('layouts.master')

@section('title', 'Request Withdraw')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Request Withdraw
                    </h5>
                </div>
                <div class="card-body">
                    <div>
                        <h4>NHIRE Wallet: {{ auth()->user()->get_nhire_wallet }}</h4>
                        <h4>Earning Wallet: {{ auth()->user()->get_earning_wallet }}</h4>
                    </div>
                    <form class="row g-3" action="{{ route('user.withdraws.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Withdraw From</label>
                            <select name="wallet_type" id="wallet_type" required
                                class="form-control @error('wallet_type') is-invalid @enderror">
                                <option value="">Select Wallet</option>
                                @foreach ($wallet_types as $item)
                                    <option value="{{ $item }}">{{ $item->getLabel() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('wallet_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Withdraw To</label>
                            <select name="withdraw_to" id="withdraw_to" required
                                class="form-control @error('withdraw_to') is-invalid @enderror">
                                <option value="">Select Source</option>
                                @foreach ($withdraw_to as $item)
                                    <option value="{{ $item }}">{{ $item->getLabel() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('withdraw_to')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                value="{{ old('amount') }}" name="amount" required />
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 d-none" id="bank">
                            <label class="form-label">Bank Account</label>
                            <select name="bank_user_id" id="bank_user_id"
                                class="form-control @error('bank_user_id') is-invalid @enderror">
                                <option value="">Select Bank Account</option>
                                @foreach ($user_banks as $item)
                                    <option value="{{ $item->id }}">{{ $item->get_bank_details }}</option>
                                @endforeach
                            </select>
                            @error('bank_user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 d-none" id="usdt">
                            <label class="form-label">USDT Wallet</label>
                            <input type="hidden" value="{{ $usdt_wallet->id ?? null }}" name="usdt_wallet_id" />
                            <input type="text" class="form-control @error('usdt_wallet_id') is-invalid @enderror"
                                value="{{ $usdt_wallet->wallet_address ?? null }}" readonly />
                            @error('usdt_wallet_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Request Withdraw
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#withdraw_to').change(function() {
                let value = $(this).val();
                if (value === 'bank') {
                    $('#bank').removeClass('d-none')
                    $('#usdt').addClass('d-none')
                } else {
                    $('#usdt').removeClass('d-none')
                    $('#bank').addClass('d-none')
                }
            })
        })
    </script>
@endsection
