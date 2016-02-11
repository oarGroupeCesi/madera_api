<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Validator;

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
        return Project::all();
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
            'status' => 'required|in:draft,accepted,pending,refused,command,billing',
            'quotation_price' => 'integer',
            'quotation_date' => 'date',
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()->all()
            ];
        }

        $project = Project::create($request->all());
        
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
            return [
                'errors' => [
                    'Project does not exist.',
                ],
            ];
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
            return [
                'errors' => [
                    'Project does not exist.',
                ],
            ];
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
            return [
                'errors' => [
                    'Project does not exist.',
                ],
            ];
        }
        $project->delete();
        return 'Project has been delete';
    }
}
