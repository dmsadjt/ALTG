@extends('layouts.admin')
@section('title', 'Edit Boss')
@section('contents')
    @livewire('edit-boss', ['boss' => $siren])
@endsection
