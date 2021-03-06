<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use App\Models\Classification;

class StockController extends Controller
{
   
   public function index(Request $request,Classification $class)
    {
        $this->authorize(Auth::user());
        $query = Stock::with(['subject.classification']);
        if ($request->title) {
            $query->whereHas('subject', function($query) use ($request){
           $query->where('title', 'LIKE', '%'. $request->title. '%');
        });
        }
        if ($request->author) {
            $query->whereHas('subject', function($query) use ($request){
            $query->where('author', 'LIKE', '%'. $request->author. '%');
        });
        }
        $stocks = Stock::with(['user'])->get();
        if ($request->name) {
            $query->whereHas('user', function($query) use ($request){
            $query->where('name', 'LIKE', '%'. $request->name. '%');
        });
        }

        // $query = Stock::select('title', 'author', 'name');
        //     if ($request->name) {
        //         $query->where('name', 'LIKE', '%'. $request->name. '%');
        //     }
        if($request->class) {
            if($request != "0") {
                $query->whereHas('subject', function($query) use ($request) {
                    $query->where('class_id', '=', $request->class);
                });
            }
        }
        //状態で検索
        if($request->status) {
            $query->whereHas('subject', function($query) use ($request) {
                $query->where('status', '=', $request->status);
            });
        }
        if($request->stock == 1) {
            $query->where('stock', '=', 1);
        }

        $stocks = $query->paginate(10);
            return view('admins/stocks/index', ['stocks' => $stocks, 'classes' => $class->get()]);
    }

    public function show($id)
    {
        $this->authorize(Auth::user());
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
