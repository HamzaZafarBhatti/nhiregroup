@extends('layouts.master')

@section('title', 'Edit Post')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/summernote.min.css') }}" />
    <style>
        .tvtarea { white-space: normal }
    </style>
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
                        <div class="col-md-6">
                            <label class="form-label">Number of Workers</label>
                            <input type="number" name="workers" id="workers" value="{{ old('workers', $employer_post->workers) }}"
                                   class="form-control @error('workers') is-invalid @enderror" required>
                            @error('workers')
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

                        <h5 class="fw-bold mt-4">Add Job Steps</h5>

                        <div class="row stepsContainer">
                            @forelse($employer_post->steps as $step)
                                <div class="my-3">
                                    <label class="fw-700" for="step{{$step->priority}}">{{ $step->step }}</label>
                                    <textarea name="steps[]" class="form-control tvtarea" id="step{{$step->priority}}">
                                        {{ old('steps[]', trim(htmlspecialchars($step->description))) }}
                                    </textarea>
                                    @error('steps[]')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @empty
                                There are no steps for this job
                            @endforelse
                        </div>

                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-dark rounded add-more-btn" title="Add more steps">
                                    Add steps <i class="fa fa-plus"></i>
                                </a>
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


    <script>
        'use strict';
        (function($){

            var itr = {{ $count }};

            $('.add-more-btn').on('click', function(){
                itr++
                $(".stepsContainer")
                    .append(`
                        <div class="my-2 more-steps">
                            <label class="fw-700" for="step${itr}">Step ${itr}</label>
                            <div class="new-steps d-flex gap-2 position-relative">
                                <textarea name="steps[]" class="form-control tvtarea more-area" id="step${itr}"></textarea>
                                @error('steps[]')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div>
                                    <a href="javascript:void(0)" class="btn btn-danger delete-btn add-more-btn">
                                         <i class="fa fa-minus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    `);

            });

            $(document).on('click', '.delete-btn', function () {
                $(this).closest('.more-steps').remove();
                itr--
            });

        })(jQuery)
    </script>
@endsection
