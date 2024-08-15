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
        return view('projects.index', ['projects' => $projects]);
    }

    public function show()
    {
        return view('projects.show');
    }

}
