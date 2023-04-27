<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\CarouselItemsRequest;
use App\Models\CarouselItems;
use Illuminate\Http\Request;

class CarouselItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return CarouselItems::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselItemsRequest $request)
    {

        // Retrieve the validated input data...
        $validated = $request->validated();

        $carouselItem = CarouselItems::create($validated);

        return $carouselItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Retrieve a model by its primary key...
        return CarouselItems::findorFail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CarouselItemsRequest $request, string $id)
    {
        $validated = $request->validated();

        $carouselItem = CarouselItems::findorFail($id);
        $carouselItem->update($validated);

        return $carouselItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carouselItem = CarouselItems::findorFail($id);

        $carouselItem->delete();

        return $carouselItem;
    }
}
