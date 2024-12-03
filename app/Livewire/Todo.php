<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class Todo extends Component
{
    public $task='';

    protected $rules = [
        'task' => 'required|max:20', 
    ];

    // Method to add a new task
    public function addTask()
    {
        $this->validate();

        Task::create(['task' => $this->task]);

        $this->task = '';
    }
    
    public function removeTask($id)
    {
        Task::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.todo', [
            'tasks' => Task::all()
        ]);
    }
}
