<?php

namespace App\Http\Controllers;

use App\Models\FieldBombTest;
use Illuminate\Http\Request;

class RegisterFieldBombTest extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = ['hours' => '7:00', 'minute' => 7, 'accumulated' => $request->accumulated, 'instant_measurement' => $request->instant_measurement, 'water_column' => 0, 'pressure_psi' => $request->pressure_psi,
        'measured_from_edge' => 0, 'temperature' => $request->temperature, 'ph' => $request->ph, 'conduct' => $request->conduct, 'ppm' => $request->ppm, 'tds' => $request->tds, 'turbidity' => $request->turbidity, 'observation' => $request->observation, 'bomb_test_id' => $request->bomb_test_id];

        $new_data = FieldBombTest::create($data);
        return response()->json($new_data);
    }
}
