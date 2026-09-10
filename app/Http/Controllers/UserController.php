<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\View\View;

class UserController extends Controller implements HasMiddleware
{
    //mostra o perfil pra um usuario
    public function show(string $id): View
    {
        return view('user.profile',[
            'user' => User::findOrFail($id)
        ]);
    }
    public function profile():View{
        return view('user.profile',[
            'user' => auth()->user()
        ]);
    }
    
     public static function middleware():array
     {
        return [
            'auth',
            new Middleware('log', only: ['index']),
            new Middleware('subscribed',except:['store']),
        ];
    }

   
}
