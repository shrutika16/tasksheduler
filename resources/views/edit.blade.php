@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="outter-light-box">
            <div class="box-header">
                <a href="{{ route('task') }}" class="btn btn-sm btn-primary"> < Back</a>
            </div>
            <div class="box-content">
                <form method="POST" action="{{ route('task.update', $task->id)  }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $task->title }}">
                            @error('title')
                                <small id="titleHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputSlug">assigned by</label>
                            <input type="text" class="form-control" id="assignby" name="assignby" placeholder="Enter "  value="{{ $task->getAdmin->name }}" readonly>
                            @error('assignby')
                                <small id="slugHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputSlug">assigned to</label>
                            <select class="form-control" id="assign_to" name="assign_to">
                                @foreach($user as $user)
                                <option value="{{ $user->id }}"
                                @if($user->id == $task->assign_to)
                                    selected
                                @endif
                                >{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('assign_to')
                                <small id="slugHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $task->description }}</textarea>
                        @error('description')
                            <small id="descriptionHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Task Due date</label>
                        <input type="text" class="form-control" id="taskdue" name="taskdue" placeholder="Enter task Due"  value="{{ $task->task_due }}">
                        @error('taskdue')
                            <small id="slugHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-row">

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>

@endsection

@push('footer-scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endpush
