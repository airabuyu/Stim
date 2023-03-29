<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GameController extends Controller
{
    //
    public function show(Game $game,Request $request){

    if(Auth::check()){


        $empty = Transaction::with('detaiTransaction')
        ->where('user_id', Auth::user()->id)
        ->whereRelation('detaiTransaction', 'game_id', $game->id)
        ->first();

        $inLibrary = 0;

        if($empty){
            $inLibrary = 1;
        }
    }
    else{
        $inLibrary = 0;
    }
        if($game->adult && !$request->session()->has('tes'))
            return view('/game/age',compact('game' , 'inLibrary'));
        else


        return view('/game/gameDetail',compact('game', 'inLibrary'));
    }

    public function check(Game $game,Request $request){

        $empty = Transaction::with('detaiTransaction')
        ->where('user_id', Auth::user()->id)
        ->whereRelation('detaiTransaction', 'game_id', $game->id)
        ->first();

        $inLibrary = 0;

        if($empty){
            $inLibrary = 1;
        }
        $age = date_diff(date_create($request->birthday), date_create('now'))->y;
        if($age>=17)
        return view('/game/gameDetail',compact('game', 'inLibrary'));
        else{
            return redirect('/home');
        }
    }

    public function addToCart(Game $game, Request $request){
        $request->session()->flash('tes');

        $carts = ShoppingCart::with('user','game')
        ->whereRelation('user', 'id', '=', Auth::user()->id)
        ->withSum('game', 'price')
        ->get();

        // dd($carts);
        // dd($game->id);

        foreach($carts as $cart){
            echo '<pre>' . var_dump($cart->game->id) . '</pre>';
            if($game->id == $cart->game->id){
                $request->session()->flash('errorCart', 'This game is already in your cart');

                return redirect()->to('/gameDetail/'.$game->id);
            }
        }
        // dd($carts->game->id);
        // dd("asd");

        ShoppingCart::create([
            'game_id' => $game->id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->to('/gameDetail/'.$game->id);
    }

    public function showCart(User $user){
        // $carts = DB::table('shoping_carts')
        // ->join('games', 'games.id', '=', 'shoping_carts.game_id')
        // ->select('*')
        // ->where('user_id', $user->id)
        // ->sum('games.price');
        // ->get();


        $carts = ShoppingCart::with('user','game')
        ->whereRelation('user', 'id', '=', $user->id)
        ->withSum('game', 'price')
        ->get();

        // dd($carts->sum('game_sum_price'));

        return view('/game/shoppingCart',compact('carts'));
    }

    public function destroy(ShoppingCart $shoppingCart){
        // dd($shoppingCart->id);
        ShoppingCart::destroy($shoppingCart->id);

        return Redirect::back();
    }
}
