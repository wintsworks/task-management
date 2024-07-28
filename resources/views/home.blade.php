@extends('app')

@push('header')
    <h1>Task Management</h1>
@endpush

@section('content')
    <main class="row d-flex justify-content-center">
        <section class="w-50 d-flex justify-content-center row">
            <button class="btn btn-primary w-100 mb-4" onclick="window.location.href='{{ url('/create') }}'">Create
                Task</button>

            @if (isset($tasks))
                @php
                    $tasksByPriority = $tasks->sortBy('priority');
                @endphp
                <ul id="sortable">
                    @foreach ($tasksByPriority as $task)
                        <x-task :taskName="$task->task_name" :priority="$task->priority" :timeStamp="$task->created_at" :id="$task->id" />
                    @endforeach
                </ul>
            @endif
        </section>
    </main>

    <script>
        try {
            $(document).ready(function() {
                $("#sortable").sortable({
                    placeholder: "highlighted",
                    update: function(event, ui) {
                        var tableOrder = $(this).sortable('toArray', {
                            attribute: 'data-id'
                        });
                        updateOrder(tableOrder);
                    }
                })
            });
            $("#sortable").disableSelection();

            function updateOrder(tableOrder) {
                $.ajax({
                    url: '/update-order',
                    method: 'POST',
                    data: {
                        order: tableOrder,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('Successfully updated table order');
                    },
                    error: function(xhr) {
                        console.log('Error updating table order');
                    }
                });
            }

            function remove(id) {
                $.ajax({
                    url: '/destroy/' + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    success: function(response) {
                        window.location.href= "/";
                    }
                });
            }

        } catch {}
    </script>
@endsection
