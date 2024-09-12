<ul class="navbar-list" style="margin-right: 1rem;">
    <li class="navbar-item"><a class="navbar-link" href="/">Trang chủ</a></li>
    @foreach($categories as $category)
    <li class="navbar-item dropdown">
        <a class="navbar-link {{ $category->children->count() ? 'dropdown-arrow' : '' }}"
           href="{{ route('category-products', ['slug' => $category->slug]) }}">
            {{ $category->name }}
        </a>

        @if($category->children->count())
            <ul class="dropdown-position-list">
                @foreach($category->children as $child)
                    <li class="dropdown">
                        <a class="navbar-link {{ $child->children->count() ? 'dropdown-arrow' : '' }}"
                           href="{{ route('category-products', ['slug' => $child->slug]) }}">
                            {{ $child->name }}
                        </a>
                        @if($child->children->count())
                            <ul class="dropdown-position-list">
                                @foreach($child->children as $grandchild)
                                    <li><a href="{{ route('category-products', ['slug' => $grandchild->slug]) }}">{{ $grandchild->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach

</ul>
