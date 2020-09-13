<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoSlide extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'link','photo','active','created_user_id'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'created_user_id','id');
    }
}
