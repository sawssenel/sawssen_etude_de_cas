<?php


namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::all();
        return response()->json(['data' => $salles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:40',
            'adresse' => 'required|string|max:50',
        ]);

        $salle = Salle::create($request->all());
        return response()->json(['message' => 'Salle ajoutée avec succès', 'data' => $salle], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salle = Salle::findOrFail($id);
        return response()->json(['data' => $salle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:40',
            'adresse' => 'required|string|max:50',
        ]);

        $salle = Salle::findOrFail($id);
        $salle->update($request->all());
        return response()->json(['message' => 'Salle mise à jour avec succès', 'data' => $salle]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salle = Salle::findOrFail($id);
        $salle->delete();
        return response()->json(['message' => 'Salle supprimée avec succès']);
    }
}
