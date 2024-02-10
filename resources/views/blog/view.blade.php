@extends('layouts.layout')
@section('title', $post->title)
@section('contents')

    <style>
        /* img {
                    max-width: 100%;
                    max-height: 100%;
                    min-width: 3em;
                } */

        table {
            color: white;
            border: 2px solid white;
            overflow-x: scroll;
        }

        figure {
            width: 20%;
            overflow-x: scroll;
        }
    </style>
    <section class="hero">
        <div class="container bg-overlay text-white shadow">
            {{-- title --}}
            <div class="mx-5">
                <h1>{{ $post->title }}</h1>
                <hr>
                <p class="altona-sans-12">{{ $post->created_at }}</p>

            </div>

            {{-- picture carousel --}}
            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="d-block w-75 mx-auto rounded shadow"
                alt="post-thumbnail">



            {{-- body --}}
            <div class="mx-5 mt-5">
                <div class="altona-sans-10"><i>Author : Admin</i></div>
                <div class="altona-sans-12"><i>Last Updated : {{ $post->updated_at }}</i></div>
                <hr>
                <p class=" altona-sans-12 text-justify">
                    {!! $post->body !!}
                </p>
            </div>



            {{-- footer --}}
            <div class="mx-5 mt-3">
                <h2>Post Tags</h2>
                <div class="d-flex">
                    @foreach ($post->tags as $item)
                        <div class="pill-white mx-1 altona-sans-10">
                            {{ $item->tag_label }}
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- navigation --}}
            <div class="columns-three mx-5 ">
                <div>
                    @if ($previous)
                        <a class=" altona-sans-12 text-white" href="{{ route('blogs.view', $previous) }}">Previous Post</a>
                    @endif
                </div>
                <div></div>
                <div class="ms-auto">
                    @if ($next)
                        <a class=" altona-sans-12 text-white" href="{{ route('blogs.view', $next) }}">Next Post</a>
                    @endif
                </div>
            </div>


        </div>
    </section>

    <script></script>
@endsection
