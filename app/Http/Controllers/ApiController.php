<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
        //return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->user_id =  $request->input('user_id');
        $task->name =  $request->input('name');
        $task->save();

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task = DB::table('tasks')->where('id', $id)->get();

        return response()->json($task,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::table('tasks')->where('id',$id)->update(array(
            'name'=>$request->name,
        ));

        $datas = DB::table('tasks')->get();

        return response()->json($datas,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table('tasks')->delete($id);

       echo "Deleted Successfully !";
    }
}
