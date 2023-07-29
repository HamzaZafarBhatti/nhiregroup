@extends('layouts.master')

@section('title', 'Edit Post')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/summernote.min.css') }}" />
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Post
                    </h5>
                </div>

                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.employer-posts.update', $employer_post->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $employer_post->title) }}" name="title" required />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employer</label>
                            <select name="employer_id" id="employer_id"
                                class="form-control @error('employer_id') is-invalid @enderror" required>
                                <option value="">Choose Employer</option>
                                @foreach ($employers as $item)
                                    <option value="{{ $item->id }}" @if (old('employer_id', $employer_post->employer_id) === $item->id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('employer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5">{{ old('description', $employer_post->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox"
                                    value="1" role="switch" id="is_active" name="is_active"
                                    @if (old('is_active', $employer_post->is_active)) checked @endif>
                                <label class="form-check-label" for="is_active">Active</label>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/bundle/summernote.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
            $('.note-editor .note-btn').on('click', function() {
                $(this).next().toggleClass("show");
            });
        });
    </script>
@endsection
