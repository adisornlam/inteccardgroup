<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug','short_desc','long_desc','image', 'attachment','link','active','created_user_id'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'created_user_id','id');
    }
}
