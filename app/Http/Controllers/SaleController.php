<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Subject;
use App\Models\Classification;
use App\Http\Requests\SubjectRequest;

class SaleController extends Controller
{
    private $formItems = ['isbn_code', 'title', 'author', 'class', 'status', 'price', 'remarks'];
    public function index(Stock $stock, Subject $subject, Classification $class, Request $request)
    {
        //query生成
        $query = Stock::with(['subject.classification']);
        //titleで検索
        if($request->title) {
            $query = Stock::whereHas('subject', function($query) use ($request) {
                $query->where('title', 'like', '%'.$request->title.'%');
            });
        }
        //authorで検索
        if($request->author) {
            $query = Stock::whereHas('subject', function($query) use ($request) {
                $query->where('author', 'like', '%'.$request->author.'%');
            });
        }
        //分類で検索
        if($request->class) {
            if($request !== "0") {
                $query = Stock::whereHas('subject', function($query) use ($request) {
                    $query->where('class_id', '=', $request->class);
                });
            }
        }
        //状態で検索
        if($request->status) {
            $query = Stock::whereHas('subject', function($query) use ($request) {
                $query->where('status', '=', $request->status);
            });
        }
        //在庫の有無の絞り込み
        if($request->stock == 1) {
            $query->where('stock', '=', 1);
        }

        $stocks = $query->get();
        //dd($request->url());
        return view('sales.index', ['stocks' => $stocks, 'classes' => $class->get()]);
    }

    public function show(Stock $stock)
    {
        return view('sales.show', ['stock' => $stock]);
    }

    public function cart(Stock $stock)
    {
        return view('sales.cart', ['stock' => $stock]);
    }

    public function buy(Stock $stock)
    {
        $stock->stock = 0;
        $stock->save();
        return view('sales.finish');
    }

    public function create(Classification $class, Stock $stock, Request $request)
    {
        return view('sales.create', ['classes' => $class->get(), 'stock' => $stock]);
    }

    public function post(SubjectRequest $request)
    {
        $input = $request->only($this->formItems);
        $request->session()->put('form_input', $input);
        return redirect(route('sales.confirm'));
    }

    public function confirm(Request $request)
    {
        $input = $request->session()->get('form_input');
        $class = Classification::find($input['class'])->class_name;
        return view('sales.confirm', ['input' => $input, 'class' => $class]);
    }

    public function store(Request $request, Subject $subject, Stock $stock)
    {
        $input = $request->session()->get('form_input');
        if($request->has("back")) {
            return redirect(route('sales.create'))
                ->withInput($input);
        }
        $code = $input['isbn_code'];
        if(Subject::where('isbn_code', '=', $code)->exists()) {
            //isbnコードの教科書があるとき
            $id = Subject::where('isbn_code', '=', $code)->get('id')->toArray();
            $stock->user_id = Auth::id();
            $stock->subject_id = $id[0]['id'];
            $stock->status = $input['status'];
            $stock->price = $input['price'];
            $stock->stock = 1;
            $stock->remarks = $input['remarks'];
            $stock->save();
        } else {
            //isbnコードの教科書がないとき
            $subject->isbn_code = $code;
            $subject->title = $input['title'];
            $subject->author = $input['author'];
            $subject->class_id = $input['class'];
            $subject->save();

            $stock->user_id = Auth::id();
            $stock->subject_id = $subject->id;
            $stock->status = $input['status'];
            $stock->price = $input['price'];
            $stock->stock = 1;
            $stock->remarks = $input['remarks'];
            $stock->save();

            $request->session()->forget("form_input");
        }
        
        return redirect(route('sales.show', $stock->id));
    }

    public function edit(Stock $stock, Classification $class)
    {
        $this->authorize($stock);
        return view('sales.edit', ['stock' => $stock, 'classes' => $class->get()]);
    }

    public function editPost(Request $request, Stock $stock)
    {
        $this->authorize($stock);
        $input = $request->only($this->formItems);
        $request->session()->put('form_input', $input);
        return redirect(route('sales.editConfirm', $stock->id));
    }

    public function editConfirm(Request $request, Stock $stock)
    {
        $this->authorize($stock);
        $input = $request->session()->get('form_input');
        $class = Classification::find($input['class'])->class_name;
        return view('sales.editConfirm', ['input' => $input, 'class' => $class, 'stock' => $stock]);
    }

    public function update(Request $request, Stock $stock, Subject $subject)
    {
        $this->authorize($stock);
        $input = $request->session()->get('form_input');
        if($request->has("back")) {
            return redirect(route('sales.edit', $stock->id))
                ->withInput($input);
        }
        $code = $input['isbn_code'];
        $id = Subject::where('isbn_code', '=', $code)->get('id')->toArray();
        $stock->user_id = Auth::id();
        $stock->subject_id = $id[0]['id'];
        $stock->status = $input['status'];
        $stock->price = $input['price'];
        $stock->stock = 1;
        $stock->remarks = $input['remarks'];
        $stock->save();
        $request->session()->forget("form_input");
        return redirect(route('sales.show', $stock->id));
    }
}
