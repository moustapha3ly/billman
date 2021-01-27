<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

use App\Shop;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = DB::table('shops')->paginate(10);

        return view('shops.index', ['shops' => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email',
            'logo' => 'file|image|mimes:jpeg,png,gif,jpg|max:2048|dimensions:min_width=100,min_height=100'
        ]);
        $shop = new Shop;
        $shop->name=$request->name;
        $shop->email=$request->email;
        $shop->website=$request->website;
        $logo      = $request->file('logo');
        $fileName   = time() . '.' . $logo->getClientOriginalExtension();
        $logo->storeAs('public/', $fileName);

        $shop->logo=$fileName;
        $shop->save();
        Session::flash('created_message','create success');
        return redirect(route('shop'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
       
        return view('shops.create',['shop'=>$shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email',
            'logo' => 'file|image|mimes:jpeg,png,gif,jpg|max:2048|dimensions:min_width=100,min_height=100'
        ]);
        $shop = Shop::findOrFail($id);
        $shop->name=$request->name;
        $shop->email=$request->email;
        $shop->website=$request->website;
        $logo      = $request->file('logo');
        if($logo!=""){
            if($shop->logo){
                unlink(storage_path('app/public/') . $shop->logo);
            }
            $fileName   = time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('public/', $fileName);
            $shop->logo=$fileName;
        }
        $shop->save();
        Session::flash('created_message','create success');
        return redirect(route('shop'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
		if($shop->logo){
			unlink(storage_path('app/public/') . $shop->logo);
		}
        $shop->delete();
        Session::flash('deleted_message','Deleted success');
        return redirect(route('shop'));
        
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
 
}
