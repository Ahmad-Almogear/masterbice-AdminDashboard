{{-- <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div> --}}

<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">{{ $pageTitle }}</h1>
        <nav aria-label="breadcrumb">
            {{-- <ol class="breadcrumb justify-content-center mb-0">
                @foreach ($breadcrumbs as $breadcrumb)
                    <li class="breadcrumb-item">
                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                    </li>
                @endforeach
                <li class="breadcrumb-item text-white" aria-current="page">{{ $pageTitle }}</li>
            </ol> --}}
        </nav>
    </div>
</div>
