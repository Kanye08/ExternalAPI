<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Books extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'bookauthors');
    }
}