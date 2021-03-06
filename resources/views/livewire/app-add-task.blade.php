<div>

           <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
    <h3 class="text-center">Add New Task</h3>


    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" wire:model="title" class="form-control">
        <div class="aletr alert-danger"> @error('title') <span class="error">{{ $message }}</span> @enderror  </div>
    </div>

    <div class="form-group">
        <button wire:click.prevent="addTask" class="btn btn-primary btn-block">Add</button>
    </div>
    </form>
</div>