<?php

namespace App\Http\Controllers;

use App\MaintenanceActivities;
use Illuminate\Http\Request;

class MaintenanceActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('maintenance.index',['maintenance'=>MaintenanceActivities::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view ('maintenance.create', $data);
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
     * @param  \App\MaintenanceActivities  $maintenanceActivities
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceActivities $maintenanceActivities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaintenanceActivities  $maintenanceActivities
     * @return \Illuminate\Http\Response
     */
    public function edit(MaintenanceActivities $maintenanceActivities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaintenanceActivities  $maintenanceActivities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenanceActivities $maintenanceActivities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaintenanceActivities  $maintenanceActivities
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaintenanceActivities $maintenanceActivities)
    {
        //
    }
}
