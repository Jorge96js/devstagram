<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowerController extends Controller
{
    public function store(Request $request, User $user){
        $id = auth()->user()->id;
        $user->followers()->attach($id);
        return back();
    }

    public function destroy(User $user){
        $id = auth()->user()->id;
        $user->followers()->detach($id);

        return back();
    }
}
