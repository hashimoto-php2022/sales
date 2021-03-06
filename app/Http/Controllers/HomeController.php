<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\History;
use App\Models\Stock;
use App\Models\Subject;
use Validator;

class HomeController extends Controller
{
    private $formItems = ["name", "address", "tel_number", "email"];

    private $validator =[
        'name' => 'required|string',
        'address' => 'required|string',
        'tel_number' => 'required|string',
        'email' => 'required|string'
    ];

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //自分の蔵書一覧
        $stocks = \Auth::user()->stocks()->orderBy('created_at','desc')
                    ->paginate(5);
                    $id = \Auth::id();
                    
        return view('homes.index', ['stocks' => $stocks , 'id' => $id ]); 

    }
    function post(Request $request , User $user){
        $email = $request->input('email');
        $email_conf = \Auth::user()->email;
        if($email !== $email_conf){
            $this->validate($request, [
                'name' => 'required|string|max:50',
                'address' => 'required|max:200',
                'tel_number' => ['required','digits_between:10,11','regex:/(^0[0-9]{9}$|^0[789]0[0-9]{8}$)/'],
                'email' => 'required|string|unique:users|email'
            ]);
    }else{
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'address' => 'required|max:200',
            'tel_number' => ['required','digits_between:10,11','regex:/(^0[0-9]{9}$|^0[789]0[0-9]{8}$)/'],
            'email' => 'required|string|email'
    ]);
}
        $user = \Auth::id();

		$input = $request->only($this->formItems);
		
        $request->session()->put("form_input", $input);

        return redirect(route('home.confirm' , $user));
    }

    public function confirm(User $user , Request $request)
    {
        $input = $request->session()->get("form_input");
        return view('homes.confirm', ['input' => $input]);

	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);
        
        return view('homes.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $this ->authorize('update',$user);
        return view('homes.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $user = \Auth::user();
        
        $input = $request->session()->get("form_input");

                //セッションに値が無い時はフォームに戻る
                if(!$input){
                    return redirect()->route("home.edit" , \Auth::id());
                }
                $user->update($input);
                return redirect(route('home.show' , $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
            return redirect(route('home.index'));
    }

    public function history(User $user, History $history, $id)
    {
        $histories = History::where('user_id', '=', $id)->get();
        return view('homes.history', ['histories' => $histories]);
    }

    public function detail($id)
    {
        $stock = Stock::find($id);
        return view('homes.detail', ['stock' => $stock]);
    }

    public function subject_history(User $user, Stock $history, $id)
    {
        $histories = Stock::where('user_id', '=', $id)->get();
        // dd($histories);
        return view('homes.subject_history', ['histories' => $histories]);

    }
}
