<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Range;
use Validator;
use App\Http\Requests\RangeStoreRequest;
use App\Http\Requests\RangeUpdateRequest;

class RangeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.jwt.once');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Range::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RangeStoreRequest $request)
    {
        $validator = Validator::make($request->all(), [
       
        ]);

       

        $range = Range::create($request->all());
        
        return $range;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $range = Range::find($id);

        if (!$range) {
            return response()->json('La gamme n\'existe pas.', 404);
        }
        return $range;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RangeUpdateRequest $request, $id)
    {
        $range = Range::find($id);

        if (!$range) {
            return response()->json('La gamme n\'existe pas.', 404);
        }

        $validator = Validator::make($request->all(), [
            'exterior_finish' => 'in:wood,roughcast',
            'insulating' => 'in:synthetic,natural,biological',
            'top' => 'in:roof tiles,slates,thatch',
            'configuration' => 'in:Without angle,With closing angle,With opening angle',
            'template' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }

        $range->update($request->all());
        return $range;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $range = Range::find($id);

        if (!$range) {
            return response()->json('La gamme n\'existe pas.', 404);
        }
        $range->delete();
        return 'La gamme a bien été supprimée.';
    }
}
