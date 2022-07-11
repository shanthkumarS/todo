<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('create_todo', [
            'todo' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Todo $todo
     * @return RedirectResponse
     */
    public function store(
        Request $request,
        Todo $todo
    )
    {
        $user = Auth::user();

        $todo->subject = $request->subject;
        $todo->description = $request->description;
        $todo->status = $request->status;
        $todo->user_id = $user->id;
        $todo->save();

        return Redirect::to('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $user = Auth::user();
        $todo = Todo::find($id)->where('user_id', $user->id);

        return view('create_todo', [
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        return $this->store($request, $todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return Redirect::to('/dashboard');
    }
}
