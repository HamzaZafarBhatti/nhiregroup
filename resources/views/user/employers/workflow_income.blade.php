@extends('layouts.master')

@section('title', 'Workflow Income Log')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">
    <style>
        td {
            vertical-align: middle;
        }

        .dataTables_wrapper {
            overflow: auto;
        }

        .n-search {
            right: 5px;
            top: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Workflow Income Log</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Work Type: <b>{{ auth()->user()->package->name }}</b></h5>
                    </div>

                    {{--
                    <div>
                        <form action="#" method="get" class="mb-2 position-relative">
                            <input type="text" placeholder="Search Employer" class="w-100 border border-2 rounded-5 px-3 py-2">
                            <button type="submit" class="bg-success btn btn-success position-absolute n-search rounded-5 px-4">Search</button>
                        </form>
                    </div>
                    --}}

                    <div>
                        @foreach ($incomes as $item)
                            <div class="d-flex justify-content-between shadow-sm p-3 mb-2 align-items-center rounded border border-2">
                                <div class="d-flex justify-content-start align-items-center">
                                            <div class="n-img__wrapper">
                                                <img src="{{ $item->employer->get_image }}" alt="{{ $item->name  }}" class=" rounded-circle overflow-hidden">
                                            </div>

                                            <div class="mx-2 d-flex flex-column">
                                                <span class="fw-bold employer_name">{{ $item->employer->name }}</span>
                                                <small class="lh-sm earn_amount">Total Earnings: {{ $item->get_amount }}</small>
                                            </div>
                                        </div>
                                <div>
                                    @if ($item->cashed_out)
                                        <button type="button" class="btn btn-success">Completed</button>
                                    @else
                                        <a href="#" {{-- {{ route('user.transfer_workflow_income_to_nhire_wallet', $item->id) }} --}}
                                           class="p-2 rounded color-fff n-btn__disabled btn" type="button">Transfer Funds</a>
                                    @endif
                                </div>
                            </div>



                        @endforeach
                    </div>

                    {{--
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
                                            class="btn btn-success" type="button">Transfer to NHIRE MAIN WALLET</a>
                                    @endif
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                    --}}
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.myDataTable').addClass('nowrap').dataTable({
                // responsive: true,
                searching: true,
                paging: true,
                ordering: true,
                info: false,
            });
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

    </style>
@endpush
