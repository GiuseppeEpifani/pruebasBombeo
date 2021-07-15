<?php

namespace App\Http\Controllers;

use App\Models\BombTest;
use Illuminate\Http\Request;

class GetBombTest extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data = BombTest::all();
        return response()->json($data);
    }
}
