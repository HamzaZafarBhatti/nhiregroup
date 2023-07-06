@extends('layouts.master')

@section('title', 'Generate Payslip')

@section('content')
    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Payslip Generated</h6>
                </div>
                <div class="card-body">
                    <h4 class="mb-3">Here's your PAYSLIP generated for you to get paid!</h4>
                    <div>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <h4 class="mb-0">Earnings (Direct):</h4>
                                    </td>
                                    <td>
                                        <h4 class="mb-0 fw-bold">₦{{ $direct_referral_earnings }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="mb-0">Earnings (Indirect):</h4>
                                    </td>
                                    <td>
                                        <h4 class="mb-0 fw-bold">₦{{ $indirect_referral_earnings }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="mb-0">Tax Charges:</h4>
                                    </td>
                                    <td>
                                        <h4 class="mb-0 fw-bold">{{ $payslip_tax }}% of total salary</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="mb-0">Expected Salary:</h4>
                                    </td>
                                    <td>
                                        <h4 class="mb-0 fw-bold">₦{{ $expected_earning }}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('user.transfer_referral_payout') }}" type="btn"
                            class="btn btn-success btn-lg">Transfer Payout to Wallet</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection
