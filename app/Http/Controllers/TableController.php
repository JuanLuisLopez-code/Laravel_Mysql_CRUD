<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Http\Resources\TableResource;
use App\Http\Requests\StoreTableRequest;
use Illuminate\Http\Client\ResponseSequence;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $table = Table::all();
        // return response()->json($table);
        return TableResource::collection(Table::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTableRequest $request)
    {
        // error_log($request->data);
        // $table = new Table;
        // $table->name = $request->name;
        // $table->save();
        // return response()->json([
        //     "message" => "Name record created"
        // ], 201);
        return TableResource::make(Table::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TableResource::make(Table::where('id', $id)->firstOrFail());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTableRequest $request, $id)
    {
        // if (Table::where('id', $id)->exists()) {
        // $table = Table::find($id);
        // $table->name = $request->name;
        //     $table->save();
        //     return response()->json([
        //         "message" => "Name updated successfully"
        //     ], 200);
        // } else {
        // return response()->json([
        //     "message" => $table
        // ], 404);
        // }

        $update = Table::where('id', $id)->update($request->validated());
        if ($update == 1) {
            TableResource::make($update);
            return response()->json([
                "Message" => "Updated correctly"
            ]);
        } else {
            return response()->json([
                "Status" => "Error"
            ], 404);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Table::where('id', $id)->delete();

        if ($delete == 1) {
            return response()->json([
                "Message" => "Table deleted"
            ], 200);
        }else{
            return response()->json([
                "Message" => "Not found"
            ], 404);
        }

        // if (Table::where('id', $id)->exists()) {
        //     $table = Table::find($id);
        //     $table->delete();
        //     return response()->json([
        //         "Message" => "id destroyed"
        //     ], 200);
        // } else {
        //     return response()->json([
        //         "Message" => "This id don't exist"
        //     ]);
        // }

    }
}
