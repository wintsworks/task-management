<section class="col-sm-6 d-flex justify-content-center flex-wrap">
    <form class="flex-grow-1 w-100" method="POST" action="/create-task">
        @csrf
        <label class="form-label" for="task_name">Task Name</label>
        <input class="form-control" type="text" name="task_name" id="task_name">
        
        <label class="form-label" for="priority">Priority</label>
        <input class="form-control" id="priority" type="text" name="priority" id="priority">


        <button class="btn btn-secondary mt-4 w-100">Create Task</button>
    </form>

    <button class="btn btn-primary mt-2 w-100" onclick="window.location.href='{{ url('/') }}'">Return</button>
</section>