<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

use Carbon\Carbon;

use App\Interfaces\ChartBuilder;


class ReportController extends Controller
{

    public function __construct(ChartBuilder $chartBuilder)
    {
        // $this->middleware('auth');
        $this->chartBuilder = $chartBuilder;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userQuery = 'tasks where tag = Advertiser Matching or tag = Main Images and tag != Projected for this year vs tasks where tag = Advertiser Matching or tag = Main Images and tag != Projected for this year' ;

        $chartRequest = [
            'userQuery' => $userQuery
        ];

        dd( $this->chartBuilder->getChartData($chartRequest));

        return View('reports.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * return the results from a user specified query to be displayed in a graph
     * @param   $query the user query
     * @return object obejct data for the graph
     */
    public function reportQuery($userQuery)
    {

        return response()->json(['data' => $data], 200); 
    }




}
