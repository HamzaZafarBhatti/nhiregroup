@extends('layouts.master')

@section('title', 'Add USDT Wallet')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add USDT Wallet
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('user.usdt_wallet.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Wallet Address</label>
                            <input type="text" class="form-control @error('wallet_address') is-invalid @enderror"
                                value="{{ old('wallet_address') }}" name="wallet_address" required />
                            @error('wallet_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Add
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
