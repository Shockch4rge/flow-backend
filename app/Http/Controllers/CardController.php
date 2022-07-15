<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return Card::all();
    }

    public function store(Request $request)
    {
        // create a card with default values
        $card = new Card();
        $card->name = $request->name;
        $card->description = "";
        // folder index depends on the number of cards in the folder
        $card->folder_index = Card::where('folder_id', $request->folder_id)->count();
        $card->folder_id = $request->folder_id;
        $card->save();
    }

    public function show(string $id)
    {
        return Card::find($id);
    }

    public function update(Request $request, $id)
    {
        Card::where("id", $id)->update($request->all());
        return Card::find($id);
    }

    public function destroy($id)
    {
        Card::destroy($id);
        return response();
    }

    public function getFolderCards(string $id)
    {
        // order cards by folder index
        return Card::where("folder_id", $id)->orderBy("folder_index", "asc")->get();
    }

    public function move(Request $request, string $id)
    {
        $card = Card::find($id);
        $card->folder_id = $request->folderId;
        $card->save();
        return response();
    }
}
