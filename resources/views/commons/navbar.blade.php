<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Shopping List</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- 買い物リスト一覧へのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('shoppinglists.index', '買い物リスト一覧', ['userId' => Auth::id()]) !!}</li>
                            <li class="dropdown-item">{!! link_to_route('shoppinglists.create', '新規リスト作成', ['userId' => Auth::id()]) !!}</li>
                            @if(!empty($shoppinglist->id))
                                
                                <li class="dropdown-item">{!! link_to_route('items.create', '新規アイテム作成', ['listId' => $shoppinglist->id]) !!}</li>
                                   
                            @endif
                            
                                
                                
                                
                           {{--
                           なんか$shoppinglistを見つけてくれないけど、リストのページから表示されるようにしたら大丈夫かな？
                            {!!
                            $id=1;
                            $shoppinglist = \App\Shoppinglist::findOrFail($id);
                            
                            !!}
                             
                           
                                
                                //@if(!empty($shoppinglist))
                                //空でなければtrueが返る
                                    //アイテム追加ページへのリンク
                                    <li class="dropdown-item">{!! link_to_route('items.create', '新規アイテム作成', ['user' => Auth::id(),'shoppinglist'=>$shoppinglist]) !!}</li>
                                   
                                //@endif
                            --}}
                            
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>