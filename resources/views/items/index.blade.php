いらないBladeかも

@extends('layouts.app')

@section('content')
    
    
    
    <h2 class="col-md-10 mx-auto">
        
        {{$shoppinglist->name}}(リスト名) /
        <a >{{$shoppinglist->user_id}}(ユーザー名)</a>
  
    </h2>
        
        
        {{-- 
        
        @if(ログインしているユーザ)
            アイテムの一覧を表示--}}
        
            @if (count($items) > 0)
                <div class='countainer'>
                    
                        <div class='row border-bottom'>
                            @foreach  ($items as $item)
                            <div class='col-8'>
                                {!! Form::open(['route' => ['items.show', 'item' => $item->id],'method' => 'get'    ]) !!}
                                {!! Form::submit($item->name, ['class' => ' btn btn-outline-secondary btn-block text-left']) !!}
                            {!! Form::close() !!}
                            </div>
                            <div class='col-4 '>
                                購入希望数とstatusの表示
                            </div>
                        
                        </div>
                       
                       
                        @endforeach
                         {{-- 
                        @foreach ($items as $item)
                        
                            <div class='row'>
                            
                            
                                <div class="col-8 ">
                                {!! link_to_route('アイテム詳細表示へのルート', $item->name, ['item' => $item->id,]) !!}
                                </div> 
                            </div>
                        @endforeach
                    --}}
                    
                    
                </div>
                
            @endif    
            
            
            
        {{--
        @else
        return redirect(RouteServiceProvider::HOME);

        @endif
        --}}
        



@endsection