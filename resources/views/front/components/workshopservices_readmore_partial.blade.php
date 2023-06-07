@foreach ($blogs as $item)
    <div class="col-12 col-sm-6 col-md-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $item->title }}</h3>
            </div>
            <div class="panel-body">
                <div class="img-container">
                    <img src="{{ $item->get_image }}" alt="{{ $item->title }}">
                </div>
                <div class="blog-details">
                    <p>{!! Str::limit(strip_tags($item->description), 100) !!}</p>
                </div>
                <div class="">
                    @auth
                        <a href="{{ route('front.workshopservice', $item->slug) }}" class="text-primary"
                            target="_blank">Read More >></a>
                    @endauth
                    @if (!empty(session('job_permit')))
                        <a href="{{ route('front.workshopservice', $item->slug) }}" class="text-primary"
                            target="_blank">Read More >></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
