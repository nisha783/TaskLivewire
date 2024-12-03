<div class="container mt-3">
    <h1 class="text-center my-4 mt-4">ADD TASK TODO</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add a new task</h5>
                    @if ($errors->any())
                            <ul class="text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                    @endif

                    <div class="mb-3">
                        <input type="text" wire:model="task" class="form-control" placeholder="Enter your task">
                        <button wire:click="addTask" class="btn btn-primary mt-2 w-100">
                            Add Task
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Task List Table -->
            <div class="mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Task</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->task }}</td>
                                <td>
                                    <button wire:click="removeTask({{ $task->id }})" class="btn btn-danger btn-sm">
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
