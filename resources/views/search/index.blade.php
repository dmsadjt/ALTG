@extends('layouts.layout')
@section('title', 'Search page')
@section('contents')
    <section class="_100vh d-grid">
        <div class="container text-white mx-auto m-auto w-75 gap-1 d-grid p-5 shadow">
            <h1>Search Ships</h1>
            <form action="/search/results" class="d-grid">
                <input type="text" name="ship" id="ship" class="form-control my-3 shadow">
                <input type="submit" value="Search" class="pill altona-sans-12 w-25 text-center">
            </form>
        </div>


    </section>
@endsection
