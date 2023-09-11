@extends('front.layouts.app')
@section('content')
    <section class="bg-light py-4">
        <div class="container">
            <div class="row g-2 alig-items-stretch h-100">
                <div class="col-md-4">
                    <div class="card text-bg-dark mb-2">
                        <img src="{{ asset($posts[0]->img) }}" class="card-img" alt="..." loading="lazy">
                        <div class="card-img-overlay2">
                            <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                <span class="card-text mt-auto text-light">
                                    {{ Carbon\Carbon::parse($posts[0]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                </span>
                                <a href="{{ route('post.show', ['id' => $posts[0]->id]) }}"
                                    class="fs-4 link-light text-decoration-none">
                                    {{ $posts[0]->title }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card text-bg-dark mb-2">
                        <img src=" {{ asset($posts[1]->img) }}" class="card-img" alt="..." loading="lazy">
                        <div class="card-img-overlay2">
                            <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                <span class="card-text mt-auto text-light">
                                    {{ Carbon\Carbon::parse($posts[1]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                </span>
                                <a href="{{ route('post.show', ['id' => $posts[1]->id]) }}"
                                    class="fs-4 link-light text-decoration-none">
                                    {{ $posts[1]->title }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-dark">
                        <img src=" {{ asset($posts[2]->img) }}" class="card-img img-fluid" alt="..." loading="lazy">
                        <div class="card-img-overlay2">
                            <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                <span class="card-text mt-auto text-light">
                                    {{ Carbon\Carbon::parse($posts[2]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                </span>
                                <a href="{{ route('post.show', ['id' => $posts[2]->id]) }}"
                                    class="fs-4 link-light text-decoration-none">
                                    {{ $posts[2]->title }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-dark mb-2">
                        <img src="{{ asset($posts[0]->img) }}"
                            class="card-img" alt="...">
                        <div class="card-img-overlay2">
                            <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                <span class="card-text mt-auto text-light">
                                    {{ Carbon\Carbon::parse($posts[0]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                </span>
                                <a href="{{ route('post.show', ['id' => $posts[0]->id]) }}" class="fs-4 link-light text-decoration-none">
                                    {{ $posts[0]->title }}
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card text-bg-dark">
                        <img src="{{ asset($posts[0]->img) }}"
                            class="card-img" alt="...">
                        <div class="card-img-overlay2">
                            <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                <span class="card-text mt-auto text-light">
                                    {{ Carbon\Carbon::parse($posts[0]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                </span>
                                <a href="{{ route('post.show', ['id' => $posts[0]->id]) }}" class="fs-4 link-light text-decoration-none">
                                    {{ $posts[0]->title }}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container ">
            <div class="row">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="fw-bold text-dark mt-4 mb-3">
                        {{ $categories[0]->category }}
                    </h2>
                    <a href="{{ route('index') }}" class="text-decoration-none text-dark">
                        {{ __('Tümünü Gör') }}
                    </a>
                </div>
            </div>
            <div class="row g-3 align-items-stretch">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="https://images.unsplash.com/photo-1682687219800-bba120d709c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="https://images.unsplash.com/photo-1682687219800-bba120d709c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-4">
        <div class="container">
            <div class="row g-1">
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <img src="https://images.unsplash.com/photo-1682687219800-bba120d709c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <img src="https://images.unsplash.com/photo-1682687219800-bba120d709c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <img src="https://images.unsplash.com/photo-1682687219800-bba120d709c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <img src="https://images.unsplash.com/photo-1682687219800-bba120d709c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container">
            <div class="row g-3 alig-items-stretch h-100">
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="card text-bg-dark">
                                <img src="https://images.unsplash.com/photo-1682685797498-3bad2c6e161a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                    class="card-img" alt="...">
                                <div class="card-img-overlay2">
                                    <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                        <span class="card-text mt-auto text-light">
                                            {{ Carbon\Carbon::parse($posts[0]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                        </span>
                                        <a href="" class="fs-4 link-light text-decoration-none">
                                            {{ $posts[0]->title }}
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card text-bg-dark">
                                <img src="https://images.unsplash.com/photo-1682685797498-3bad2c6e161a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                    class="card-img" alt="...">
                                <div class="card-img-overlay2">
                                    <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                        <span class="card-text mt-auto text-light">
                                            {{ Carbon\Carbon::parse($posts[0]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                        </span>
                                        <a href="" class="fs-4 link-light text-decoration-none">
                                            {{ $posts[0]->title }}
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card text-bg-dark">
                                <img src="https://images.unsplash.com/photo-1682685797498-3bad2c6e161a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                    class="card-img" alt="...">
                                <div class="card-img-overlay2">
                                    <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                        <span class="card-text mt-auto text-light">
                                            {{ Carbon\Carbon::parse($posts[0]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                        </span>
                                        <a href="" class="fs-4 link-light text-decoration-none">
                                            {{ $posts[0]->title }}
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-6 ">
                    <div class="card text-bg-dark h-100">
                        <img src="https://images.unsplash.com/photo-1682685797498-3bad2c6e161a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            class="card-img" alt="...">
                        <div class="card-img-overlay2">
                            <div class="d-flex flex-column h-100 text-white text-shadow-1">
                                <span class="card-text mt-auto text-light">
                                    {{ Carbon\Carbon::parse($posts[0]->created_at)->isoFormat('MMMM DD, YYYY') }}
                                </span>
                                <a href="" class="fs-4 link-light text-decoration-none">
                                    {{ $posts[0]->title }}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
