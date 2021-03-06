<?php

namespace App\Http\Controllers\Api\v1a;

use App\Http\Controllers\Controller;
use App\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $parameters = Parameter::all();

            if (!$parameters->isEmpty()) {
                return response()->json([
                    'parameters'  => $parameters,
                ], 200);
            } else {
                return response()->json([
                    'error' => "No business parameters found",
                ], 404);
            }
        } catch (Exception $ex) {
            return response()->json([
                'error' => "Can't list business parameters",
            ], 500);
        }
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
            $parameters = Parameter::create($request->all());

            return response()->json([
                'error' => false,
                'parameter'  => $parameters,
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'error' => "Can't create this business parameters",
            ], 500);
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($parameterId)
    {
        try {
            $parameter = Parameter::find($parameterId);
            if (empty($parameter)) {
                return response()->json([
                    'error' => "business parameters " . $parameterId . " not found",
                ], 404);
            }
            return response()->json([
                'parameter'  => $parameter,
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'error' => "Can not see this business parameters",
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $parameterId)
    {
        try {
            $parameter = Parameter::find($parameterId);
            if (empty($parameter)) {
                return response()->json([
                    'error' => "business parameter" . $parameterId . " not found",
                ], 404);
            }
            $parameter->title = $request->input('title');
            $parameter->description = $request->input('description');
            
       
            if ($parameter->save()) {
                return response()->json([
                    '$parameter'  => $parameter,
                ], 200);
            } else {
                return response()->json([
                    'error' => "Database error : can't update business parameter " . $parameterId,
                ], 500);
            }
        } catch (Exception $ex) {
            return response()->json([
                'error' => "Can't update this business parameter",
            ], 500);
        }
    }



}
