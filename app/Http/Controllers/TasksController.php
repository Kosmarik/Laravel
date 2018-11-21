<?php

namespace App\Http\Controllers;


use App\Project;
use App\Status;
use App\Priority;
use App\Companies;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\TasksRequest;
use App\Tasks;
use App\User;
use App\TasksComments;
use Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use PDF;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $role = Role::findByName('client');
//        $role->givePermissionTo('create task');

//        //Find user by id..
//            $user = Auth::user();
//            echo $user->hasRole('admin');
//        //Set role to user..
//        $user->assignRole('client');




        $user = Auth::user();


        if($user->hasRole('client')){
            $tasks = Tasks::where('active',1)->where('author_id',$user->id)->get();
        }else{
            $tasks = Tasks::where('active',1)->get();
        }


        return view('tasks.index')->with('tasks', $tasks);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['projects'] = Project::all();
        $data['statuses'] = Status::all();
        $data['priority'] = Priority::all();
        $data['users'] = User::all();
        $data['companies'] = Companies::all();

        return view('tasks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//
//            'title' => 'required|unique:tasks,title',
//            'task_content' => 'required',
//            'estimated_time' => 'integer',
//            'start_date' => 'required|date',
//            'deadline_date' => 'required|after:date',
//            'fixed_rate' => 'integer',
//            'author' => 'integer',
//            'client' => 'integer',
//            'project' => 'integer',
//            'status' => 'integer',
//            'priority' => 'integer'
//        ]);


       $task = new Tasks();
       $task->title = $request->title;
       $task->content = $request->task_content;
       $task->status_id = $request->status;
       $task->priority_id = $request->priority;
       $task->author_id = $request->author;
       $task->client_id = $request->client;
       $task->project_id = $request->project;
       $task->estimated_time = $request->estimated_time;
       $task->spent_time = 1;
       $task->billing_time = 1;
       $task->start_date = $request->start_date;
       $task->deadline_date = $request->deadline_date;
       $task->fixed_rate = $request->fixed_rate;
       $task->active = 1;
       $task->save();
       return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = TasksComments::where('task_id', $id)->get();
        $comments = $comments->reverse();
        $task['comment'] = $comments;
        $task['task'] = Tasks::find($id);
        return view('tasks.single', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['projects'] = Project::all();
        $data['task'] = Tasks::find($id);
        $data['statuses'] = Status::all();
        $data['priority'] = Priority::all();
        $data['users'] = User::all();
        $data['companies'] = User::all();
        return view('tasks.edit', $data);
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
        Tasks::where('id',$id)->update([
            'title'=> $request->title,
            'content' => $request->task_content,
            'status_id' =>$request->status,
            'estimated_time' => $request->estimated_time,
            'spent_time' => $request->spent_time,
            'billing_time' => $request->billing_time,
            'start_date' => $request->start_date,
            'deadline_date' => $request->deadline_date,
            'fixed_rate' => $request->fixed_rate,
            'priority_id' => $request->priority,
            'project_id' => $request->project,
            'author_id' => $request->author,
            'client_id' =>$request->client

        ]);
        return redirect(route('tasks.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//      Tasks::destroy($id);
        $task = Tasks::find($id);
        $task->active=0;
        $task->save();
        return redirect('tasks');
    }

    public function pdf($id){
        $task = Tasks::find($id);

        return view('tasks.taskPDF')->with('task', $task);

    }


    public function pdfview(Request $request)
    {

        $task = Tasks::find($request->id);
        view()->share('task',$task);

        if($request->has('download')){
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('tasks.taskPDF');
            // download pdf
            return $pdf->download('pdfview.pdf');
        }
        return view('tasks.taskPDF');
    }
}
