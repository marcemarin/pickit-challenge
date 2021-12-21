<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Http\Resources\TransactionResourse;
use App\Models\Car;
use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CarTransactionController extends Controller
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

            return TransactionResourse::collection($car->transactions);
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Car not found', 404);
        }
    }
}
