<div>
    <input type="text" wire:model="keyword" placeholder="Tìm kiếm sản phẩm...">

    @if ($keyword)
        <ul>
            @forelse($products as $product)
                <li>
                    <a href="{{ route('search', $product->id) }}">{{ $product->name }}</a>
                </li>
            @empty
                <li>Không tìm thấy sản phẩm nào.</li>
            @endforelse
        </ul>
    @endif
</div>
