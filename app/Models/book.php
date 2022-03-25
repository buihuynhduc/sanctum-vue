<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='books';
    protected $fillable = [
        'bookname',
        'id',
        'description',
        'category_id',
    ];
    public  function category()
    {
        return $this->belongsTo(category::class,'category_id','id');
    }
}
