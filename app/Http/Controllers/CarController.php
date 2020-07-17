<?php

namespace App\Http\Controllers;

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
        $cars = Car::all();
        return view('allcars', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addcar');
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
                $request->session()->flash('file_error', 'Avatar should be an image');
                return view('addcar');
            } 

            $path = $r->avatar->store('public/images');
            $car->avatar = $path;
        }
        else {
            $car->avatar='';
        }

        $car->make = $r->make;
        $car->model = $r->model;
        $car->produced_on = $r->produced_on;

        $car->save();

        session()->flash('success', 'car has been added');

        return $this->index();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view('editcar', ['car' => $car]);
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
            'make' => 'required',
            'model' => 'required',
            'produced_on' => 'required|date',
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

        $car->make = $r->make;
        $car->model = $r->model;
        $car->produced_on = $r->produced_on;
        $car->save();

        session()->flash('success', 'car has been updated');

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        Storage::delete($car->avatar);
        $car->delete();

        session()->flash('success', 'car has been deleted');

        return $this->index();
    }
}
