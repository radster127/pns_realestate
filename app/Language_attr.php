<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language_attr extends Model
{
    protected $fillable = array("attribute", "section", "created_at_ip", "updated_at_ip");
    protected $table 	= "tbl_language_attr";

    public function translation(){

    	return $this->hasOne('App\Translation', 'attribute_id')->select('jap_translation');

    }
}
