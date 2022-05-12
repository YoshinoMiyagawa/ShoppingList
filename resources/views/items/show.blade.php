@extends('layouts.app')

@section('content')
    
    <h2>
                    
        {{$item->name}}(アイテム名) /
        <a >{{$shoppinglist->id}}(リスト名)</a>
  
    </h2>
    
    <ul class="nav nav-tabs nav-justified mb-3">
        {{--アイテム詳細 --}}
        <li class="nav-item">
            
            <a href="{{ route('items.show',  ['items.show', 'listId' => $shoppinglist->id,'itemId'=> $item->id]) }}" class="nav-link {{ Request::routeIs('items.show') ? 'active' : '' }}">
               商品詳細
            </a>
        </li>
        <li class="nav-item">
            
            <a>
               購入希望者一覧
            </a>
        </li>
        
      {{--購入希望者 
        <li class="nav-item">
            
            <a href="{{ route('items.purchase_user', ['link' => $shoppinglist->link]) }}" class="nav-link {{ Request::routeIs('items.buying') ? 'active' : '' }}">
                購入希望者
            </a>
        </li>
       --}}
        
    </ul>
    
    
    
    <div class='countainer border-right border-left border-bottom rounded-bottom px-2 py-2'>
        <div class='row '>
            <div class=' col-8'>
                <h5>{{$item->name}}</h5>
                
                <p >
                    {{$item->content}}
                </p>
            
            </div>
            
            <div class='col-4'>
                {{--サイドバー--}}
                <h5>
                    @include('items.status_checkbox')
                </h5>
                {{-- アイテム削除確認ページへの遷移ボタン --}}
                {!! Form::open(['route' => ['items.destroy_confirmation', 'itemId' =>$item->id], 'method' => 'get']) !!}
                
                
                    {!! Form::hidden('itemId', $item->id) !!} 
                    
                    {!! Form::submit('アイテムを削除', ['class' => 'text-center btn btn-outline-danger btn-block']) !!}
                {!! Form::close() !!}
    
                
                
            </div>                
                        
        </div>
        
        
        
                    
                    
                        
                       
                       
                        
                    
                    
    </div>


@endsection