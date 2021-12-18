<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'titleAr', 'description', 'descriptionAr', 'time',
    ];

    // protected $guarded = [];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //protected $perPage = 15;


    public function queue()
    {
        return $this->hasMany(queue::class, 'category_id',);
    }
}
