<?php

namespace App\Http\Controllers;

use App\EquationSolver;
use App\Models\EquationSolution;
use Illuminate\Http\Request;

class EquationSolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solutions = EquationSolution::all();

        return view('home', ['solutions' => $solutions]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquationSolution  $equationSolution
     * @return \Illuminate\Http\Response
     */
    public function show(EquationSolution $equationSolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquationSolution  $equationSolution
     * @return \Illuminate\Http\Response
     */
    public function edit(EquationSolution $equationSolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquationSolution  $equationSolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquationSolution $equationSolution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquationSolution  $equationSolution
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquationSolution $equationSolution)
    {
        //
    }

    /**
     * Solve the equation with Mathematical Equations
     * 
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function solveEquation()
    {
        $solver = new EquationSolver();
        $responses = $solver->solve();

        // Save each correct solution in DB
        $solution = new EquationSolution;
        // If the solution is already exists, truncate the DB in case of avoiding duplicates data
        if($solution->count() > 0){
            $solution->truncate();
        }

        foreach ($responses['solutions'] as $response){

            $solution = new EquationSolution;
            $solution->hier = $response['HIER'];
            $solution->gibt = $response['GIBT'];
            $solution->es   = $response['ES'];
            $solution->neues= $response['NEUES'];
            $solution->save();

        }
        return redirect('/');
    }
}
