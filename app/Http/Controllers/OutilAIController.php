<?php

namespace App\Http\Controllers;

use App\Models\OutilAI;
use App\Models\Categorie;
use Illuminate\Http\Request;

class OutilAIController extends Controller
{
    /**
     * Display a listing of the resource (10 per page).
     */
    public function index()
    {
        $outils = OutilAI::with('categorie')->paginate(10);
        return view('outils.index', compact('outils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('outils.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate all inputs (all fields are required)
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'site_url' => 'required|url',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        // Save the new tool to database
        OutilAI::create($validated);

        // Redirect to index with success message
        return redirect()->route('outils.index')->with('success', 'Outil ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OutilAI $outil)
    {
        return view('outils.show', compact('outil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OutilAI $outil)
    {
        $categories = Categorie::all();
        return view('outils.edit', compact('outil', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OutilAI $outil)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'site_url' => 'required|url',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $outil->update($validated);

        return redirect()->route('outils.index')->with('success', 'Outil modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OutilAI $outil)
    {
        $outil->delete();
        return redirect()->route('outils.index')->with('success', 'Outil supprimé avec succès!');
    }
}
