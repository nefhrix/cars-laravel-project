<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Car;
use App\Models\Manufacturer;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('manufacturer')->get();
        return view('cars.index')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

        $manufacturers = Manufacturer::all();
        return view('cars.create')->with('manufacturers',$manufacturers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       

        try {
        $request->validate([
            
            'make' => 'required',
            'model'=> 'required',
            'year'=> 'required',
            'color'=> 'required',
            'emissions'=> 'required',
            'car_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'manufacturer_id' => 'required',
        ]);

        if ($request->hasFile('car_image')) {
            $image = $request->file('car_image');
            $imageName = time() . '.' . $image->extension();
 
            $image->storeAs('public/', $imageName);
            $car_image_name = 'storage/' . $imageName;
        }

        Car::create([
            'manufacturer_id' => $request->manufacturer_id,
            'make'=> $request->make,
            'model'=> $request->model,
            'year'=> $request->year,
            'color'=> $request->color,
            'emissions'=> $request->emissions,
            'car_image' => $request->car_image,
            'created at' => now(),
            'updated at' => now(),
        ]);

    } catch (\Exception $e) {
        dd($e->getMessage());
    }
        return to_route('cars.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     
        $car = Car::find($id);
        return view('cars.show')->with('cars',$car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       

        $manufacturers = Manufacturer::all();
        return view('edit')->with('cars',$id)->with('manufacturers',$manufacturers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$cars)
    {
        $request->validate([
            'manufacturer_id' => 'required',
            'make' => 'required',
            'model'=> 'required',
            'year'=> 'required',
            'color'=> 'required',
            'emissions'=> 'required',
            'car_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cars= Car::findOrFail($cars);
        if ($request->hasFile('car_image')) {
            $image = $request->file('car_image');
            $imageName = time() . '.' . $image->extension();
 
            $image->storeAs('public/', $imageName);
            $car_image_name = 'storage/' . $imageName;
        }

        $cars->update([
            'manufacturer_id' => $request->manufacturer_id,
            'make'=> $request->make,
            'model'=> $request->model,
            'year'=> $request->year,
            'color'=> $request->color,
            'emissions'=> $request->emissions,
            'car_image' => $car_image_name
        ]);
        return to_route('cars.show', $cars);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cars = Car::findOrFail($id);
        $cars->delete();
        return to_route('cars.index');
    }


    public function manufacturer()
    {
        return $this->belongsTo(Car::class);
    }
}
