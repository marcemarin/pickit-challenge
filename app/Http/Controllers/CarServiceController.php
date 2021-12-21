<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Car;
use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CarServiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($carId)
    {
        try {
            $car = Car::findOrFail($carId);

            $services = $car->transactions->pluck('services')->collapse();
        
            return ServiceResource::collection($services);
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Car not found', 404);
        }
        
    }
}
