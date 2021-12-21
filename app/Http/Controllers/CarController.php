<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResourse;
use App\Models\Car;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarResourse::collection(Car::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->validated());

        return new CarResourse($car);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($carId)
    {
        try {
            $car = Car::findOrFail($carId);

            return new CarResourse($car);
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Car not found', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, $carId)
    {
        try {
            $car = Car::findOrFail($carId);

            $car->update($request->validated());

            return new CarResourse($car);
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Car not found', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($carId)
    {
        try {
            $car = Car::findOrFail($carId);

            $car->delete();

            return $this->returnSuccess();
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Car not found', 404);
        }
    }
}
