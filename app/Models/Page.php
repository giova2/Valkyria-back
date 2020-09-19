<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    
	protected $table = "pages";

    protected $fillable = ['name'];


    public function contents()
    {

    	return $this->hasMany(Content::class);
    	
    }

    public function allowed_to_delete(){
        return $this->attributes['id'] !== 1;
    }


}
