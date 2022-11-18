@extends('layouts.layout')
@section('title', 'Tier List')
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="bg-overlay rounded w-auto my-3">
                @livewire('tierlist')
            </div>
        </div>
    </section>
@endsection
