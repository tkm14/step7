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
        $makerList = $request->input('makerList');
        $juices = Juice::query();

        if (isset($request->keyword)) {
            $juices = $juices
                ->where('name', "LIKE", "%$request->keyword%")
                ->orWhere('comment',"LIKE", "%$request->keyword%");
            }
        if (isset($request->makerList)) {
            $juices = $juices
                ->where('maker', "$makerList");
            }
    
        $juices = $juices->paginate(5);
        $makers = Maker::all();
        

        return view('juices.index', [
            'juices' => $juices,
            'keyword' => $request->keyword,
            'makerList' => $request->$makerList,
        ],
    compact('makers'));
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
        $request->validate([
            'name' => 'required',
            'maker' => 'required',
            'kakaku' => 'required',
            'zaiko' => 'required',
            'commment' => 'nullable',
            'img_path' => 'nullable|image|max:2048',
        ]);

        $juice = new Juice;
        $juice->name = $request->input(['name']);
        $juice->maker = $request->input(['maker']);
        $juice->kakaku = $request->input(['kakaku']);
        $juice->zaiko = $request->input(['zaiko']);
        $juice->comment = $request->input(['comment']);


        if($request->hasFile('img_path')){
            $filename = $request->img_path->getClientOriginalName();
            $filePath = $request->img_path->storeAs('juices', $filename, 'public');
            $juice->img_path = '/storage/' . $filePath;
        };

        $juice->save();

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
        $request->validate([
            'name' => 'required',
            'maker' => 'required',
            'kakaku' => 'required',
            'zaiko' => 'required',
            'comment' => 'nullable',
            'img_path' => 'nullable|image|max:2048',

        ]);


        $juice->name = $request->input(['name']);
        $juice->maker = $request->input(['maker']);
        $juice->kakaku = $request->input(['kakaku']);
        $juice->zaiko = $request->input(['zaiko']);
        $juice->comment = $request->input(['comment']);
        


        if($request->hasFile('img_path')){
            $filename = $request->img_path->getClientOriginalName();
            $filePath = $request->img_path->storeAs('juices', $filename, 'public');
            $juice->img_path = '/storage/' . $filePath;

        $juice->save();

        return redirect()->route('juices.index')
        ->with('success', 'Juice updated successfully');
        
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juice  $juice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juice $juice)
    {
        $juice->delete();

        return redirect('/juices');
    }
}


