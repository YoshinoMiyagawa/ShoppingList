@extends('layouts.app')
//item.create


@section('content')
    <?php $user = Auth::user(); ?>
    
    @if (Auth::check())
    
    
        <h2 "col-md-10 mx-auto">{{$shoppinglist->name}}(リスト名) /
            <a >{{$user->name}}</a>
        </h2>
        
        <div class="col-md-8 mx-auto border border-light">
            <!--リスト全体をラップするやつ-->
            
            <h5>新規アイテム作成</h5>
            {!! Form::model($item, ['route' => ['items.store', 'listId' => $shoppinglist->id]]) !!}
                <table class="table table-sm table-borderless">
                    <tr>
                        <th class="text-right">{!! Form::label('name', '商品名:') !!}</th>
                        <th class="text-center">{!! Form::text('name', null, ['class' => 'form-control']) !!}</th>
                    </tr>
                    <tr>
                        <th class="text-right">{!! Form::label('content', '説明:') !!}</th>
                        <th class="text-center">{!! Form::textarea('content', null, ['class' => 'form-control']) !!}</th>
                    </tr>
                    <tr>
                        <th class="text-right">{!! Form::label('deadline', '締切日:') !!}</th>
                        <th class="text-center">{!! Form::date('deadline', null,['class' => 'form-control']) !!}</th>
                    </tr>
                    
                    <tr>
                        <th "text-center"></th>
                        <th "text-right">{!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}</th>
                    </tr>
                    
                </table>
            {!! Form::close() !!}
            
            
        </div>

@else

    return redirect(RouteServiceProvider::HOME);


@endif


@endsection