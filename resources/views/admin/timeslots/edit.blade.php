@extends('layouts.master')

@section('title', 'Edit Timeslot')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Timeslot
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.timeslots.update', $timeslot->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $timeslot->title) }}" name="title" required />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Type</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="">Select Type</option>
                                <option value="morning" @if ($timeslot->type === 'morning') selected @endif>Morning</option>
                                <option value="evening" @if ($timeslot->type === 'evening') selected @endif>Evening</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Start Time</label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                value="{{ old('start_time', $timeslot->start_time) }}" name="start_time" required />
                            @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">End Time</label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                value="{{ old('end_time', $timeslot->end_time) }}" name="end_time" required />
                            @error('end_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection

@section('scripts')
@endsection
