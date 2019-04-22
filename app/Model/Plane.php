<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $fillable = ['brand_id','qty_passengers', 'class'];

    public function classes(){
        return [
                ''          =>  'Escolha a Opção',
                'economic'  =>  'Econômica',
                'luxury'    =>  'Luxo'
            ];
    }
    
    
    public function search($key_search, $totalPage){

        $keysearch = $key_search;
        return $this->where('class', 'LIKE', "%{$keysearch}%")->paginate($totalPage);
    }
}
