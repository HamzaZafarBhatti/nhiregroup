@extends('layouts.master')

@section('title', 'All Users')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">All Users</h6>
                </div>
                <div class="card-body">
                    <div style="overflow: auto">
                        <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Sr. #</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ($users->currentPage() - 1) * 15 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $item->id) }}" type="button"
                                                class="btn btn-link text-info" data-bs-toggle="tooltip"
                                                data-bs-placement="top" aria-label="Accept"
                                                data-bs-original-title="Accept"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
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
    <script></script>
@endsection
