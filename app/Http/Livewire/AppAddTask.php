<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AppAddTask extends Component
{
    public $title;
    protected $rules=[
       'title'=>'required|min:10'
    ];
    public function render()
    {
        return view('livewire.app-add-task');
    }
    
    public function updated($title)
    {
         $this->validateonly($title);
    }

    public function addTask()
    {
        $this->validate();

        auth()->user()->tasks()->create([
            'title' => $this->title,
            'status' => false,
        ]);

        $this->title = "";

        $this->emit('taskAdded');
        session()->flash('message', 'task successfullu added.');
    }
}
