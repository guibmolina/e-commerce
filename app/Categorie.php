<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['description'];

    public function items()
    {
        return $this->hasMany(Item::class,'category_id','id');
    }

    public function getallAvailableItems()
    {
        return $this->items()->where('quantity','>','0')->get();
    }
}

