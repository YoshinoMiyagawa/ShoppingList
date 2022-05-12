@extends('layouts.app')



@section('content')
    <?php $user = Auth::user(); ?>
    
    @if (Auth::check())
    
    
    <h2 class="col-md-10 mx-auto">{{ $user->name }}さんのリスト</h2>
    
    
    <div class="col-md-8 mx-auto border border-light">
        <!--リスト全体をラップするやつ-->
        
        <h5 >新規リスト作成</h5>
        {!! Form::model($shoppinglist, ['route' => ['shoppinglists.store', 'userId' => $user->id]]) !!}
            <table class="table table-sm table-borderless">
                <tr>
                    <th class="text-right">{!! Form::label('name', 'リスト名:') !!}</th>
                    <th class="text-center">{!! Form::text('name', null, ['class' => 'form-control']) !!}</th>
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