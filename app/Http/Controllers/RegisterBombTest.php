<?php

namespace App\Http\Controllers;

use App\Models\BombTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterBombTest extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = [ 'status' => 1, 'hours_init' => $request->hours_init, 'well_depth' => $request->well_depth, 'water_well' => $request->water_well, 'client' => $request->client, 'ubication' => $request->ubication,
                'well_diameter' => $request->well_diameter, 'proof' => $request->proof, 'flow' => $request->flow, 'supervisor' => $request->supervisor, 'tube_aforo' => $request->tube_aforo, 'disk_aforo' => $request->disk_aforo,
                'meters_well' => $request->meters_well, 'latitude' => $request->latitude, 'logitude' => $request->logitude, 'pump_model' => $request->pump_model, 'suction_distance' => $request->suction_distance, 'user_id' => Auth::user()->id];
        
        $new_data = BombTest::create($data);
        return response()->json(BombTest::all());
    }
}
