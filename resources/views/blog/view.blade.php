@extends('layouts.layout')
@section('title', $post->title)
@section('contents')
    <section class="hero">
        <div class="container bg-overlay text-white">
            {{-- title --}}
            <div class="mx-5">
                <h1>{{ $post->title }}</h1>
                <hr>
                <p class="altona-sans-12">{{ $post->created_at }}</p>

            </div>

            {{-- picture carousel --}}
            @if ($post->images()->exists())
                <div id="postImageIndicator" class="carousel slide mx-5" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @foreach ($post->images as $key => $p)
                            @if ($key == 0)
                                <button type="button" data-bs-target="#postImageIndicator"
                                    data-bs-slide-to="{{ $key }}" class="active" aria-current="true"
                                    aria-label="Slide {{ $key + 1 }}"></button>
                            @else
                                <button type="button" data-bs-target="#postImageIndicator"
                                    data-bs-slide-to="{{ $key }}" aria-label="Slide {{ $key + 1 }}"></button>
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel-inner">

                        @foreach ($post->images as $key => $p)
                            @if ($key == 0)
                                <div class="carousel-item active">
                                    <img src="/img/posts/{{ $p->image }}" class="d-block w-100"
                                        alt="{{ $p->image }}">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p>{{ $p->caption }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="/img/posts/{{ $p->image }}" class="d-block w-100"
                                        alt="{{ $p->image }}">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p>{{ $p->caption }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#postImageIndicator"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#postImageIndicator"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif

            {{-- body --}}
            <div class="mx-5 mt-5">
                <div class="altona-sans-10"><i>Author : Admin</i></div>
                <div class="altona-sans-12"><i>Last Updated : {{ $post->updated_at }}</i></div>
                <hr>
                <p class=" altona-sans-12 text-justify">
                    {{ $post->body }}

                </p>
                <hr>
            </div>



            {{-- footer  --}}
            <div class="mx-5 mt-3">
                <h2>Post Tags</h2>
                <div class="d-flex">
                    @foreach ($post->tags as $item)
                        <div class="pill-white mx-1 altona-sans-10">
                            {{$item->tag_label}}
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- navigation --}}
            <div class="columns-three">
                <div>
                    @if (isset($post->next))
a
                        <a href="/blogs/view/{{$post->next->id}}">Next</a>
                    @endif
                </div>
                <div></div>
                <div>
                    @if (isset($post->previous))
                    a
                        <a href="/blogs/view/{{$post->previous->id}}">previous</a>
                    @endif
                </div>
            </div>


        </div>
    </section>
@endsection
