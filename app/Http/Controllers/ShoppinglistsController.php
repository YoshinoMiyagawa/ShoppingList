<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoppinglist;

class ShoppinglistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            $shoppinglists = $user->shoppinglists()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'shoppinglists' => $shoppinglists,
            ];
        }
        
        return view('welcome', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $shoppinglist = new Shoppinglist;
        
        return view('shoppinglists.create', [
            'shoppinglist' => $shoppinglist,
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     
     
     

     
    public function store(Request $request)
    {
        //リストを作成した後、リストの詳細ページでもある'items.buying'へ移動
        if (\Auth::check()) { 
            
           
            // バリデーション
            $request->validate([
                'name' => 'required|max:255',   
                
            ]);
            
            
            // 認証済みユーザ（閲覧者）のlistとして作成（リクエストされた値をもとに作成）
            $shoppinglist = $request->user()->shoppinglists()->create([ 
                'link' => substr(bin2hex(random_bytes(16)), 0, 16), 
                'name'=>$request->name,
                ]); 
            $shoppinglist->link = "s".$shoppinglist->id.$shoppinglist->link; 
            $shoppinglist->save();
            
            
                
        }
        
        //今作ったリストの購入予定アイテムの表示ページへ遷移したい
        //return redirect()->route('items.buying', ['shoppinglist' => $shoppinglist->link]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
        $shoppinglist=Shoppinglist::findOrFail($id);
        
        
        
        if (\Auth::id() === $shoppinglist->user_id) {
            $shoppinglist->delete();
        }
            
     
        return redirect('/');
    }
}
