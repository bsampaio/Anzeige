<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Incoming;

class IncomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $incomings = Incoming::all();
        return view('incoming.list', compact('incomings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $metaTypes = \App\MetaType::where('type', 'Incoming')->get();
        return view('incoming.new', compact('metaTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $incoming = Incoming::create($request->all());
        return redirect()->route('incoming.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $incoming = Incoming::findOrFail($id);
        $metaTypes = \App\MetaType::where('type', 'Incoming')->get();
        return view('incoming.view', compact(['incoming', 'metaTypes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return Incoming::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return Incoming::updateOrCreate($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Incoming::destroy($id);
        return redirect()->route('incoming.index');
    }
}
