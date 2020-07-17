<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = Car::all();

        foreach ($cars as $car) {
            $reviews[$car->id] = $car->reviews;
        }

        return view('home', ['cars' => $cars, 'reviews' => $reviews ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        $reviews = $car->reviews;
        return view('onecar', ['car' => $car, 'reviews' => $reviews]);
    }
}
