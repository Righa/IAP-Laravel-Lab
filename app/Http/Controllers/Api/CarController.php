<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        (!is_null($cars = Car::all()))? $response = [ 'success' => true, 'cars' => $cars ] :  $response = [ 'success' => false, 'message' => 'no car records!!!' ];

        return response($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'avatar' => 'required',
            'make' => 'required|unique:cars',
            'model' => 'required',
            'produced_on' => 'required|date',
        ]);

        $car = new Car;

        if($r->hasfile('avatar'))
        {
            $file_type = $r->avatar->extension();

            if ( $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif" ) {
                return response([
                    'success' => false,
                    'message' => 'avatar should be an image'
                ]);
            } 

            $path = $r->avatar->store('public/images');
            $car->avatar = $path;
        }

        $car->make = $r->make;
        $car->model = $r->model;
        $car->produced_on = $r->produced_on;

        $car->save();

        return response([
            'success' => true,
            'message' => 'car has been added!!',
            'view' => 'http://127.0.0.1:8000/api/cars'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        ($car = Car::find($id)) ? $notrash = true : $response = [ 'success' => false, 'message' => 'car does not exist!!' ];

        if ($notrash) {
            $car->reviews;
            $car->avatar = Storage::url($car->avatar);
            $response = [
                'success' => true,
                'message' => $car
            ];
        }

        return response($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $r->validate([
            'model' => 'unique:cars',
            'produced_on' => 'date',
        ]);

        $car = Car::find($id);

        if($r->hasfile('avatar'))
        {
            $file_type = $r->avatar->extension();

            if ( $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif" ) {
                $request->session()->flash('file_error', 'Avatar should be an image');
                return view('addcar');
            } 

            Storage::delete($car->avatar);

            $path = $r->avatar->store('public/images');
            $car->avatar = $path;
        }
        $trash = 0;

        ($r->make) ? $car->make = $r->make: $trash++;
        ($r->model) ? $car->model = $r->model: $trash++;
        ($r->produced_on) ? $car->produced_on = $r->produced_on: $trash++;

        $response = [
            'success' => true,
            'message' => 'car details have been changed!!'
        ];
        
        ($trash < 3) ? $car->save(): $response = [ 'success' => false, 'message' => 'provide at least one car details to be changed!!' ];

        return response($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if (is_null($car = Car::find($id))) {
            return response([
                'success' => false,
                'message' => 'car does not exist!!!'
            ]);
        }

        Storage::delete($car->avatar);
        $car->delete();

        return response([
            'success' => true,
            'message' => 'car has been deleted!!'
        ]);
    }
}
