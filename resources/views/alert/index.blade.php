@if (Session::has('success'))
    <div class="alert alert-success d-flex align-items-center justify-content-center">
        <b>
            {{ session('success') }}
        </b>
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-warning d-flex align-items-center justify-content-center">
        <b>
            {{ session('warning') }}
        </b>
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
        <div>
            {{ session('error') }}
        </div>
    </div>
@elseif(Session::has('deleted'))
    <div class="alert alert-secondary d-flex align-items-center justify-content-center">
        <b>
            {{ session('deleted') }}
        </b>
    </div>
{{-- @elseif(Session::has('status'))
    <div class="alert alert-secondary d-flex align-items-center justify-content-center">
        <b>
            {{ session('status') }}
        </b>
    </div> --}}
@endif
