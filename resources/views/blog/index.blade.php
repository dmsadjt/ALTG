@extends('layouts.layout')
@section('title', 'Blog Posts')
@section('contents')
    <section class="hero">
        <div class="container text-white">
            <div class="bg-overlay">
                <h1 class="mx-2">Recent Posts</h1>
                <p class="altona-sans-12 mx-2">See the recent news!</p>

                <div class="post-row shadow">
                    @foreach ($posts as $p)
                        <div class="columns-two__5-1 pill-dark p-1 mx-2 mb-2">
                            <div>
                                <h3 class="mx-1">{{ $p->title }}</h3>
                                <p class="altona-sans-10 mx-1">Created at: {{ $p->created_at }}</p>
                                <p class="altona-sans-10 medium-text mx-1">
                                    {{ Str::limit(strip_tags($p->body), 100) }}
                                    <a class="altona-sans-10" href="/blogs/view/{{ $p->id }}">See more</a>
                                </p>
                                <div>
                                    <span class="altona-sans-10 mx-1">Tags :</span>
                                </div>
                                <div class="d-flex flex-wrap">
                                    @foreach ($p->tags as $t)
                                        <div class="bg-white text-black badge altona-sans-10 m-1">
                                            {{ $t->tag_label }}
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="d-flex justify-content-end ">
                                <img src="{{ url('/img/web-assets/azur-logo.webp') }}" class="medium-img opacity-1 r-hide"
                                    alt="">
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $posts->links() }}
            </div>


        </div>


    </section>

@endsection
