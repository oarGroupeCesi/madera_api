<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use App\Models\Product;
use App\Models\Project;
use App\Models\Range;
use App\Http\Controllers\Api\RangeController;

class ProductController extends Controller
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
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'range_id' => 'required|integer',
            'project_id' => 'required|integer',
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors()->all(), 400);

        }

        try {

            $range = Range::findOrFail($request->input('range_id'));

        } catch (Exception $e) {
            
            return response()->json('The range does not exist.', 404);

        }

        try {

            $project = Project::findOrFail($request->input('project_id'));

        } catch (Exception $e) {
            
            return response()->json('The project does not exist.', 404);

        }

        $product = Product::create($request->all());
        
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Product does not exist.', 404);
        }

        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Product does not exist.', 404);
        }

        $validator = Validator::make($request->all(), [
            'range_id' => 'integer',
            'project_id' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }

        if ($request->input('range_id')) {
            try {

                $range = Range::findOrFail($request->input('range_id'));

            } catch (Exception $e) {
                
                return response()->json('The range does not exist.', 404);

            }
        }

        if ($request->input('project_id')) {
            try {

                $project = Project::findOrFail($request->input('project_id'));

            } catch (Exception $e) {
                
                return response()->json('The project does not exist.', 404);

            }
        }

        $product->update($request->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Product does not exist.', 404);
        }
        $product->delete();

        return 'Product has been delete';
    }
}
