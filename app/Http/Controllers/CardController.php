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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
