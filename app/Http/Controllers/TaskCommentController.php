<?php

namespace App\Http\Controllers;

use App\TasksComments;
use Illuminate\Http\Request;

class TaskCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->task_id;
        $comment = new TasksComments();
        $comment->author_id = $request->author_id;
        $comment->task_id = $request->task_id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect("http://185.80.130.158/tasks/$id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TasksComments  $tasksComments
     * @return \Illuminate\Http\Response
     */
    public function show(TasksComments $tasksComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TasksComments  $tasksComments
     * @return \Illuminate\Http\Response
     */
    public function edit(TasksComments $tasksComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TasksComments  $tasksComments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TasksComments $tasksComments)
    {
        $id = $request->cm_id;
        $t = $request->ta_id;

        TasksComments::where('id', $id)->update([
           'comment' => $request->commentas
        ]);

        return redirect(route('tasks.show', $t));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TasksComments  $tasksComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->comment_id;
        $task = $request->task_id;

        TasksComments::find($id)->delete();

        return redirect("http://185.80.130.158/tasks/$task");
    }
}
