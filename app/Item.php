<?php
//20220408雛形作っただけ
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    
    protected $fillable = ['name','status','content','deadline','user_id','shoppinglist_id'];
    
    public function shoppinglists()
    {
        return $this->belongsTo(Shoppinglist::class);
    }
    
    public function users(){
        return $this->belongsTo(User::class);
    }
    
}
