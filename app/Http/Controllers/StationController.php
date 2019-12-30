<?php

namespace App\Http\Controllers;

use App\Station;
use App\Students;
use Illuminate\Http\Request;

class StationController extends Controller
{
    //


    public function index()
    {
        $stations = Station::all();
        return view("admin.stations.index", compact("stations"));
    }



    public function create()
    {
        return view("admin.stations.create");
    }


    public function store(Request $request)
    {
        Station::create($request->all());
        $request->session()->flash('created', "Station created suucessfully");
        return redirect("/stations");
    }

    public function edit($id)
    {
        //

        $station = Station::findOrFail($id);
        return view('admin.stations.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $station = Station::findOrFail($id);
        $station->update($request->all());
        $request->session()->flash('updated', "Updated Successfully");
        return redirect('/stations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Station::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted Successfully');
        return redirect()->back();
    }


    public function search()
    {
        $stations = Station::pluck('name', 'id');
        return view('admin.search.index', compact('stations'));
    }

    public function searchNow()
    {
        if (isset($_GET['station_id'])) {
            $id = $_GET['station_id'];
            $sectionData['data'] = $students = Students::orderBy('name')->where('station', $id)->get();

            echo json_encode($sectionData);
            exit;
        }
    }
}
