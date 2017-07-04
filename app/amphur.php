<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class amphur extends Model
{
    //
    public function amphur_start($query){
        $query->where('PROVINCE_ID','=',10);
    }
}
