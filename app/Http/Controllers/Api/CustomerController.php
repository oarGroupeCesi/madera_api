<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Models\Customer;

class CustomerController extends Controller
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
        return Customer::all();
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
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|unique:customers',
            'adr_street' => 'required',
            'adr_zipcode' => 'required',
            'adr_city' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()->all()
            ];
        }

        $customer = Customer::create($request->all());
        
        return $customer;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return [
                'errors' => [
                    'User does not exist.',
                ],
            ];
        }
        return $customer;
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
        $customer = Customer::find($id);

        if (!$customer) {
            return [
                'errors' => [
                    'User does not exist.',
                ],
            ];
        }

        $validator = Validator::make($request->all(), [
            'email' => 'unique:customers',
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()->all()
            ];
        }

        $customer->update($request->all());
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return [
                'errors' => [
                    'User does not exist.',
                ],
            ];
        }
        $customer->delete();
        return 'User has been delete';
    }
}
