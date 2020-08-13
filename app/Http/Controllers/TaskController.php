<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskModel;
use App\User;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tasks = TaskModel::get();
        return view('task', compact('tasks'));
    }

    public function edit($id){
        $user = User::where('is_admin',2)->get();
        $task= TaskModel::find($id);
        return view('edit', compact('task','user'));
    }

    public function update(Request $request, $id){
        $task= TaskModel::find($id);

        //$validated = $this->validateRequest($request);

        $taskupdate = $task->update([
            'title' => $request->input('title'),
            'assign_to' => $request->input('assign_to'),
            'description' => $request->input('description'),
            'task_due' => $request->input('taskdue'),
        ]);

        return redirect()
    		->route('task')
    		->withSuccess('New task updated');
    }

    public function destroy($id)
    {
        TaskModel::where('id',$id)->delete();

    	return back()->withSuccess('Task Account Deleted!');
    }

    protected function validateRequest($request)
    {
    	return request()->validate([
    		'title' => ['required'],
    		'assign_to' => ['required'],
    		'description' => ['required'],
            'taskdue' => ['required'],
    	]);
    }

}
