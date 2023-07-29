@extends('layouts.master')

@section('title', 'All Users')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-table/bootstrap-table.min.css') }}">
    <style>
        td {
            vertical-align: middle;
        }

        .dataTables_wrapper {
            overflow: auto;
        }

        .success-disabled {
            pointer-events: none;
        }
    </style>
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">All Users</h6>
                </div>
                <div class="card-body">
                    <div style="overflow: auto; margin-bottom: 20px;">

                        <div class="d-flex justify-content-end">
                            <form action="{{ route('admin.users.search.users') }}" method="get" class="d-flex  gap-1">
                                <input type="text" class="form-control" name="search" placeholder="Enter Username">
                                <button type="submit" class="btn btn-info">Search</button>
                            </form>
                        </div>


                        <form action="{{ route('admin.users.employ.workers') }}" method="post">
                            @csrf

                        <div id="toolbar" class="select d-flex gap-2 justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-success" id="employSelected">Employ Selected</button>
                            </div>
                        </div>

                            {{--
                            <div class="col-md-3">
                                <form action="#" method="GET" class="d-flex gap-2">
                                    <label for="perPage">PerPage </label>
                                    <input type="number" name="per_page" id="perPage" placeholder="100" class="form-control">
                                    <button type="submit" class="btn btn-info">Fetch</button>
                                </form>
                            </div>
                            --}}
                        <table class="table table--light style--two">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="" id="selectAllIds">
                                    </th>
                                    <th>@lang('S.N.')</th>
                                    <th>@lang('User')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Joined')</th>
                                    <th>@lang('Package')</th>
                                    {{--<th>@lang('Employed')</th>--}}
                                    <th>@lang('Action')</th>
                                </tr>
                                </thead>

                                <tbody class="list">

                                @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="ids[]" id="selectAllIds" class="checkbox_ids" value="{{ $user->id }}" @if($user->employed == 1) disabled @endif>
                                        </td>
                                        <td data-label="@lang('S.N.')"> {{ ($user->currentPage-1) * $user->perPage + $loop->iteration }}</td>
                                        <td data-label="@lang('User')" class="text-left">{{ $user->name }}</td>
                                        <td data-label="@lang('Email')">{{ $user->email }}</td>
                                        <td data-label="@lang('Joined')" class="text-left">{{ $user->created_at->format('d-M-Y')}}</td>
                                        <td data-label="@lang('Package')" class="text-left">{{ $user->package->name }}</td>
{{--                                        <td data-label="@lang('Employed')"> <span class="text--small text-center badge @if($user->employed == 1) bg-success @else bg-danger @endif font-weight-normal">@if($user->employed == 1) @lang('Yes') @else @lang('No') @endif </span> </td>--}}
                                        <td data-label="@lang('Action')">
                                            @if($user->employed == 2)
                                                <a class="btn btn-success disabled" href="#"><i>Employed</i></a>
                                            @endif

                                            @if($user->employed == 1)
                                                <a class="btn btn-info disabled" href="#"><i>Offered</i></a>
                                            @endif

                                            @if($user->employed == 0)
                                                <a class="btn btn-dark" href="{{ route('admin.users.employ.worker', $user->id) }}">Employ</a>
                                            @endif

                                            @if($user->employed == -1)
                                                <a class="btn btn-danger disabled" href="#"><i>Rejected</i></a>
                                            @endif

                                            <a class="btn btn-info" href="{{ route('admin.users.edit', $user->id) }}">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">No registered user</td>
                                    </tr>
                                @endforelse
                                </form>
                                </tbody>

                        </table>

                    </div>
                     {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection

@section('scripts')
    <script>
        $(function (e) {
            $("#selectAllIds").click(function () {
                console.log('hello');
                $(".checkbox_ids").prop('checked', $(this).prop('checked'));
            });

            {{--
            $("#employSelected").click(function (e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function () {
                    all_ids.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('admin.users.employ.worker') }}",
                    type: "POST",
                    data: {
                        ids: all_ids,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            Toast.fire({
                                icon: 'success',
                                title: response.success
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: "Something went wrong."
                            })
                        }
                        //$.each(all_ids, function (key,val))
                    }
                })
            })
            --}}
        });
    </script>
@endsection
