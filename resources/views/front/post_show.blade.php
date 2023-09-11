@extends('front.layouts.app')
@section('content')
    <div class="card text-bg-dark mb-2 rounded-0" style="max-height: 400px;">
        <img src=" {{ asset($post->img) }}" class="card-img" alt="..." loading="lazy" style="max-height: 400px;">
        <div class="card-img-overlay2 d-flex align-items-center" style="max-height: 400px;">
            <div class="d-flex flex-column text-white text-shadow-1  text-center mx-auto">
                <h2 class="display-4">
                    {{ $post->title }}
                </h2>
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <span>
                        Yazar : {{ $post->user->email }}
                    </span>
                    <span>
                        {{ Carbon\Carbon::parse($post->created_at)->isoFormat('MMMM DD, YYYY') }}
                    </span>
                </div>

            </div>
        </div>
    </div>
    <section class="bg-light py-4 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="lead">
                        {{ $post->content }}
                    </p>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img loading="lazy" class="img-fluid rounded-circle"
                            src="https://play-lh.googleusercontent.com/UjaAdTYsArv7zAJbqGWjQw2ftuOtnAlvokffC3TQQ2K12mwk0YdXUF2wZBTBA2kDZIk"
                            style="max-width: 100px">
                        <h3 class="mt-3">
                            {{ $post->user->email }}
                        </h3>
                        <span>
                            {{ $post->user->posts->count() }} yazı
                        </span>
                    </div>
                    <hr>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h3 class="mt-3">
                            Kategoriler
                        </h3>
                        <div class="d-flex flex-column w-100 gap-2">
                            @foreach ($categories as $category)
                                <div class="d-flex align-items-center justify-content-between">
                                    {{ $category->category }} 
                                    <span>({{ $category->total }})</span>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
