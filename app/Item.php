<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    protected $fillable = ['title', 'description', 'specs', 'quantity', 'price', 'filename'];
    /**
     * @var mixed
     */
    private $id;

    public function getCoverUrlAttribute()
    {
        if($this->filename) {
            return Storage::url($this->filename);
        }
        return Storage::url('productCover/no-image.jpg');
    }

    public function categories()
    {
        return $this->belongsTo(Categorie::class,'category_id','id');

    }

    public function allAvailableItems()
    {
        return $this->query()->where('quantity','>','0')->get();
    }
    public function unallAvailableItems()
    {
        return Item::query()->where('quantity','=','0')->get();
    }
}
