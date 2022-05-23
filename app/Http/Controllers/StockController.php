<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function index(Stock $stock)
    {
        $stocks = Stock::with(['subject.classification'])->get();
        //dd($stocks->subject->classification->class_name);
        return view('stocks.index', ['stocks' => $stocks]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Stock $stock)
    {
        return view('stocks.show', ['stock' => $stock]);
    }

    public function edit(Stock $stock)
    {
        //
    }

    public function update(Request $request, Stock $stock)
    {
        //
    }

    public function destroy(Stock $stock)
    {
        //
    }
}
