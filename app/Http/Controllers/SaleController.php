<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classification;
use App\Models\Stock;
use App\Models\Subject;
use App\Models\History;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;

class SaleController extends Controller
{
    private $createItems = ['isbn_code', 'title', 'author', 'class', 'status', 'price', 'remarks', 'image'];
    private $editItems = ['status', 'price', 'remarks'];

    public function index(Stock $stock, Subject $subject, Classification $class, Request $request)
    {
        //query生成
        $query = Stock::with(['subject.classification']);
        //titleで検索
        if($request->title) {
            $query->whereHas('subject', function($query) use ($request) {
                $query->where('title', 'like', '%'.$request->title.'%');
            });
        }
        //authorで検索
        if($request->author) {
            $query->whereHas('subject', function($query) use ($request) {
                $query->where('author', 'like', '%'.$request->author.'%');
            });
        }
        //分類で検索
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
        //在庫の有無の絞り込み
        if($request->stock == 1) {
            $query->where('stock', '=', 1);
        }
        $stocks = $query->paginate(9);
        //dd();
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

    public function buy(Stock $stock, History $history)
    {
        $this->authorize($stock);
        $stock->stock = 0;
        $stock->save();
        $history->user_id = Auth::id();
        $history->stock_id = $stock->id;
        $history->save();
        return view('sales.finish');
    }

    public function create(Classification $class, Stock $stock, Request $request)
    {
        return view('sales.create', ['classes' => $class->get(), 'stock' => $stock]);
    }

    public function post(CreateRequest $request)
    {
        $input = $request->only($this->createItems);
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
        $code = "978".$input['isbn_code'];
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
            //画像保存を行う
            $image_url = $input['image'];
            $file_name = time();
            $file_path = storage_path('app/public/'.$file_name.".jpg");
            \Image::make($image_url)->save($file_path);
            $subject->image = basename($file_path);
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

    public function editPost(EditRequest $request, Stock $stock)
    {
        $this->authorize($stock);
        $input = $request->only($this->editItems);
        $request->session()->put('form_input', $input);
        return redirect(route('sales.editConfirm', $stock->id));
    }

    public function editConfirm(Request $request, Stock $stock)
    {
        $this->authorize($stock);
        $input = $request->session()->get('form_input');
        //$class = Classification::find($input['class'])->class_name;
        return view('sales.editConfirm', ['input' => $input, 'stock' => $stock]);
    }

    public function update(Request $request, Stock $stock, Subject $subject)
    {
        $this->authorize($stock);
        $input = $request->session()->get('form_input');
        if($request->has("back")) {
            return redirect(route('sales.edit', $stock->id))
                ->withInput($input);
        }
        $stock->status = $input['status'];
        $stock->price = $input['price'];
        $stock->stock = 1;
        $stock->remarks = $input['remarks'];
        $stock->save();
        $request->session()->forget("form_input");
        return redirect(route('sales.show', $stock->id));
    }
}
