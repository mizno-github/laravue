<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretodoRequest;
use App\Http\Requests\UpdatetodoRequest;
use App\Models\todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(todo $todo)
    {
        return $this->todo = $todo;
    }

    public function index()
    {
        return $this->todo->getAllTodo();
    }

    public function create(StoretodoRequest $request)
    {
        return $this->todo->createAndGetAllTodo($request);
    }

    public function update(Request $request)
    {
        return $this->todo->updateAndGetTodo($request);
    }

    public function oneDelete($id)
    {
        $this->todo->oneDelete($id);
        return 'ok';
    }
}
