<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioSet extends Model
{
    protected $fillable = ['title', 'slug', 'preview_image', 'access_code'];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class, 'set_id');
    }

    public function userHasAccess()
    {
        return session()->get('portfolio_access_'.$this->id) === $this->access_code;
    }
}
