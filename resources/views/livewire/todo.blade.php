<div class="container mt-3">
    <h1 class="text-center my-4 mt-4">ADD TASK TODO</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add or Update a Task</h5>
                    @if (session()->has('message'))
                    <ul class="text-success">
                        <li>   {{ session('message') }}</li>
                    </ul>
                         
                    @endif
                    @if ($errors->any())
                        <ul class="text-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="mb-3">
                        <input type="text" wire:model="task" class="form-control" placeholder="Enter your task">
                        <button wire:click="saveTask" class="btn btn-primary mt-2 w-100">
                            {{ $taskId ? 'Update Task' : 'Add Task' }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Task</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->task }}</td>
                                <td>
                                    <button wire:click="editTask({{ $task->id }})" class="btn btn-warning btn-sm text-white">
                                        Edit
                                    </button>
                                    <button wire:click="removeTask({{ $task->id }})" class="btn btn-danger btn-sm ms-3">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
