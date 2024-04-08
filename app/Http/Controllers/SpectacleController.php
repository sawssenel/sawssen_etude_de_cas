<?php

namespace App\Http\Controllers;

use App\Models\Spectacle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpectacleController extends Controller
{
    public function index()
    {
        $spectacles = Spectacle::all();
        return response()->json(['spectacles' => $spectacles], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'piece_id' => 'required|exists:pieces,id',
            'salle_id' => 'required|exists:salles,id',
            'date_spectacle' => 'required|date',
        ]);

        $spectacle = Spectacle::create($validatedData);

        return response()->json(['spectacle' => $spectacle], 201);
    }

    public function show($id)
    {
        $spectacle = Spectacle::findOrFail($id);
        return response()->json(['spectacle' => $spectacle], 200);
    }

    public function update(Request $request, $id)
    {
        $spectacle = Spectacle::findOrFail($id);

        $validatedData = $request->validate([
            'piece_id' => 'required|exists:pieces,id',
            'salle_id' => 'required|exists:salles,id',
            'date_spectacle' => 'required|date',
        ]);

        $spectacle->update($validatedData);

        return response()->json(['spectacle' => $spectacle], 200);
    }

    public function destroy($id)
    {
        $spectacle = Spectacle::findOrFail($id);
        $spectacle->delete();

        return response()->json(null, 204);
    }
}
