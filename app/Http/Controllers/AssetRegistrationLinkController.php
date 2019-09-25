<?php

namespace App\Http\Controllers;

use App\AssetRegistrationLink;
use Illuminate\Http\Request;

use \Validator;

class AssetRegistrationLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['asset_registration_links'] = AssetRegistrationLink::with(['locations', 'type'])->get();
        
        return view('asset_registration_links.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('asset_registration_links.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
                'caption' => 'required',
                'type_id' =>'required|numeric',
                'description' => 'required',
                'expiry_date' => 'required|date',
                'location_ids'=>'required',
            ]);

        if ($validator->fails()) {
            // return $request;
            return redirect(route('asset_registration_links.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

       $data = $request->all();

       AssetRegistrationLink::create($data);

       return redirect(route('asset_registration_links.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssetRegistrationLink  $assetRegistrationLink
     * @return \Illuminate\Http\Response
     */
    public function show(AssetRegistrationLink $assetRegistrationLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssetRegistrationLink  $assetRegistrationLink
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetRegistrationLink $assetRegistrationLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssetRegistrationLink  $assetRegistrationLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetRegistrationLink $assetRegistrationLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssetRegistrationLink  $assetRegistrationLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetRegistrationLink $assetRegistrationLink)
    {
        //
    }
}
