<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(Request $request){

        if($request->cari){
            $tes = 1;
            $games = Game::where("game_name", "LIKE", "%".$request->cari."%")->where("category", "LIKE", "%".$request->check."%")
            ->paginate(8)->withQueryString();
            return view('game.manageGame',compact('games', 'tes'));
        }
        if($request->check){
            $tes = 1;
            $games = Game::where("category", "LIKE", "%".$request->check."%")->where("category", "LIKE", "%".$request->check."%")
            ->paginate(8)->withQueryString();
            return view('game.manageGame',compact('games', 'tes'));
        }
        $tes = 0;
        $games = Game::paginate(8);
        return view('game.manageGame', compact('games', 'tes'));
    }

    public function create(){

        return view('game.createGame');
    }

    public function store(Request $request){

        $ok = $request->validate([
            'game_name' => 'required|unique:games',
            'descreption' => 'required|max:500',
            'LDescreption' => 'required|max:2000',
            'category' => 'required',
            'developer' => 'required',
            'publisher' => 'required',
            'price' => 'required|integer|between:0,1000000',
            'cover' => 'required|mimes:jpg|file|max:10000',
            'trailer' => 'required|mimes:webm|file|max:100000',
        ],
        [
            'game_name.required' => "Game name must be filled",
            'game_name.unique' => "Game name must be unique",
            'descreption.required' => 'Game descreption must be filled',
            'descreption.max' => 'Game descreption length must be less then 500 characters',
            'LDescreption.required' => 'Game long descreption must be filled',
            'LDescreption.max' => 'Game long descreption length must be less then 2000 characters',
            'developer.required' => 'Game developer must be filled',
            'publisher.required' => 'Game publisher must be filled',
            'price.required' => 'Game price must be filled',
            'price.between' => 'Game price must be less then 1 million',
            'cover.required' => "cover must be filled",
            'cover.file' => "cover must be .jpg",
            'cover.max' => "cover size must be less than 100 KB",
            'trailer.required' => "trailer must be filled",
            'trailer.file' => "trailer must be .web,",
            'trailer.max' => "trailer size must be less than 100 MB",
        ]
    );

        $my_checkbox_value = $request['adult'];

        if($my_checkbox_value){
            $a = 1;
        }
        else{
            $a = 0;
        }

        if($request->cover){
            $fileName = date("Ymd_His")."game" . "."  . $request->cover->getClientOriginalExtension();

            $request->cover->move(public_path('games'), $fileName);
        }

        if($request->trailer){
            $fileName2 = date("Ymd_His") . "games" . "."  . $request->trailer->getClientOriginalExtension();

            $request->trailer->move(public_path('games'), $fileName2);
        }

        // dd($a);
        Game::create([
            'game_name' => $request->game_name,
            'description' => $request->descreption,
            'long_description' =>  $request->LDescreption,
            'category' => $request->category,
            'developer' => $request->developer,
            'publisher' => $request->publisher,
            'price' =>  $request->price,
            'cover' =>  $fileName,
            'trailer' =>  $fileName2,
            'adult' => $a
        ],
    );

        return redirect('/manageGame');
    }

    public function destroy(Game $game){
        Game::where("id", $game->id) -> delete();
        return back();
    }

    public function edit(Game $game){

        return view('game.updateGame', compact('game'));
    }

    public function update(Request $request, Game $game){
        // dd($game->id);

        // dd($request->all());

        $ok = $request->validate([
            'descreption' => 'required|max:500',
            'LDescreption' => 'required|max:2000',
            'category' => 'required',
            'price' => 'required|integer|between:0,1000000',
            'cover' => 'required|mimes:.jpg|file|max:10000',
            'trailer' => 'required|mimes:.webm|file|max:100000',
        ],
        [
            'descreption.required' => 'Game descreption must be filled',
            'descreption.max' => 'Game descreption length must be less then 500 characters',
            'LDescreption.required' => 'Game long descreption must be filled',
            'LDescreption.max' => 'Game long descreption length must be less then 2000 characters',
            'price.required' => 'Game price must be filled',
            'price.between' => 'Game price must be less then 1 million',
            'cover.required' => "cover must be filled",
            'cover.file' => "cover must be .jpg",
            'cover.max' => "cover size must be less than 100 KB",
            'trailer.required' => "trailer must be filled",
            'trailer.file' => "trailer must be .web,",
            'trailer.max' => "trailer size must be less than 100 MB",
        ]

        );


        if($request->cover){
            $fileName = date("Ymd_His")."game" . "."  . $request->cover->getClientOriginalExtension();

            $request->cover->move(public_path('games'), $fileName);
        }

        if($request->trailer){
            $fileName2 = date("Ymd_His") . "games" . "."  . $request->trailer->getClientOriginalExtension();

            $request->trailer->move(public_path('games'), $fileName2);
        }

        Game::where('id', $game->id)->update([
            'description' => $request->description,
            'long_description' =>  $request->LDescription,
            'category' =>  $request->category,
            'price' =>  $request->price,
            'cover' =>  $fileName,
            'trailer' =>  $fileName2,
        ]);

        return redirect('/manageGame');

    }
}
