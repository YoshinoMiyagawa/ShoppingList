<ul class="nav nav-tabs nav-justified mb-3">
    {{--購入予定タブ --}}
    <li class="nav-item">
        
        <a href="{{ route('items.buying', ['link' => $shoppinglist->link]) }}" class="nav-link {{ Request::routeIs('items.buying') ? 'active' : '' }}">
            購入予定
            
        </a>
    </li>
   <li class="nav-item">
        <a href="{{ route('items.hasbought', ['link' => $shoppinglist->link]) }}" class="nav-link {{ Request::routeIs('items.hasbought') ? 'active' : '' }}">
            購入済み
            
        </a>
    </li>
    
    
    
    {{-- 購入済み一覧タブ
    <li class="nav-item">
        <a href="{{ route('items.hasbought', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('items.hasbought') ? 'active' : '' }}">
            購入済み
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a>
    </li> --}}
    
    
</ul>