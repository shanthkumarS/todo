<?php


namespace App\Http\Controllers;


use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index()
    {
        /**
         * @todo Use Pagination
         */
        $todoList = Todo::all()->where('user_id', Auth::user()->id);

        return view('dashboard', [
           'todoList' => $todoList,
        ]);
    }
}
