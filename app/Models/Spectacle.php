<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spectacle extends Model
{
    protected $fillable = ['piece_id', 'salle_id', 'date_spectacle'];

    public function piece()
    {
        return $this->belongsTo(Piece::class);
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
}
