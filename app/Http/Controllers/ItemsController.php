<?php
//20220408雛形作っただけ
namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Item;
use App\Shoppinglist;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$listId)
    {
        //
        
        $shoppinglist = \App\Shoppinglist::where('id', $listId)->first();
        
        $item = new Item;
        
        return view('items.create', [
            'item' => $item,
            'shoppinglist'=>$shoppinglist,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$listId)
    {
        //新規アイテムを追加してアイテム一覧（buying）へリダイレクト
        
        if (\Auth::check()) { 
            
            
           //わざわざインスタンス化する必要ないかも
            $shoppinglist=Shoppinglist::where('id', $listId)->first();
            
            $user=\Auth::user();
           
           
            // バリデーション
            $request->validate([
                'name' => 'required|max:255', 
                'content' => 'required|max:255', 
                
                
            ]);
            
            
            // 
            $item = $user->items()->create([ 
                     
                'name'=>$request->name,
                'content'=>$request->content , 
                'deadline'=>$request->deadline,
                'status' => false,
                'shoppinglist_id'=>$shoppinglist->id,
                
                ]); 
            
            
        }
            
            return redirect('/');
            
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$itemId)
    {
        //$listIdはちゃんと入ってる
        
        
       
       
        //item idをもとにデータベースから取得;
        $item = \App\Item::where('id', $request->query('itemId'))->first();
        
        
        $shoppinglist=Shoppinglist::where('id', $item->shoppinglist_id)->first();
        
        
        //Viewに受け渡す
            $data = [
                'shoppinglist'=>$shoppinglist,
                'item' => $item, 
            ];
          
        return view('items.show', $data);
        
        
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
    
    
    public function destroy_confirmation($itemId)
    {
        //delete.bladeに行く処理
        //Viewに受け渡す
        $item = Item::findOrFail($itemId);
        $shoppinglist=Shoppinglist::findOrFail($item->shoppinglist_id);
            $data = [
                
                'item' => $item, 
                'shoppinglist'=>$shoppinglist,
            ];
          
        return view('items.destroy_confirmation', $data);
        
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$itemId)
    {
        //
        
        {
        $item = Item::findOrFail($itemId);
        $shoppinglist=Shoppinglist::findOrFail($item->shoppinglist_id);
        
            if (\Auth::id() === $shoppinglist->user_id) { //shoppinglistの作成者なら削除可能
                // itemを削除
                $item->delete();
            }
    
            // トップページへリダイレクトさせる
            return redirect('/');
        }
    }
    
    
    
    public function hasbought(Request $request,$link)
    {
        //linkをもとにデータベースから取得;
        $shoppinglist = \App\Shoppinglist::where('link', $link)->first();
        
        if(!$shoppinglist)
        {
            return redirect('/');
        }
        
        
        //ここでlist_idが今いるリストと一致して、ロード
        $items = $shoppinglist->feed_this_items($shoppinglist->id)->where('status',true)->orderBy('created_at','desc')->paginate(10);
        
           
        //関係するモデルの件数をロード
        //それを表示
            $data = [
                'shoppinglist'=>$shoppinglist,
                'link' => $shoppinglist->link,
                'items' => $items, 
            ];
          
        return view('items.hasbought_tab', $data);
    }
    
    
    public function buying(Request $request,$link)
    {
        
        //linkをもとにデータベースから取得;
        $shoppinglist = \App\Shoppinglist::where('link', $link)->first();
        
        if(!$shoppinglist)
        {
            return redirect('/');
        }
        
        
        //ここでlist_idが今いるリストと一致して、ロード
        $items = $shoppinglist->feed_this_items($shoppinglist->id)->where('status',false)->orderBy('created_at','desc')->paginate(10);
        
           
        //関係するモデルの件数をロード
        //それを表示
            $data = [
                'shoppinglist'=>$shoppinglist,
                'link' => $shoppinglist->link,
                'items' => $items, 
                
            ];
            
        return view('items.buying_tab',$data);
    }
    
    public function status_register(Request $request,$itemId)
    {
        
        $status = $request->status_check;
        
        
        //status_checkがnullだったらDBを操作せずに返し、値が入っていたらそれに更新する
        if($status==1)
        {
            
            $item = Item::findOrFail($itemId);
            $item->status=$status;
            $item->save();
        }
        else{
            $item = Item::findOrFail($itemId);
            $item->status=0;
            $item->save();
        }
        
        
        return back();
        //return redirect('/');
       
        
        
        
    }
    
    
}
