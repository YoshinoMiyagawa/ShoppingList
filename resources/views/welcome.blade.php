@extends('layouts.app')

@section('content')
    
    @if (Auth::check())
        {{ Auth::user()->name }}
       
         @include('shoppinglists.index')
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Shopping List</h1>
                {{-- ユーザ登録ページへのリンク --}}
                <div class=container>
                    <div class="col-md-4 m-auto p-1">
                    {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-light btn-block']) !!}
                    </div>
                    <div class="col-md-4 m-auto p-1">
                        {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('login', 'Log in', [], ['class' => 'btn btn-lg btn-light btn-block']) !!}
                    </div>
                    
                </div>
                
                 
            </div>
        </div>
    @endif
@endsection