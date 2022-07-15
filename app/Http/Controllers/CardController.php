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
        return Card::create($request->all());
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
        return Card::where("folder_id", $id)->get();
    }

    public function move(Request $request, string $id)
    {
        $card = Card::find($id);
        $card->folder_id = $request->folderId;
        $card->save();
        return response();
    }
}
