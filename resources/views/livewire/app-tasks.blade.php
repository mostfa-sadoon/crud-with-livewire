<div>
    <h3 class="text-center">My Task ({{$totalTasks}})</h3>
     <div ><h4 class="text-success">task completed ({{$compeltetask}})</h4></div>
    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
    <table class="table bg-white ">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Status</th>
                <th>oberations</th>
                <th>time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td scope="row">{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td><button class="{{$task->status == true ? 'btn-success': ''}}" wire:click="statustask({{ $task->id }})">{{ $task->status == true ? 'Completed' : 'Pending' }}</button></td>
                <td><button class="btn btn-danger" wire:click="deletetask({{ $task->id }})">
                     delete task
                 </button></td>
                 <td>{{$task->created_at}}</td>
                </tr>
               @endforeach
            
        </tbody>
    </table>
    {{ $tasks->links() }}
</div>
