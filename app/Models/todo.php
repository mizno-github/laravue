<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    public function getAllTodo()
    {
        return $this->all();
    }

    public function createAndGetAllTodo($request)
    {
        return $this->create($request->all());
    }

    public function updateAndGetTodo()
    {
    }

    public function oneDelete($id)
    {
        return $this->find($id)->delete();
    }
}
