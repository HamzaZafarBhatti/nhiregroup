@extends('layouts.master')

@section('title', 'Settings')

@section('content')
    <div class="row g-3 row-deck vh-100">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">Settings</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3" method="post" action="{{ route('') }}">
                        <div class="col-12">
                            <label for="TextInput" class="form-label">Text Input</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="TextInputD" class="form-label">Text Input Disabled</label>
                            <input type="text" class="form-control" disabled>
                        </div>
                        <div class="col-12">
                            <label for="PasswordInput" class="form-label">Password Input</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="PasswordInputD" class="form-label">Password Input Disabled</label>
                            <input type="password" class="form-control" disabled>
                        </div>
                        <div class="col-12">
                            <label for="textareaInput" class="form-label">Textarea Input</label>
                            <textarea name="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="textareaInputD" class="form-label">Textarea Input Disabled</label>
                            <textarea name="" cols="30" rows="5" class="form-control" disabled></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked">Checked checkbox</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled"
                                    disabled>
                                <label class="form-check-label" for="flexCheckDisabled">Disabled checkbox</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled"
                                    checked disabled>
                                <label class="form-check-label" for="flexCheckCheckedDisabled">Disabled checked
                                    checkbox</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Default radio</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">Default checked radio</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                    id="flexRadioDisabled" disabled>
                                <label class="form-check-label" for="flexRadioDisabled">Disabled radio</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                    id="flexRadioCheckedDisabled" checked disabled>
                                <label class="form-check-label" for="flexRadioCheckedDisabled">Disabled checked
                                    radio</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection
