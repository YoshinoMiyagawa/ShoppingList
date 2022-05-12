<form action="{{ route('items.status_register', ['itemId' => $item->id]) }}" method="post">
    @csrf
    
    @if ($item->status == true)
        <input type="checkbox" class='checkbox' checked="checked" name="status_check" value="1">
    @else
        <input type="checkbox" name="status_check" value="1">
    @endif
    <button type="submit" class='btn btn-outline-secondary'>更新
    </button>
</form>