@extends('layouts.master')

@section('title', 'User Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">User Information</h5>
                    <h5 class="card-title mb-0">{{ $user_details->package->name }} | {{ $user_details->epin->serial }}</h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.profile.update') }}" method="post" novalidate>
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $user_details->name }}" name="name" required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $user_details->email }}" name="email" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">N-Job Wallet</label>
                            <input type="number" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $user_details->nhire_wallet }}" name="email" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">N-Broker Wallet</label>
                            <input type="number" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $user_details->earning_wallet }}" name="email" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Save
                            </button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Update Password</h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.users.update_password', $user_details->id) }}"
                        method="post" novalidate>
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required />
                            @error('password')
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Direct Trainees</h5>
            </div>
            <div class="card-body">
                <table class="myDataTable table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_details->direct_refferals as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-uppercase">{{ $item->downline->username }}</td>
                                <td>{{ $item->downline->email }}</td>
                                <td>{{ $item->get_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Indirect Trainees</h5>
            </div>
            <div class="card-body">
                <table class="myDataTable table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_details->indirect_refferals as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-uppercase">{{ $item->downline->username }}</td>
                                <td>{{ $item->downline->email }}</td>
                                <td>{{ $item->get_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Salary Withdrawals</h5>
            </div>
            <div class="card-body">
                <table class="myDataTable table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_details->salary_withdrawals as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-uppercase">{{ $item->downline->username }}</td>
                                <td>{{ $item->downline->email }}</td>
                                <td>{{ $item->get_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div> <!-- .row end -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <script>
        $('.myDataTable').addClass('nowrap').dataTable({
            responsive: true,
            searching: true,
            paging: true,
            ordering: true,
            info: false,
        });
    </script>
@endsection
