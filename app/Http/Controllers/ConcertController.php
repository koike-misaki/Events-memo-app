<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concert;

class ConcertController extends Controller
{
  public function top()
    {
        return view ('concert.top');
    }
  
    public function create()
    {
        return view ('concert.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, Concert::$rules);
        $concert = new Concert;

        $address = $request->address;
        $minAddress = substr($address, 0, 6)."...";

        $saveData = [
            'date'=>$request->date,
            'tourname'=>$request->tourname,
            'artist'=>$request->artist,
            'minaddress'=>$minAddress,
            'address'=>$address,
            'where'=>$request->where,
            'status'=>$request->status,
            'comment'=>$request->comment,
        ];
        
        $concert->fill($saveData)->save();
        // dd($concert);
        return redirect ('concert/create');
    }

    public function all(Request $request)
    {
        $cond_title = $request->cond_title;
        
        if ($cond_title != '') {

            $posts = Concert::where('date','like','%'. $cond_title.'%')
            ->orwhere('tourname','like','%'. $cond_title.'%')
            ->orWhere('artist', 'like','%'. $cond_title.'%')
            ->orWhere('address', 'like','%'. $cond_title.'%')
            ->orWhere('where', 'like','%'. $cond_title.'%')
            ->orderBy('date', 'asc')->simplePaginate(5);

            if (count($posts) == 0) {
              $caution = "※「".$cond_title."」を含むデータはありません。";
              $posts = Concert::orderBy('date', 'asc')->simplePaginate(5);
            }else{
              $caution = "";
            }

        } else {
            $posts = Concert::orderBy('date', 'asc')->simplePaginate(5);
            $caution = "";
        }

        if (count($posts) == 0) {
          $caution = "データが存在しません。";
        }

        // dd($posts);
        return view('concert.all', compact('posts','cond_title', 'caution')); 
    }

    public function detail(Request $request)
    {
      $concert = Concert::find($request->id);
      
      if (empty($concert)) {
        abort(404);    
      }
      
      return view('concert.detail', compact('concert'));
      
    }

    public function edit(Request $request)
    {
      $concert = Concert::find($request->id);
      
      if (empty($concert)) {
        abort(404);    
      }
      
      return view('concert.edit', compact('concert'));
    }
  
    public function update(Request $request)
    {
      $this->validate($request, Concert::$rules);
    
      $id = $request->id;
      $concert = Concert::find($id);

      $address = $request->address;
      $minAddress = substr($address, 0, 6)."...";

        $saveData = [
            'date'=>$request->date,
            'tourname'=>$request->tourname,
            'artist'=>$request->artist,
            'minaddress'=>$minAddress,
            'address'=>$address,
            'where'=>$request->where,
            'status'=>$request->status,
            'comment'=>$request->comment,
        ];
      
        $concert->fill($saveData)->save();
        
        $cond_title = $request->cond_title;
        $posts = Concert::orderBy('date', 'asc')->simplePaginate(5);
        $caution = "";
        
        return view('concert.all', compact('posts','cond_title','caution')); 

    }
    
    public function delete(Request $request)
    {
      $id = $request->id;
      $concert = Concert::find($request->id);

      $concert->delete();
      
      return redirect('concert/all');
    }  
}