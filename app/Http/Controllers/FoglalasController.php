<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class FoglalasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($datum)
    {
        $adatok = Appointment::where('day', "=", $datum)->get();
        return response()->json($adatok,200,options:JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "customer_name"=>"string|max:255|required",
            "day"=>"date|required",
            "time"=>"string|max:255|required"
        ],
        [
            "required"=>":attribute megadása kötelező",
            "string"=>":attribute legyél szöveg ",
            "max"=>"az adott változó ilyen hosszú legyen :max ",
            "date"=>"a napnak dátumnak kell lennie"
        ],
        [
            "customer_name"=>"Foglaló neve",
            "day"=>"nap",
            "time"=>"időpont"
        ]);

        Appointment::create([
            "customer_name"=>$request["customer_name"],
            "day"=>$request["day"],
            "time"=>$request["time"]
        ]);

        return response()->json("Rögzítve", 201, options:JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
