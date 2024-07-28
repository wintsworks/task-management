<li class="col-sm-12 d-flex task-component" data-id='{{ $id }}'>
    <h3>{{ $taskName ??= '' }}</h3>
    <p>Created At: <small>{{ $timeStamp ??= '' }}</small></p>
    <div>
        <button onclick='remove({{ $id }})' class="btn btn-danger">Remove</button>
        <button onclick='window.location.href="{{ url("/edit/$id") }}"' class="btn btn-primary">Edit</button>
    </div>
</li>

