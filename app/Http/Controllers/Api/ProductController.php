<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;


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
    public function store(ProductStoreRequest $request)
    {   
      

        try {

            $range = Range::findOrFail($request->input('range_id'));

        } catch (Exception $e) {
            
            return response()->json('La gamme n\'existe pas.', 404);

        }

        try {

            $project = Project::findOrFail($request->input('project_id'));

        } catch (Exception $e) {
            
            return response()->json('Le projet n\'existe pas.', 404);

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
            return response()->json('Le produit n\'existe pas.', 404);
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
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Le produit n\'existe pas.', 404);
        }

        

        if ($request->input('range_id')) {
            try {

                $range = Range::findOrFail($request->input('range_id'));

            } catch (Exception $e) {
                
                return response()->json('La gamme n\'existe pas.', 404);

            }
        }

        if ($request->input('project_id')) {
            try {

                $project = Project::findOrFail($request->input('project_id'));

            } catch (Exception $e) {
                
                return response()->json('Le projet n\'existe pas.', 404);

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
            return response()->json('Le produit n\'existe pas.', 404);
        }
        $product->delete();

        return 'Le produit a bien été supprimé.';
    }
}
