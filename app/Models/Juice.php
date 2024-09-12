<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Juice extends Model
{

    protected $fillable = [
        'name',
        'maker',
        'kakaku',
        'zaiko',
        'comment',
        'img_path',
    ];

    public function maker()
    {
        return $this->belongsTo(Maker::class);
    }


   public function search($keyword, $makerList)
   {
    

    $juices = Juice::query();

        if (isset($keyword)) {
            $juices = $juices
                ->where('name', "LIKE", "%$keyword%")
                ->orWhere('comment',"LIKE", "%$keyword%");
            }
        if (isset($makerList)) {
            $juices = $juices
                ->where('maker', "$makerList");
            }
            $juices = $juices->paginate(5);

          return $juices;
   }


   public function registerJuice($request)
{
    try{
        DB::beginTransaction();
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
}
$juice->save();

DB::commit();
} catch (Throwble $e) {
    DB::rollBack();
}
}



    public function upJuice($request, $juice)
{

    try{
        DB::beginTransaction();
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

    }
    $juice->save();

DB::commit();
} catch (Throwble $e) {
    DB::rollBack();
}
}

public function destroyJuice($juice)
{
    try{
        DB::beginTransaction();

    $juice->delete();
    DB::commit();
} catch (Throwble $e) {
    DB::rollback();
}
}
}