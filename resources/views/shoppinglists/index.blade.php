//shoppinglistのindex
@extends('layouts.app')

@section('content')
   
    

    <h2 class="col-md-10 mx-auto">
        {{$user->name}}さんのリスト一覧 
    </h2>
    
    
    
        @if (count($shoppinglists) > 0)
            <div class='countainer '>
                <div class='row '>
                    
                   
                    
                    @foreach ($shoppinglists as $shoppinglist)
                    
                        <div class='col-4'>
                            {!! Form::open(['route' => ['items.buying', 'link' => $shoppinglist->link],'method' => 'get']) !!}
                            
                            {!! Form::submit($shoppinglist->name, ['class' => ' text-center btn btn-outline-secondary btn-block']) !!}
                        {!! Form::close() !!}
                        </div>
                        
                            
                        
                        {{--<div class="col-4 text-center btn btn-outline-secondary">
                            
                            
                        {!! link_to_route('items.buying', $shoppinglist->name, ['link' => $shoppinglist->link,'id'=>$shoppinglist->id]) !!}
                        </div> --}}
                    @endforeach
                </div>
                
                
            </div>
            
            
        @else
            <a>作成したリストはありません</a>
        @endif 
        



@endsection