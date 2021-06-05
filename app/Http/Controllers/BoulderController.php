<?php

namespace App\Http\Controllers;

use App\Models\Boulder;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BoulderRequest;
use App\Http\Resources\BoulderResource;
use App\Http\Resources\BoulderCollection;

class BoulderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BoulderCollection(Boulder::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BoulderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoulderRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $boulder = new Boulder();
            $boulder->size = $validated['size'];
            $boulder->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return new BoulderResource($boulder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BoulderResource(Boulder::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BoulderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoulderRequest $request, $id)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $boulder = Boulder::findOrFail($id);
            $boulder->size = $validated['size'];
            $boulder->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return new BoulderResource($boulder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $boulder = Boulder::findOrFail($id);
            $boulder->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return response()->json(['message' => 'The resource has been deleted'], Response::HTTP_OK);
    }
}
