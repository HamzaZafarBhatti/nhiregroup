@extends('layouts.master')

@section('title', 'Salary Dashboard')

@section('content')
    <div class="row g-3">
        <div class="col-md-12">
            <h3>Salary Dashboard</h3>
        </div>
        @if (!auth()->user()->salary_dashboard_access)
            <div class="col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="mb-5">
                            <span class="h4 text-gold">Access denied! Please contact one of our auditors on WhatsApp to
                                validate your salary dashboard. Access fee is ₦
                                {{ auth()->user()->package->salary_dashboard_fee }}.</span>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success btn-lg @if (!empty(auth()->user()->salaryprofile_request) && auth()->user()->salaryprofile_request->status === 0) disabled @endif"
                                onclick="validatePayment()" type="button">Request for
                                Salary Dashboard Access</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                            width="26" fill="currentColor" viewBox="0 0 16 16">
                            <path class="fill-muted"
                                d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                            <path class="fill-primary"
                                d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                        </svg>
                        <div class="mb-2 text-uppercase">Salary</div>
                        <div class="text-center">
                            <h4>₦{{ $settings->point_cashout_amount }}</h4>
                            @if (auth()->user()->points >= auth()->user()->package->min_points_to_cashout)
                                <button type="button" onclick="requestWithdraw()"
                                    class="btn btn-lg btn-success w-100 @if (!empty(auth()->user()->latest_salary_withdrawal) && auth()->user()->latest_salary_withdrawal->status === 0) disabled @endif">Cashout</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div> <!-- .row end -->
@endsection

@section('scripts')
    <script>
        function requestWithdraw() {
            Swal.fire({
                title: "Select Salary Auditor",
                input: "select",
                inputOptions: @php echo $subadmins @endphp,
                inputPlaceholder: 'Select Salary Auditor',
                showCancelButton: true,
                confirmButtonText: "Confirm",
                confirmButtonColor: "#157347",
                cancelButtonColor: "#fc5a69",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    $.ajax({
                        url: "{{ route('user.withdraw.request') }}",
                        type: "POST",
                        data: {
                            subadmin_id: result.value,
                        },
                        success: function(response) {
                            console.log(response);
                            Toast.fire({
                                icon: response.status,
                                title: response.message
                            })
                            if (response.status === 'success') {
                                setTimeout(() => {
                                    window.location.reload();
                                }, 3000);
                            }
                        }
                    })
                }
            });
        }

        function validatePayment() {
            Swal.fire({
                title: "Select Salary Auditor",
                input: "select",
                inputOptions: @php echo $subadmins @endphp,
                inputPlaceholder: 'Select Salary Auditor',
                showCancelButton: true,
                confirmButtonText: "Confirm",
                confirmButtonColor: "#157347",
                cancelButtonColor: "#fc5a69",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to choose something!'
                    }
                },
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    Swal.fire({
                        title: "Have you paid the payment to the auditor?",
                        input: "radio",
                        inputOptions: {
                            '0': 'Not yet!',
                            '1': 'Yes paid!',
                        },
                        inputValidator: (value) => {
                            if (!value) {
                                return 'You need to choose something!'
                            }
                        },
                        showCancelButton: true,
                        confirmButtonText: "Confirm",
                        showLoaderOnConfirm: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                    }).then((result2) => {
                        if (result2.isConfirmed) {
                            console.log(result);
                            console.log(result2);
                            $.ajax({
                                url: "{{ route('user.validate_salary_profile') }}",
                                type: "POST",
                                data: {
                                    subadmin_id: result.value,
                                    is_paid: result2.value,
                                },
                                success: function(response) {
                                    console.log(response);
                                    Toast.fire({
                                        icon: response.status,
                                        title: response.message
                                    })
                                    if (response.status === 'success') {
                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 3000);
                                    }
                                }
                            })
                        }
                    });
                }
            });
        }
    </script>
@endsection
