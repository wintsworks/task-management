@extends('app')

@push('header')
    <h1>Edit Task</h1>
@endpush

@section('content')
    <main class="row d-flex justify-content-center">
        <x-edit-task :taskName="$task->task_name" :priority="$task->priority" :id="$task->id" />
    </main>
@endsection
