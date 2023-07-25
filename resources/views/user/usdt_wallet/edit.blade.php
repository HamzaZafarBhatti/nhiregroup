@extends('layouts.master')

@section('title', 'Edit USDT Wallet')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit USDT (TRC20) Wallet
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('user.usdt_wallet.update', $wallet->id) }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Account Name</label>
                            <input type="text" class="form-control @error('wallet_address') is-invalid @enderror"
                                value="{{ old('wallet_address', $wallet->wallet_address) }}" name="wallet_address"
                                required />
                            @error('wallet_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success" type="submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
