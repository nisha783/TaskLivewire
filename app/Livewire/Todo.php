<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class Todo extends Component
{
    public $task = '';
    public $taskId = null;

    protected $rules = [
        'task' => 'required|max:20',
    ];

    public function saveTask()
    {
        $this->validate();

        if ($this->taskId) {
            $task = Task::find($this->taskId);
            $task->task = $this->task;
            $task->save();
            session()->flash('message', 'Task updated successfully!');
        } else {
            Task::create(['task' => $this->task]);
            session()->flash('message', 'Task added successfully!');
        }

        $this->task = '';
        $this->taskId = null;
    }

    public function editTask($id)
    {
        $task = Task::find($id);
        $this->task = $task->task;
        $this->taskId = $id;
    }
    public function removeTask($id)
    {
        Task::findOrFail($id)->delete();
        session()->flash('message', 'Task Deleted successfully!');

    }

    public function render()
    {
        return view('livewire.todo', [
            'tasks' => Task::all()
        ]);
    }
}
