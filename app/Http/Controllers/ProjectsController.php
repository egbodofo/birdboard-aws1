<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Http\Requests\UpdateProjectRequest;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->accessibleProjects();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {    
        $this->authorize('update', $project);
        $project__ = Project::find($project->id);
        // dd($project__, $project__->activity);
        // dd($project->activity);

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $project = auth()->user()->projects()->create($this->validateRequest());
        
        if ($tasks = request('tasks')) {
            $project->addTasks($tasks);
        }

        if (request()->wantsjson()) {
            return ['message' => $project->path()];
        }

        return redirect($project->path());
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)

    {

        $this->authorize('update', $project);

        $project->update($this->validateRequest());

        return redirect($project->path());

    }


    public function destroy(Project $project)
    
    {
        $this->authorize('manage', $project);

        $project->delete();
    
        return redirect('/projects');
    
    }


    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes|required', 
            'description' => 'sometimes|required',
            'notes' => 'nullable'
        ]);
    }
}
