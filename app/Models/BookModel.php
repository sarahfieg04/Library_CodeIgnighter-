<?php

namespace App\Models; 
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'genre', 'publication_year', 'cover_image']; 

    protected $useTimestamps = false;
}