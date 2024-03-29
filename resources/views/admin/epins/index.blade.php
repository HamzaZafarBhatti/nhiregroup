@extends('layouts.master')

@section('title', 'E-Pin List')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create E-Pins
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.epins.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Package</label>
                            <select class="form-select @error('package_id') is-invalid @enderror" name="package_id"
                                required>
                                <option selected disabled value="">Choose Package</option>
                                @foreach ($packages as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('package_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E-Pin Count</label>
                            <input type="number" class="form-control @error('count') is-invalid @enderror"
                                value="{{ old('count') }}" name="count" required />
                            @error('count')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">E-Pins</h6>
                    <div>
                        <a type="button" id="download_link" class="btn btn-primary disabled">Download</a>
                    </div>
                </div>
                <div class="card-body">
                    <div style="overflow: auto">
                        <table id="myTable" class="table display dataTable table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Sr. #</th>
                                    <th>Serial</th>
                                    <th>Package</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($epins as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ($epins->currentPage() - 1) * 15 }}</td>
                                        <td>{{ $item->serial }}</td>
                                        <td>{{ $item->package->name }}</td>
                                        <td>
                                            @if ($item->is_purchased)
                                                <span class="badge bg-info">Purchased</span>
                                            @else
                                                <span class="badge bg-success">Available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.epins.destroy', $item->id) }}" type="button"
                                                onclick="event.preventDefault(); document.getElementById('formDelete{{ $item->id }}').submit();"
                                                class="btn btn-link text-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="top" aria-label="Delete"
                                                data-bs-original-title="Delete"><i class="fa fa-trash"></i></a>
                                            <form action="{{ route('admin.epins.destroy', $item->id) }}" method="post"
                                                id="formDelete{{ $item->id }}" style="display: none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $epins->links() !!}
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            console.log('{{ Session::get('download_link') }}')
            if ('{{ Session::get('download_link') }}') {
                // location.reload(true);
                $('#download_link').removeClass('disabled').attr('href',
                        '{{ route(Session::get('download_link') ?? 'admin.dashboard') }}')
                    .trigger('click');
            } else {
                $('#download_link').addClass('disabled')
            }
        });
    </script>
@endsection
