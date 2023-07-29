@extends('layouts.master')

@section('title', 'Office')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">
    <style>
        td {
            vertical-align: middle;
        }

        .dataTables_wrapper {
            overflow: auto;
        }
    </style>
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Employers</h6>
                </div>

                <div class="card-body">

                    {{--
                    <div>
                        <form action="#" method="get" class="mb-2 position-relative">
                            <input type="text" placeholder="Search Employer" class="w-100 border border-2 rounded-5 px-3 py-2">
                            <button type="submit" class="bg-success btn btn-success position-absolute n-search rounded-5 px-4">Search</button>
                        </form>
                    </div>
                    --}}

                    <div class="d-flex mb-3 justify-content-center rounded-3 overflow-hidden">
                        <div class="n-expected__card n-type px-4 py-2 w-50 text-white">
                            <small>Expected Salary</small>
                            <h5 class="fw-bold fs-6">
                                @if(auth()->user()->package_id == 1) 
                                    ₦60,000 
                                @elseif(auth()->user()->package_id == 2) 
                                    ₦120,000 
                                @else
                                    ₦0
                                @endif 
                            </h5>
                        </div>
                        <div class="n-progress__card n-type px-2 text-white w-50">
                            <small>Salary Progress</small>
                            <h5 class="fw-bold fs-6">₦{{ auth()->user()->earning_wallet }}</h5>
                        </div>
                    </div>
                    <div class="btn-group d-flex mb-4 n-tabs">
                        @foreach ($packages as $key => $value)
                            <input type="radio" class="btn-check package_id" name="gm-btnradio"
                                id="radio{{ $key }}" value="{{ $key }}"
                                @if ($key === 1) checked @endif>
                            <label class="btn n-tab n-tab{{ $key }} @if (auth()->user()->package_id === 1 && $key === 2) disabled n-disabled @endif"
                                for="radio{{ $key }}">{{ $value }}</label>
                        @endforeach
                        {{-- <input type="radio" class="btn-check" name="gm-btnradio" id="gm-btnradio2">
                        <label class="btn btn-outline-secondary @if (auth()->user()->package_id === 1) disabled @endif"
                            for="gm-btnradio2">Full Time</label> --}}
                    </div>

                    <div id="parttime" class="row">
                    @forelse($employers as $employer)
                        @if($employer->package_id == 1)
                            <div class="d-flex justify-content-between shadow-sm p-3 mb-2 align-items-center rounded border border-2">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="n-img__wrapper">
                                        <img src="{{ $employer->get_image }}" alt="{{ $employer->name  }}" class=" rounded-circle overflow-hidden">
                                    </div>

                                    <div class="mx-2 d-flex flex-column">
                                        <span class="fw-bold employer_name">{{ $employer->name }}</span>
                                        <small class="lh-sm earn_amount">Job Payout: {{ $employer->get_earning_amount }}</small>
                                    </div>
                                </div>
                                <div>
                                    @if(!empty($employer->latest_job))
                                        <a href="{{ route('front.jobfortoday', $employer->latest_job->slug) }}" class="p-2 rounded color-fff n-btn__enabled">Start Job</a>
                                    @else
                                        <button disabled class="rounded color-fff job-dis n-btn__disabled">Start Job</button>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @empty
                        There is nothing here
                    @endforelse
                    </div>

                    <div id="fulltime">
                        @forelse($employers as $employer)
                            @if($employer->package_id == 2)
                                <div class="d-flex justify-content-between shadow-sm p-3 mb-2 align-items-center rounded border border-2">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="n-img__wrapper">
                                            <img src="{{ $employer->get_image }}" alt="{{ $employer->name  }}" class=" rounded-circle overflow-hidden">
                                        </div>

                                        <div class="mx-2 d-flex flex-column">
                                            <span class="fw-bold fs-6">{{ $employer->name }}</span>
                                            <small class="lh-sm">Job Payout: {{ $employer->get_earning_amount }}</small>
                                        </div>
                                    </div>
                                    <div>
                                        @if(!empty($employer->latest_job))
                                            <a href="{{ route('front.jobfortoday', $employer->latest_job->slug) }}" class="py-2 px-3 rounded color-fff n-btn__enabled">Start Job</a>
                                        @else
                                            <button disabled class="py-1 px-2 rounded color-fff n-btn__disabled">Start Job</button>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @empty
                            There is nothing here
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('.n-tab1').click(function () {
                console.log('Hello 1');
                $('#parttime').show();
                $('#fulltime').hide();
            })

            $('.n-tab2').click(function () {
                console.log('Hello 2')
                $('#parttime').hide();
                $('#fulltime').show();
            })
        })
    </script>
@endsection

@push('style')
    <style>
        .n-tabs {
            border: 3px solid #45B634;
            border-radius: 20px;
            overflow: hidden;
        }

        .btn-group.n-tabs .n-tab {
            border: none;
            color: #373737;
            font-weight: 700;
            text-transform: capitalize;
        }

        .btn-group.n-tabs .n-disabled {
            background-color: #f6f6f6;
            color: #0c6501;
        }

        .btn-check:checked + .btn {
            background-color: #45B634 !important;
            color: #ffffff;
        }

        .btn-check[id="radio{{ $key }}"]:checked + .n-tab{{ $key }} {
            background-color: #45B634 !important;
            color: #ffffff;
        }

        .n-progress__card {
            background-color: #A4D82B;
        }

        .n-expected__card {
            background: linear-gradient(to right, #45B735 60%, #62C358);
        }

        .n-btn__disabled {
            background-color: #72a17d;
            cursor: not-allowed;
        }
        .n-btn__disabled:hover {
            color: #ffffff;
        }

        .n-btn__enabled {
            background-color: #2CBC50;
        }

        .n-btn__enabled:hover {
            background-color: #45B735;
            color: #ffffff;
        }

        .n-img__wrapper {
            width: 50px;
            height: 50px;
            overflow: hidden;
        }

        .n-img__wrapper img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .employer_name {
            font-size: 14px;
        }

        #fulltime {
            display: none;
        }
        .job-dis {
            font-size: 14px;
            border: none;
            padding: 5px 10px;
        }

        .n-search {
            right: 5px;
            top: 4px;
        }

    </style>
@endpush
