<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'PublicationDate',
        'Stock',
        'Author',
        'Category_Id',
        'Image'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'Category_Id');
    }
}
