<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class case_input extends Model
{
    //
   protected  $guarded = ['id'];
   // protected $fillable = ['prov_id', 'amphur_id' , 'name' , 'sex' , 'detail' , 'problem_case' , 'sub_problem' , 'group_code'];

    public function Provinces(){

        return $this->hasOne('App\province','PROVINCE_CODE' , 'prov_id');

    }
    public function Amphurs(){

        return $this->hasOne('App\amphur','AMPHUR_CODE' , 'amphur_id');

    }

    public function GetProblems(){
        $case = "TEST";
        return $case;
    }

}
