<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	use CommonTrait;
	 protected $fillable = [
    	'file_type',
    	'file_name',
    	'file_path',
    	'fileable_type',
    	'fileable_id'
    ];
    
    public function fileable()
	    {
	        return $this->morphTo();
	    }
}
