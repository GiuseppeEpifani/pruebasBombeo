<?php

namespace App\Http\Controllers;

use App\Models\BombTest;
use Illuminate\Http\Request;

class DeleteBombTest extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $bombTest = BombTest::find($request->id);
        $bombTest->delete();
        return response()->json(BombTest::all());
    }
}