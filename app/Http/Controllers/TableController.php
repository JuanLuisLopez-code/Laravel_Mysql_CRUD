<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\User;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Table::all();
        return response()->json($table);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $table = new Table;
        $table->name = $request->name;
        $table->save();
        return response()->json([
            "message" => "Name record created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        if (Table::where('id', $id)->exists()) {
            $table = Table::find($id);
            $table->name = $request->name;
            $table->save();
            return response()->json([
              "message" => "Name updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Name not found"
            ], 404);
          }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Table::where('id', $id)->exists()){
            $table = Table::find($id);
            $table->delete();
            return response()->json([
                "Message" => "id destroyed"
            ], 200);
        }else{
            return response()->json([
                "Message" => "This id don't exist"
            ]);
        }
    }
}
