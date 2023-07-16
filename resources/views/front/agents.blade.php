@extends('front.layouts.app')

@section('content')
    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            <div class="row">
                <div class="pm-footer-social-info-container">
                    <h6>NHIRE AGENTS</h6>
                </div>
                @foreach ($vendors as $item)
                    <div class="col-md-6">
                        <div>
                            <h4>{{ $item->name }}</h4>
                            <h6>{{ $item->email }}</h6>
                            <h6>{{ $item->phone }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
