<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    protected $fillable = ['set_id', 'path'];

    public function set()
    {
        return $this->belongsTo(PortfolioSet::class, 'set_id');
    }
}
