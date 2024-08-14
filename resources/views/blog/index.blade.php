@extends('layouts.layout')
@section('title', 'Blog Posts')
@section('contents')
    <section class="hero">
        <div class="container text-white">
            <div class="bg-overlay">
                <h1 class="mx-2">Recent Posts</h1>
                <p class="altona-sans-12 mx-2">See the recent news!</p>

                <div class="post-row gap-2 d-grid my-1 m-1">
                    @foreach ($posts as $p)
                        <div class="post bg-dark rounded shadow p-1 gap-2">
                            <div class="d-grid">
                                <img src="{{ asset('storage/' . $p->thumbnail) }}" style="object-fit:cover"
                                    class="d-block p-1 img-fluid m-auto rounded shadow" alt="post-img">
                            </div>
                            <div>
                                <div class="swiss-font-12 r-show">{{ $p->title }}</div>
                                <div class="swiss-font-18 r-hide">{{ $p->title }}</div>
                                <div class="altona-sans-10 medium-text">
                                    <div class="r-show">{{ date('d/m/Y', strtotime($p->created_at)) }} - {{ Str::limit(strip_tags($p->body), 60) }}</div>
                                    <div class="r-hide">{{ date('d/m/Y', strtotime($p->created_at)) }} - {{ Str::limit(strip_tags($p->body), 300) }}</div>
                                    <a class="altona-sans-10" href="/blogs/view/{{ $p->id }}">See more</a>
                                </div>
                                <div>
                                    <div>

                                        <div class="d-flex flex-wrap">
                                            <span class="altona-sans-10">Tags :</span>
                                            @foreach ($p->tags as $t)
                                                <span class="bg-white text-black badge altona-sans-10 m-1 post-tags">
                                                    {{ $t->tag_label }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $posts->links() }}
            </div>


        </div>


    </section>

@endsection
