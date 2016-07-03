<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Models\Module;
use App\Models\Modulenature;
use App\Models\Product;
use \Exception;

class ModuleController extends Controller
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
        return Module::all();
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
            'name'            => 'required|string',
            'height'          => 'integer',
            'width'           => 'required|integer',
            'quantity'        => 'required|integer',
            'modulenature_id' => 'required|integer',
            'product_id'      => 'required|integer',
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors()->all(), 400);

        }

        try {

            $modulenature = Modulenature::findOrFail($request->input('modulenature_id'));

        } catch (Exception $e) {

            return response()->json('La nature de module n\'existe pas.', 404);

        }

        try {

            $product = Product::findOrFail($request->input('product_id'));

        } catch (Exception $e) {

            return response()->json('Le produit n\'existe pas.', 404);

        }

        $module = Module::create($request->all());

        return $module;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::find($id);

        if (!$module) {
            return response()->json('Le module n\'existe pas.', 404);
        }

        return $module;
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
        $module = Module::find($id);

        if (!$module) {
            return response()->json('Le module n\'existe pas.', 404);
        }

        $validator = Validator::make($request->all(), [
            'name'            => 'string',
            'height'          => 'integer',
            'width'           => 'integer',
            'quantity'        => 'integer',
            'modulenature_id' => 'integer',
            'product_id'      => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }

        if ($request->input('modulenature_id')) {
            try {

                $modulenature = Modulenature::findOrFail($request->input('modulenature_id'));

            } catch (Exception $e) {

                return response()->json('La nature de module n\'existe pas.', 404);

            }
        }

        if ($request->input('product_id')) {
            try {

                $product = Product::findOrFail($request->input('product_id'));

            } catch (Exception $e) {

                return response()->json('Le produit n\'existe pas.', 404);

            }
        }

        $module->update($request->all());

        return $module;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);

        if (!$module) {
            return response()->json('Le module n\'existe pas.', 404);
        }
        $module->delete();

        return 'Le module a bien été supprimé.';
    }
}
