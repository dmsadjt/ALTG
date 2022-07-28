@extends('layouts.layout')
@section('title', 'Blog Posts')
@section('contents')
    <section class="hero">
        <div class="container text-white">
            <div class="bg-overlay">
                <h1>Recent Posts</h1>
                <p class="altona-sans-12">See the recent news!</p>

                <div class="post-row shadow">
                    @foreach ($posts as $p)
                        <div class="columns-two__5-1 pill-dark p-3 mb-2">
                            <div>
                                <h3>{{$p->title}}</h3>
                                <p class="altona-sans-10">{{$p->created_at}}</p>
                                <p class="altona-sans-12 medium-text">
                                    {{Str::limit($p->body, 100)}}
                                    <a class="altona-sans-12"
                                href="/blogs/view/{{$p->id}}">See more</a>
                                </p>

                                <div class="d-flex">
                                    <div>
                                        Tags :
                                    </div>
                                    @foreach ($p->tags as $t)
                                    <div class="pill-white mx-1 altona-sans-10">
                                        {{$t->tag_label}}
                                    </div>
                                @endforeach
                                </div>

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
