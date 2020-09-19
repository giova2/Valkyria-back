<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    
	protected $table = "contents";

    protected $fillable = ['page_id', 'name', 'text', 'src', 'type', 'visible'];


    public function page()
    {
    	return $this->belongsTo(Page::class);
    	
    }

    public function allowed_to_delete(){
        return !in_array($this->attributes['name'], ['title', 'body', 'foot']);
    }
    

}
