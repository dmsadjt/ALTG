@extends('layouts.layout')
@section('title', 'Blog Posts')
@section('contents')

    <section class="hero">
        <div class="container text-white">
            <div class="bg-overlay">
                <h1>Blogs Post</h1>
                <p class="altona-sans-12">Catch up to the latest news!</p>
                <div id="blogsCarouselIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#blogsCarouselIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#blogsCarouselIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#blogsCarouselIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://unsplash.it/400/400" class="d-block w-100" alt="...">

                            <div class="carousel-caption">
                                <h5>{{$posts[0]->title}}</h5>
                                <p>Lorem Ipsum</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://unsplash.it/500/500" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <p>Lorem Ipsum</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://unsplash.it/300/300" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <p>Lorem Ipsum</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#blogsCarouselIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#blogsCarouselIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container text-white">
            <div class="bg-overlay">
                <h2>Recent Posts</h2>
                <p class="altona-sans-12">See the recent news!</p>

                <div class="post-row shadow">
                    @foreach ($posts as $p)
                        <div class="columns-two__5-1 pill-dark p-3 mb-2">
                            <div>
                                <h3>{{$p->title}}</h3>
                                <span class="altona-sans-10">{{$p->created_at}}</span>
                                <p class="altona-sans-12 medium-text">
                                    {{substr($p->body, 100)}} ...
                                    <a class="altona-sans-12"
                                href="#">See more</a>
                                </p>

                            </div>
                            <div class="d-flex justify-content-end">
                                <img src="{{ url('/img/web-assets/azur-logo.webp') }}" class="medium-img opacity-1"
                                    alt="">
                            </div>
                        </div>
                    @endforeach

                </div>

                {{$posts->links()}}
            </div>


        </div>


    </section>

@endsection
