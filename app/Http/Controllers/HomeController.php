<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class HomeController extends Controller
{
    private $formItems = ["name", "address", "tel_number", "email"];

    private $validator =[
        "name" => "required|string",
        "address" => "required|string",
        "tel_number" => "required|string",
        "email" => "required|string"
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
        
        
        $user = $request->input('id');
        //dd($request);
		$input = $request->only($this->formItems);
		

		$validator = Validator::make($input, $this->validator);
		if($validator->fails()){
			return redirect()->route("home.edit")
				->withInput()
				->withErrors($validator);
		}
        $request->session()->put("form_input", $input);

        return redirect(route('homes.confirm' , $user));
    }

    public function confirm(User $user , Request $request)
    {
        $input = $request->session()->get("form_input");
        
        
        // if(!$input){
        //     return redirect()->action("home");
        // }    
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
        //dd($user);
        return view('homes.edit', ['user' => $user]);
		//return redirect()->action("SampleFormController@confirm");
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
        
        //$input = new User;
        $input = $request->session()->get("form_input");
        
                //セッションに値が無い時はフォームに戻る
                if(!$input){
                    return redirect()->route("home.edit" , \Auth::id());
                }
                $user->update($input);
                
                return redirect(route('homes.show' , $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
