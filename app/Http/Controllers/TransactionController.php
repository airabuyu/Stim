<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\DetailTransaction;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //

    public function history(){
        $histories = Transaction::with('user','detaiTransaction.game')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        return view('transaction/transactionHistory',compact('histories'));
    }

    public function create(){
        $carts = ShoppingCart::with('user','game')
        ->whereRelation('user', 'id', '=', Auth::user()->id)
        ->withSum('game', 'price')
        ->get();

        $total = $carts->sum('game_sum_price');


        return view('transaction/transactionInformation',compact('total'));
    }

    public function store(Request $request){
        // $total = $request->total;
        // dd($request->all());


        // compact('total');

        $request->validate([
            'cardName' => 'required|min:6',
            'cardNumber' => '',
            'expiredDate' => 'required|integer|between:1,12',
            'year' => 'required|integer|between:2021,2050',
            'cvc' => 'required|min:3|max:4',
            'country' => '',
            'zip' => 'required|integer',
        ],
        [
            'cardName.required' => 'Cardname must be filled',
            'cardName.min' => 'Cardname length must be at least 6 characters',
            'expiredDate.required' => 'Month must be filled',
            'expiredDate.between' => 'Month must between 1 and 12',
            'year.required' => 'Year must be filled',
            'yeat.between' => 'Year must between 2021 and 2025',
            'cvc.required' => 'CVC/CVV must be filled',
            'cvc.min' => 'Card CVV must between 100 and 9999',
            'cvc.max' => 'Card CVV must between 100 and 9999',
            'zip.required' => 'ZIP must be filled',
        ]

        );

        Card::create([
            'name' => $request->cardName,
            'number' => '',
            'expired_month' => $request->expiredDate,
            'expired_year' => $request->year,
            'cvc_cvv' => $request->cvc,
            'country' => '',
            'zip' => $request->zip,
        ]);

        // dd("asd");

        // return redirect('/home');
        return redirect('/transactionReceipt');
    }

    public function receipt(){
        $carts = ShoppingCart::with('user','game')
        ->whereRelation('user', 'id', '=', Auth::user()->id)
        ->withSum('game', 'price')
        ->get();

        // dd($carts);
        Transaction::create([
            'user_id' => Auth::user()->id,
        ]);

        $lastId = DB::table('transactions')
        ->select('*')
        ->orderBy('id', 'desc')
        ->first();

        $count = 0;

        foreach($carts as $cart){
            $count++;
            DetailTransaction::create([
                'transaction_id' => $lastId->id,
                'game_id' => $cart->game->id
            ]);

        }


        User::where('id', Auth::user()->id)->update([
            'level' => Auth::user()->level + $count
        ]);
        ShoppingCart::where('user_id', Auth::user()->id)->delete();


        // dd($carts);
        return view('/transaction/transactionReceipt', compact('carts'));
    }
}
