<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(Request $request){
        if($request->cari){
            $tes = 1;
            $games = Game::where("game_name", "LIKE", "%".$request->cari."%")->paginate(8)->withQueryString();
            return view('home',compact('games', 'tes'));
        }
        $tes = 0;
        $games = Game::inRandomOrder()->limit(8)->get();
        return view('home',compact('games', 'tes'));
    }
}
