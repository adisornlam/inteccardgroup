<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
