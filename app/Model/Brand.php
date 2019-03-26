<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    
    protected $fillable = ['name'];

    public function search($key_search, $totalPage){

        $keysearch = $key_search;
        return $this->where('name', 'LIKE', "%{$keysearch}%")->paginate($totalPage);
    }
    
}
