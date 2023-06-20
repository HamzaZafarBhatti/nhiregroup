@extends('layouts.master')

@section('title', 'Office')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">
    <style>
        td {
            vertical-align: middle;
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
                    <div class="btn-group d-flex mb-4">
                        @foreach ($packages as $key => $value)
                            <input type="radio" class="btn-check package_id" name="gm-btnradio"
                                id="radio{{ $key }}" value="{{ $key }}"
                                @if ($key === 1) checked @endif>
                            <label class="btn btn-outline-secondary @if (auth()->user()->package_id === 1 && $key === 2) disabled @endif"
                                for="radio{{ $key }}">{{ $value }}</label>
                        @endforeach
                        {{-- <input type="radio" class="btn-check" name="gm-btnradio" id="gm-btnradio2">
                        <label class="btn btn-outline-secondary @if (auth()->user()->package_id === 1) disabled @endif"
                            for="gm-btnradio2">Full Time</label> --}}
                    </div>
                    <table class="myDataTable table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
        $(document).ready(function() {
            var datatable = $('.myDataTable').addClass('nowrap').DataTable({
                responsive: true,
                searching: true,
                processing: true,
                paging: true,
                ordering: true,
                order: [0, 'desc'],
                info: false,
                ajax: {
                    url: "{{ route('user.employers.list') }}",
                    data: function(data) {
                        //alert(data.massage);
                        data.package_id = $('.package_id:checked').val();
                    },
                },
                columns: [{
                        data: 'logo'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'action'
                    },
                ]
            });
            $('.package_id').change(function() {
                console.log($('.package_id:checked').val())
                console.log(datatable.ajax)
                datatable.ajax.reload();
            })
        })
    </script>
@endsection
