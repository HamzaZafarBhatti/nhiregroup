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
                            <span class="h4 text-warning">You cannot access your 'Salary Dashboard'. To access it, you have
                                to pay ₦ {{ auth()->user()->package->salary_dashboard_fee }} fee.</span>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#RequestQuote"
                                type="button">Request for Salary Dashboard Access</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="RequestQuote" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content text-start">
                        <div class="modal-body custom_scroll p-lg-5">
                            <form action="{{ route('user.validate_salary_profile') }}" method="post">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-12 mb-4">
                                        <h4>Request for Salary Dashboard Access</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select" name="subadmin_id">
                                                <option selected hidden>Select Admin</option>
                                                @foreach ($subadmins as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label>Select Admin</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Submit Request</button>
                                    </div>
                                </div>
                            </form>
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
                            <a href="{{ route('user.withdraw.request') }}" type="button"
                                class="btn btn-lg btn-success w-100 @if (!empty(auth()->user()->latest_salary_withdrawal) && auth()->user()->latest_salary_withdrawal->status === 0) disabled @endif">Cashout</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div> <!-- .row end -->
@endsection

@section('scripts')
    <script>
        function copyToClipboard(text) {
            var sampleTextarea = document.createElement("textarea");
            document.body.appendChild(sampleTextarea);
            sampleTextarea.value = text; //save main text in it
            sampleTextarea.select(); //select textarea contenrs
            document.execCommand("copy");
            document.body.removeChild(sampleTextarea);
        }
        $(document).ready(function() {
            $('#inputGroupPrice').click(function() {
                var text = $('#referral_link').val();
                copyToClipboard(text);
                Toast.fire({
                    icon: 'success',
                    text: 'Referral Link Successfully Copied!',
                })
            })
        })
        @if ($user->is_first_login)
            Swal.fire({
                icon: 'info',
                allowOutsideClick: false,
                title: "Welcome to Nhire Group",
                text: "Thank you for registering yourself on this platform.",
                confirmButtonText: "Continue using Nhire"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateIsFirstLogin();
                }
            })

            function updateIsFirstLogin() {
                $.ajax({
                    url: "{{ route('user.updateIsFirstLogin') }}",
                    success: function(response) {
                        console.log(response);
                    }
                })
            }
        @endif
    </script>
@endsection
