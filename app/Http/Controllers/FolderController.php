<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        return Folder::all();
    }

    public function store(Request $request)
    {
        return Folder::create($request->all());
    }

    public function show($id)
    {
        return Folder::find($id);
    }

    public function update(Request $request, $id)
    {
        Folder::where("id", $id)->update($request->all());
        return Folder::find($id);
    }

    public function destroy($id)
    {
        Folder::destroy($id);
        return response("Folder deleted");
    }

    public function getBoardFolders(string $id)
    {
        return Folder::where("board_id", $id)->get();
    }
}
