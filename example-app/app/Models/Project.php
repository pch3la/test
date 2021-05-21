<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public static function find($input)
    {
    }

    protected $fillable = ['project_name','completed_at'];



    public function users(){
        return $this->belongsToMany(User::class);
    }
}
