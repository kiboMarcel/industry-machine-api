<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMachineRequest;
use App\Models\Machine;
use App\Http\Resources\MachineResource;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return Machine::all();
        return MachineResource::collection(Machine::with('category')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMachineRequest $request)
    {
        //
        return  new MachineResource(Machine::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $machine = Machine::find($id);

        if (!$machine) {
            abort(404, 'Machine not found');
        }

        return  new MachineResource($machine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMachineRequest $request, Machine $machine)
    {

        $machine->update($request->validated());

        return  new MachineResource($machine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        //
        $machine->delete();

        return  response()->noContent();
    }
}
