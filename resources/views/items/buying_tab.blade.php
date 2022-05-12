@extends('layouts.app')

@section('content')
    
    
    
    <h2 class="col-md-10 mx-auto">
        
        {{$shoppinglist->name}}(リスト名) /
        <a >{{$shoppinglist->user_id}}(ユーザー名)</a>
  
    </h2>
    
        <div class=''></div>
        @include('items.navtabs')
        {{-- 
        
        @if(ログインしているユーザ)
            アイテムの一覧を表示--}}
        
            
                <div class='countainer border-right border-left border-bottom rounded-bottom px-2 py-2'>
                    
                    @if (count($items) > 0)
                        <div class='row '>
                            @foreach  ($items as $item)
                            <div class='col-md-8'>
                                
                                
                                {!! Form::open(['route' => ['items.show', 'itemId' => $item->id],'method' => 'get']) !!}
                                {!! Form::hidden('itemId', $item->id) !!}
                                {!! Form::submit($item->name, ['class' => ' btn btn-outline-secondary btn-block text-left']) !!}
                            {!! Form::close() !!}
                            
                            </div>
                            <div class='col-4 '>
                                @include('items.status_checkbox')
                                
                                
                                {{--購入希望数とstatusの表示--}}
                            </div>
                        
                        </div>
                       
                       
                        @endforeach
                    
                @else
                    <a>購入予定の商品はありません</a>
                @endif 
                
                    
                </div>
                
                
            
            
        {{--
        @else
        return redirect(RouteServiceProvider::HOME);

        @endif
        --}}
        



@endsection