<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    const LIMIT= 50;

    public function limit(){
    	return Str::limit($this->description, About::LIMIT );
    }
}
