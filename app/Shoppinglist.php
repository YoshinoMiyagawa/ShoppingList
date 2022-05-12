<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppinglist extends Model
{
    
    protected $fillable = ['name','link'];
    
    //このリストを作成するユーザー（ Userモデルとの関係を定義）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    /**
     * このリストに関係するモデルの件数をロードする。できてる？
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('items');
        
    }
    
    public function feed_this_items($id){
        return Item::where('shoppinglist_id',$id);
    }
    
    
     public function feed_buyingitems()
    {
        
        // statusがfalseのアイテムに絞り込む
        return $this->feed_this_items()->where('status', false);
    }
    
    public function feed_boughtitems()
    {
        
        // statusがfalseのアイテムに絞り込む
        return $this->feed_this_items()->where('status', true);
    }
    
    
    
    
    
}
