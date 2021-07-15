<?php

namespace App\Http\Controllers;

use App\Models\BombTest;
use Illuminate\Http\Request;

class FinallyBombTest extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $bomb_test = BombTest::findOrFail($request->id);
        $bomb_test->status = 2;
        $bomb_test->save();

        return response()->json(BombTest::all());
    }
}
