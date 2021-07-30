<?php

namespace App\Http\Controllers;

use App\Models\FieldBombTest;
use Illuminate\Http\Request;

class GetFieldBombTest extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response()->json(FieldBombTest::all());
    }
}
