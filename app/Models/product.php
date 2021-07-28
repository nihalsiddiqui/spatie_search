<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class product extends Model implements Searchable
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getSearchResult(): SearchResult
    {
//        $url = route('admin.gifts.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
//            $url
        );
    }
}
