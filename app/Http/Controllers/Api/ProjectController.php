<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Customer;
use App\Models\User;
use Validator;
use Exception;
use Auth;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;

class ProjectController extends Controller
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
        return Project::orderBy('created_at', 'desc')->limit(6)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $customer = Customer::findOrFail($request->input('customer_id'));

        } catch (Exception $e) {
            
            return response()->json('Le client n\'existe pas.', 404);

        }

        $project = Project::create([
            'name' => $request->get('name'),
            'status' => $request->get('status'),
            'quotation_price' => $request->get('quotation_price'),
            'quotation_date' => $request->get('quotation_date'),
            'customer_id' => $request->get('customer_id'),
            'user_id' => Auth::user()->id,
        ]);
        
        return $project;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json('Le projet n\'existe pas.', 404);
        }

        return $project;
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
        $project = Project::find($id);

        if (!$project) {
            return response()->json('Le projet n\'existe pas.', 404);
        }

        $validator = Validator::make($request->all(), [
          
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }

        if ($request->input('customer_id')) {
            try {

                $customer = Customer::findOrFail($request->input('customer_id'));

            } catch (Exception $e) {
                
                return response()->json('Le client n\'existe pas.', 404);

            }
        }

        $project->update($request->all());

        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json('Le projet n\'existe pas.', 404);
        }
        $project->delete();

        return 'Le projet a bien été supprimé.';
    }
}
