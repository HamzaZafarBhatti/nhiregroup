@extends('layouts.master')

@section('title', 'My Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">
    <style>
        td {
            vertical-align: middle;
        }

        .dataTables_wrapper {
            overflow: auto;
        }

        .green-gradient {
            background: linear-gradient(90deg, rgba(21, 115, 71, 1) 0%, rgba(150, 176, 9, 1) 50%, rgba(212, 175, 55, 1) 100%);
        }

        [data-theme=dark] .green-gradient,
        [data-theme=dark] .green-gradient .card-title {
            color: var(--color-100) !important;
        }
    </style>
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-md-6 text-gold">
            <h4>NHIRE Dashboard</h4>
            <h5>Welcome, {{ $user->name }}</h5>
        </div>
        <div class="col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="text-center text-lg-start text-uppercase">
                        <h5>Total Salary Payment</h5>
                        <h5>{{ $user->get_total_income }}</h5>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('user.generate_pay_slip') }}"
                            class="btn btn-success w-100 btn-lg text-gold">Generate
                            Payslip</a>
                    </div>
                    <div>
                        <div class="owl-carousel owl-theme" id="trending_bids">
                            <div class="item card overflow-hidden green-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between text-uppercase">
                                        <h4 class="card-title">Coach 1</h4>
                                        <h4 class="card-title">{{ $user->package->name }}
                                        </h4>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="text-start">
                                            <h5>Earnings</h5>
                                            <h5 class="mt-2 fw-bolder">{{ $user->get_direct_ref_bonus }}</h5>
                                        </div>
                                        <div class="text-end">
                                            <h5>No. of Trainees</h5>
                                            <h5 class="mt-2 fw-bolder">{{ $user->direct_refferals->count() }}</h5>
                                        </div>
                                    </div>
                                    <h6 class="text-center">The more you work, the more you earn</h6>
                                </div>
                            </div>
                            <div class="item card overflow-hidden green-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between text-uppercase">
                                        <h4 class="card-title">Coach 2</h4>
                                        <h4 class="card-title">{{ $user->package->name }}
                                        </h4>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="text-start">
                                            <h5>Earnings</h5>
                                            <h5 class="mt-2 fw-bolder">{{ $user->get_indirect_ref_bonus }}</h5>
                                        </div>
                                        <div class="text-end">
                                            <h5>No. of Trainees</h5>
                                            <h5 class="mt-2 fw-bolder">{{ $user->indirect_refferals->count() }}</h5>
                                        </div>
                                    </div>
                                    <h6 class="text-center">The larger the team, the more you earn</h6>
                                </div>
                            </div>
                            <div class="item card overflow-hidden green-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between text-uppercase">
                                        <h4 class="card-title">N-Worker</h4>
                                        <h4 class="card-title">{{ $user->package->name }}
                                        </h4>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="text-start">
                                            <h5>Earnings</h5>
                                            <h5 class="mt-2 fw-bolder">{{ $user->get_nhire_wallet }}</h5>
                                        </div>
                                        <div class="text-end">
                                            <h5>No. of Works</h5>
                                            <h5 class="mt-2 fw-bolder">{{ $user->cashed_out_works->count() }}</h5>
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
                    <div class="mb-2 text-uppercase">Equity</div>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Jobs Income Log</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Account Type: <b>{{ auth()->user()->package->name }}</b></h5>
                    </div>
                    <table class="myDataTable table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Employer</th>
                                <th>Earning</th>
                                <th>Date/Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomes as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ $item->employer->get_image }}" alt="{{ $item->name }}"
                                            class="avatar xl rounded-5">
                                    </td>
                                    <td>
                                        {{ $item->employer->name }}
                                    </td>
                                    <td>{{ $item->get_amount }}</td>
                                    <td>{{ $item->get_time }}</td>
                                    <td>
                                        @if ($item->cashed_out)
                                            Completed
                                        @else
                                            <a href="{{ route('user.transfer_workflow_income_to_nhire_wallet', $item->id) }}"
                                                class="btn btn-success" type="button">Transfer to N-Jobs MAIN WALLET</a>
                                        @endif
                                    </td>
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
        function copyToClipboard(text) {
            var sampleTextarea = document.createElement("textarea");
            document.body.appendChild(sampleTextarea);
            sampleTextarea.value = text; //save main text in it
            sampleTextarea.select(); //select textarea contenrs
            document.execCommand("copy");
            document.body.removeChild(sampleTextarea);
        }
        $(document).ready(function() {
            $('.myDataTable').addClass('nowrap').dataTable({
                // responsive: true,
                searching: true,
                paging: true,
                ordering: true,
                info: false,
            });
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
