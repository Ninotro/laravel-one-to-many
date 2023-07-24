<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type; // Assicurati di avere importato il modello Type

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        $types = Type::all();
        return view('create', compact('types'));
    }

    public function store(Request $request)
    {
        // Validazione dei dati del form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
        ]);

        // Creazione di un nuovo progetto utilizzando i dati validati
        $project = Project::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'type_id' => $validatedData['type_id'],
        ]);

        // Reindirizzamento alla pagina di dettaglio del progetto creato
        return redirect()->route('project.show', ['id' => $project->id]);
    }
}