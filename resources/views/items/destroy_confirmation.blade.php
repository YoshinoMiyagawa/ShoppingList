@extends('layouts.app')



@section('content')
    <?php $user = Auth::user(); ?>
    
    @if (Auth::check())
    
    
        <h2 "col-md-10 mx-auto">{{$item->name}}(アイテム名) /
            <a >{{$shoppinglist->name}}(所属しているリスト)</a>
        </h2>
        
        <div class="col-md-8 mx-auto border border-light">
            <!--リスト全体をラップするやつ-->
            
            <h5>アイテムを削除</h5>
            <p class='danger'>
                リスト内のアイテム：{{$item->name}}を削除しようとしています。
            </p>
            <p>
                アイテムを削除した場合、もとに戻すことはできません。
            </p>
            
            
            {!! Form::model($item, ['route' => ['items.destroy', 'itemId' => $item->id],'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            
            
        </div>

@else

    return redirect(RouteServiceProvider::HOME);


@endif


@endsection