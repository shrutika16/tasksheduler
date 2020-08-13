@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="outter-light-box">

            <div class="box-header">
                 <nav class="nav">
                    <a class="nav-link">Total : {{ count($tasks->toarray() )}}</a>
                </nav>
            </div>
            <div class="box-content">
                <table id="tests_list" class="table">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Title</th>
                            <th>task due date</th>
                            <th>assign from</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td> {{ $task->id }}</td>
                            <td>{{ $task->title }} </td>
                            <td>{{ $task->task_due }} </td>
                            <td>{{ $task->getUser->name }} </td>
                            <td>
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a  onclick="return confirm('You really want to delete this?')" href="{{ route('task.delete', $task->id) }}" class="btn btn-sm btn-danger btn-delete">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

@push('footer-scripts')

@endpush
