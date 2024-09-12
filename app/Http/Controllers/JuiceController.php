<?php

namespace App\Http\Controllers;

use App\Models\Juice;
use App\Models\Maker; 
use Illuminate\Http\Request;

class JuiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $juice = new Juice;
        $juice = $juice->search($request->keyword, $request->makerList);
        $makers = Maker::all();

        return view('juices.index',[
            'juices' => $juice,
            'keyword' => $request->keyword,
            'makerList' => $request->maker,
        ],compact('makers'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::all();

        return view('juices.create', compact('makers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $juice = new Juice;
        $juice = $juice->registerJuice($request);


        return redirect()->route('juices.index');


        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juice  $juice
     * @return \Illuminate\Http\Response
     */
    public function show(Juice $juice)
    {
        return view('juices.show', ['juice' => $juice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juice  $juice
     * @return \Illuminate\Http\Response
     */
    public function edit(Juice $juice)
    {
        $makers = Maker::all();

        return view('juices.edit', compact('juice', 'makers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juice  $juice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juice $juice)
    {
        $juice = $juice->upJuice($request, $juice);
        return redirect()->route('juices.index');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juice  $juice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juice $juice)
    {
        $juice = $juice->destroyJuice($juice);

        return redirect('/juices');
    }
}


