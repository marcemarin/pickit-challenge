<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\TransactionResourse;
use App\Models\Car;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TransactionResourse::collection(Transaction::simplePaginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        try {
            $validated = $request->validated();

            $owner_id = $request->owner_id ?? Car::findOrFail($validated['car_id'])->owner_id;

            $serviceIds = Service::all()->pluck('id')->toArray();

            $diffRequestServiceIds = array_diff($request->service_ids, $serviceIds);

            if (!empty($diffRequestServiceIds)) {
                return $this->returnError("Services", array_values($diffRequestServiceIds), 'Services not found', 406);
            }

            $transaction = Transaction::create($validated + ['owner_id' => $owner_id]);

            $transaction->services()->attach($request->service_ids);

            return $this->returnSuccess(['Total' => $transaction->total]);
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Car not found', 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return new TransactionResourse($transaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
