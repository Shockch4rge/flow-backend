<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return Board::all();
    }

    public function store(Request $request)
    {
        return Board::create($request->all());
    }

    public function show(string $id)
    {
        return Board::find($id);
    }

    public function update(Request $request, string $id)
    {
        Board::where("id", $id)->update($request->all());
        return Board::find($id);
    }

    public function destroy(string $id)
    {
        Board::destroy($id);
        return response();
    }

    public function getUserBoards(string $id) {
        return Board::where("author_id", $id)->get();
    }
}
