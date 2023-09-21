<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Menu;
use App\Models\Mesa;
use App\Models\Reservacion;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::count();
        $categorias=Categoria::count();
        $reservaciones=Reservacion::count();
        $menus=Menu::count();
        $mesas=Mesa::count();
        $data=[
            'users' => $users, 'categorias' => $categorias, 'reservaciones' => $reservaciones, 'menus' => $menus, 'mesas' => $mesas
        ];
        return view('home', $data, compact('users', 'categorias', 'reservaciones', 'menus', 'mesas'));
        // return view('home');
    }
}
