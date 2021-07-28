<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class category extends Model implements Searchable
{
    protected $guarded = [];

    public function products(){
        return $this->hasMany('App\Gift');
    }

    public function getSearchResult(): SearchResult
    {
//        $url = route('admin.categories.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
//            $url
        );
    }
}
