<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Project;
use App\Status;
use App\Priority;
use Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('client')) {
            $projects = Project::where('active',1)->where('project_owner_id',$user->id)->get();

        } else {
            $projects = Project::where('active',1)->get();
        }


        return view('projects.index')->with('projects', $projects);


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
        return view('projects.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->project_name;
        $project->description = $request->description;
        $project->project_owner_id = $request->project_owner_id;
        $project->hourly_rate = $request->hourly_rate;
        $project->url = $request->url;
        $project->admin_id = $request->admin_id;
        $project->login_details = $request->login_details;
        $project->git_url = $request->git_url;
        $project->logo_url = $request->logo_url;
        $project->system_type = $request->system_type;
        $project->details_id = $request->details_id;
        $project->active = 1;
        $project->save();

        return redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Project::find($id);
        $data['owner'] = User::all();

        return view('projects.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Project::find($id);
        $data['statuses'] = Status::all();
        $data['priority'] = Priority::all();
        $data['users'] = User::all();

        return view('projects.edit', $data);
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
        Project::where('id',$id)->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "project_owner_id"=>$request->project_owner_id,
            "admin_id"=>$request->admin_id,
            "details_id"=>$request->details_id,
            "hourly_rate"=>$request->hourly_rate,
            "url"=>$request->url,
            "login_details"=>$request->login_details,
            "git_url"=>$request->git_url,
            "logo_url"=>$request->logo_url,
            "system_type"=>$request->system_type
        ]);

        return redirect(route('projects.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Project::find($id);
        $projects->active = 0;
        $projects->save();

        return redirect('projects');
    }
}
