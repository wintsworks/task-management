@extends('app')

@push('header')
    <h1>Create Task</h1>
@endpush

@section('content')
    <main class="row d-flex justify-content-center">
        <x-create-task />
    </main>
@endsection
