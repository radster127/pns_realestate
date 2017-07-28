<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = array("attribute_id", "jap_translation", "eng_translation", "created_at_ip", "updated_at_ip");
    protected $table 	= "tbl_translation";
}
