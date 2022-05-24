<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize(Auth::user());
        $stocks = Stock::with(['subject.classification'])->get();
        if ($request->title) {
        $stocks=Stock::whereHas('subject', function($query) use ($request){
           $query->where('title', 'LIKE', '%'. $request->title. '%');
       })->get();
        }

        if ($request->author) {
            $stocks=Stock::whereHas('subject', function($query) use ($request){
            $query->where('author', 'LIKE', '%'. $request->author. '%');
        })->get();
        }

        $stocks = Stock::with(['user'])->get();
        if ($request->name) {
            $stocks=Stock::whereHas('user', function($query) use ($request){
            $query->where('name', 'LIKE', '%'. $request->name. '%');
        })->get();
        }


        // $query = Stock::select('title', 'author', 'name');
        //     if ($request->name) {
        //         $query->where('name', 'LIKE', '%'. $request->name. '%');
        //     }
        
        // $stocks = $query->get();
            return view('admins/stocks/index', ['stocks' => $stocks,]);
    }

    public function show($id)
    {
        $stock=Stock::find($id);
            return view('admins/stocks/show', ['stock' => $stock]);
    }

    public function destroy($id)
    {
        $stock=Stock::find($id);
       $stock->delete();
            return redirect(route('stocks.index'));
    }
}
