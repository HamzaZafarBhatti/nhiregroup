@extends('layouts.master')

@section('title', 'My Dashboard')

@section('content')
    <div class="row g-3">
        <div class="col-md-6">
            <h3>NHIRE Dashboard</h3>
            <h2>Welcome, {{ auth()->user()->name }}</h2>
        </div>
        <div class="col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="text-center text-lg-start text-uppercase">
                        <h5>Total Sum (Cumulatively)</h5>
                        <h5>N 2131312</h5>
                    </div>
                    <div class="mb-3">
                        <a href="#" class="btn btn-primary w-100 btn-lg">Generate Payslip</a>
                    </div>
                    <div>
                        <div class="owl-carousel owl-theme" id="trending_bids">
                            <div class="item card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between text-uppercase">
                                        <h4 class="card-title">Coach 1</h4>
                                        <h4 class="card-title">{{ auth()->user()->package->name }}
                                        </h4>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="text-start">
                                            <h5>Earnings (DIRECT)</h5>
                                            <h5 class="mt-2 fw-bolder">N123123</h5>
                                        </div>
                                        <div class="text-end">
                                            <h5>No. of Referrals</h5>
                                            <h5 class="mt-2 fw-bolder">62</h5>
                                        </div>
                                    </div>
                                    <h6 class="text-center">The more you work, the more you earn</h6>
                                </div>
                            </div>
                            <div class="item card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title">Coach 2</h4>
                                        <h4 class="card-title">{{ auth()->user()->package->name }}
                                        </h4>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="text-start">
                                            <h5>Earnings (INDIRECT)</h5>
                                            <h5 class="mt-2 fw-bolder">N123123</h5>
                                        </div>
                                        <div class="text-end">
                                            <h5>No. of Referrals</h5>
                                            <h5 class="mt-2 fw-bolder">62</h5>
                                        </div>
                                    </div>
                                    <h6 class="text-center">The larger the team, the more you earn</h6>
                                </div>
                            </div>
                            <div class="item card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title">N-Worker</h4>
                                        <h4 class="card-title">{{ auth()->user()->package->name }}
                                        </h4>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="text-start">
                                            <h5>Earnings</h5>
                                            <h5 class="mt-2 fw-bolder">N123123</h5>
                                        </div>
                                        <div class="text-end">
                                            <h5>No. of Works</h5>
                                            <h5 class="mt-2 fw-bolder">62</h5>
                                        </div>
                                    </div>
                                    <h6 class="text-center">No earning limitations as an NHIRE worker</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h5>Referral Link</h5>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control"
                            value="{{ route('user.register') . '?referral=' . $user->username }}" readonly
                            id="referral_link" aria-describedby="inputGroupPrice" />
                        <span class="input-group-text" id="inputGroupPrice">
                            <i class="fa fa-copy"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg" width="26"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path class="fill-muted"
                            d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                        <path class="fill-primary"
                            d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <div class="mb-2 text-uppercase">Points</div>
                    <div class="mb-2">
                        <span class="h4">{{ $user->points }}</span>
                    </div>
                </div>
                <div class="progress" style="height: 4px;">
                    <div class="progress-bar bg-secondary" role="progressbar"
                        style="width: {{ ($user->points * 100) / 50 }}%" aria-valuenow="{{ ($user->points * 100) / 50 }}"
                        aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg" width="26"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path class="fill-primary" fill-rule="evenodd"
                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                        <path class="fill-primary"
                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                        <path class="fill-muted"
                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                        <path class="fill-muted" d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                    </svg>
                    <div class="mb-2 text-uppercase">Referral Bonus</div>
                    <div><span class="h4">₦{{ $user->ref_bonus }}</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="mb-2 text-uppercase">Direct Referrals</div>
                    <div><span class="h4">{{ $user->direct_refferals->count() }}</span> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                        width="26" fill="currentColor" viewBox="0 0 16 16">
                        <path class="fill-primary" fill-rule="evenodd"
                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                        <path class="fill-primary"
                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                        <path class="fill-muted"
                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                        <path class="fill-muted"
                            d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                    </svg>
                    <div class="mb-2 text-uppercase">Indirect Referral Bonus</div>
                    <div><span class="h4">₦{{ $user->indirect_ref_bonus }}</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="mb-2 text-uppercase">Indirect Referrals</div>
                    <div><span class="h4">{{ $user->indirect_refferals->count() }}</span> </div>
                </div>
            </div>
        </div>
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
            $('#trending_bids').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    }
                }
            })
        })
    </script>
@endsection
