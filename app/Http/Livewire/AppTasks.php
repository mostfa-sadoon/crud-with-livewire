<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;
class AppTasks extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['taskAdded' => '$refresh'];

    public function render()
    {
        $totalTasks = auth()->user()->tasks()->count();
       $tasks = auth()->user()->tasks()->latest()->paginate(5);
        $completettasks=Task::select("*")->where("status",1)->get();
        $completettaskcount=count($completettasks);
         $completettasks;
        return view('livewire.app-tasks', [
            'totalTasks' => $totalTasks,
            'tasks'  => $tasks,
            'compeltetask'=>$completettaskcount,
        ]);
    }
    public function deletetask($id)
    {
       Task::find($id)->delete();
       session()->flash('message', 'task successfullu removed.');
    }
    public function statustask($id)
    {
         $task=Task::find($id);
         if($task->status==0)
         {
             $task->update([
                 "status"=>1
             ]);
         }else{
            $task->update([
                "status"=>0
            ]);
         }
    }
}
