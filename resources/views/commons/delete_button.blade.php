{{-- アイテム削除確認ページへの遷移ボタン --}}
    {!! Form::open(['route' => ['items.destroy_confirmation', 'itemId' =>$item->id], 'method' => 'get']) !!}
    
    
        {!! Form::hidden('itemId', $item->id) !!} 
        
        {!! Form::submit('アイテムを削除', ['class' => 'text-center btn btn-danger btn-block']) !!}
    {!! Form::close() !!}
    
   