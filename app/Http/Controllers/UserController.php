<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index()
    {
        
        return "test";
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.user.show', ['id' => $user->id]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
}

   