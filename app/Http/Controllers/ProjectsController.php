<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::where('active', true)->where('published_at', '<', Carbon::now())->get();

        if (!$projects) {
            redirect()->back()->with('error','Proiectul nu exista !');
        }


        return view('projects.index', ['projects' => $projects]);
    }

    public function show(Request $request)
    {

        $project = Project::where('active', true)
        ->where('published_at', '<', Carbon::now())
        ->where('slug', $request->slug)
        ->with('user')
        ->first();

        // dd($project, !$project, $project == null);

        if (!$project) {
            return redirect()->route('home')->with('error', 'Proiectul nu exista !');
        }

        return view('projects.show', [
            'project' => $project,
        ]);
    }

}
