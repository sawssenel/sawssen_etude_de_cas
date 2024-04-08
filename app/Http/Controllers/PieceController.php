<?php

namespace App\Http\Controllers;

use App\Models\piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pieces = piece::all();
        return $pieces;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $piece = new piece([
            'titre' => $request->input('titre'),
            'flyer' => $request->input('flyer')
            ]);
            $piece->save();
            return response()->json($piece, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(piece $piece)
    {
        $piece = piece::find($id);
        return response()->json($piece);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, piece $piece)
    {
        $piece = piece::find($id);
        $piece->update($request->all());

        return response()->json($piece, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(piece $piece)
    {
        $piece = piece::find($id);
        $piece->delete();
        return response()->json('piece supprimée !');
    }
}
