<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

use Carbon\Carbon;



class ReportController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //  Potential user query to turn into data sets
        //  query1:
        //  tasks where tags.category = 'Projects'
        //  and tags.category != 'Projected' 
        //  this year 
        //  
        //  vs 
        //  
        //  query2:
        //  tasks where tags.category = 'Projects'
        //  and tags.category = 'Projected'
        //  this year
        //  
        //  sum costs always explicit? or is the user able to choose the column to sum?
        //  
        //  Break the query down between versus
   
        // query1
        $query1 = Task::whereHas('tags', function($query){
            $query->where('tag_id','=', '4');
        })
        ->whereDoesnthave('tags', function($query){
            $query->where('tag_id','=', '7');
        })
        ->selectRaw('month(created_at) as month, sum(actual_cost) as cost')
        ->groupBy('month')->pluck('cost', 'month');

        // vs

        // query2
        $query2 = Task::whereHas('tags', function($query){
            $query->where('tag_id','=', '4');
        })
        ->whereHas('tags', function($query){
            $query->where('tag_id','=', '7');
        })
        ->selectRaw('month(created_at) as month, sum(actual_cost) as cost')
        ->groupBy('month')->pluck('cost', 'month');

        // gather labels since they may not be aligned from multiple queries

        $labels[] = array_keys($query1->toArray());
        $labels[] = array_keys($query2->toArray());
        $labels =  array_unique ( array_flatten($labels) );

        // align key value pairs across datasets
        $queryData = [ $query1->toArray(),  $query2->toArray() ];
        $alignedDatasets = $this->alignDatasets($labels, $queryData);

        //build datasets object for chart.js
        $datasets[] = [
            'label' => 'real expenses',
            'backgroundColor' => "#BBDEFB",
            'data' =>  array_flatten($alignedDatasets[0] )
        ];

        $datasets[] = [
            'label' => 'projected expenses',
            'backgroundColor' => "#D1C4E9",
            'data' =>  array_flatten( $alignedDatasets[1] )
        ];

        $graphData = [
            'labels' => $labels,
            'data' => $datasets
        ];

        //final data array to be returned
        $data = [];

        $data = [

            'optionsData' => [
                'graphType' => 'bar'
            ],

            'graphData' => $graphData

        ];

        return response()->json(['data' => $data], 200); 
    }

    /**
     * In cases where the resulting datasets do not have the same number or aligning columns
     * we will align the datasets so that their columns are the same
     * @param  Array $labels the labels to be used as the x-axis on the graph
     * @param  Array $data   an array containing all datasets to align
     * @return Array $data   an array containing the mainipulated datasets (now aligned)
     */
    private function alignDatasets($labels, $data)
    {
        $datasetKeyCount = 0;

        foreach ($data as $dataKey => $dataset) 
        {
            $labelKeyCount = -1;
            $labelMax = count($labels);

            foreach ($labels as $labelKey => $label) 
            {
                $labelKeyCount++;

                if (array_key_exists($label, $dataset) )
                {
                    continue;
                }

                $data[$dataKey] = array_insert($data[$dataKey], 0, $labelKeyCount, $label, $labelMax);
            
            }   

            $datasetKeyCount++;     
        }

        
        return $data;
    }


}
