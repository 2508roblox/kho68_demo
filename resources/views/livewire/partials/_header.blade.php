<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-media-group">
                <button class="header-user"><i class="fa-solid fa-bars"></i></button>
                <a wire:navigate href="/">
                    <img src="{{asset('assets/storage/images/kho682.png')}}" alt="logo"></a>
                <button class="header-src"><i class="fas fa-search"></i></button>
            </div>
            <a wire:navigate href="/" class="header-logo"><img src="{{asset('assets/storage/images/kho682.png')}}"
                                                               alt="logo"></a>
            <form class="header-form" method="GET" action="">
                <input type="hidden" name="action" value="home">
                <input type="text" name="keyword" value=""
                       placeholder="Tìm kiếm sản phẩm...">
                <button><i class="fas fa-search"></i></button>
            </form>
            <div class="header-widget-group">
                @if(Auth::check())
                    <a href="{{ route('cart') }}" class="header-widget" title="Giỏ hàng">
                        <i class="fa-solid fa-cart-arrow-down"></i>
                    </a>
                    <a href="#" class="header-widget" title="Sản phẩm yêu thích">
                        <i class="fas fa-heart"></i>
                    </a>
                    <button class="header-widget header-cart" title="Nạp tiền"><i
                            class="fa-solid fa-building-columns"></i>

                    </button>

                    @if(Route::has('account'))
                        <a href="{{ route('account') }}" class="header-widget" title="Login">
                            <span>
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="header-widget" title="Login">
                            <img src="{{asset('assets/storage/images/avatar4N0.png')}}" alt="user"><span><button
                                    wire:click.prevent="logout">Đăng Xuất</button>
</span>
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="header-widget" title="Login">
                        <img src="{{asset('assets/storage/images/avatar4N0.png')}}" alt="user"><span>Login</span>
                    </a>
                @endif

            </div>
        </div>
    </div>
</header>

<nav class="navbar-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-content">
                    <ul class="navbar-list">
                        {{--                          <li class="navbar-item"><a class="navbar-link" href="/">Trang chủ</a></li> --}}

                        {{--                         <li class="navbar-item dropdown"> --}}
                        {{--                             <a class="navbar-link dropdown-arrow" href="#">Sản phẩm</a> --}}
                        {{--                             <ul class="dropdown-position-list"> --}}
                        {{--                                 @foreach($categories as $category) --}}
                        {{--                                     <li class="dropdown"> --}}
                        {{--                                         <a class="navbar-link dropdown-arrow" href="#">{{ $category->name }}</a> --}}
                        {{--                                         @if($category->children->count()) --}}
                        {{--                                             <ul class="dropdown-position-list"> --}}
                        {{--                                                 @foreach($category->children as $child) --}}
                        {{--                                                     <li><a href="{{ url($child->slug) }}">{{ $child->name }}</a></li> --}}
                        {{--                                                 @endforeach --}}
                        {{--                                             </ul> --}}
                        {{--                                         @endif --}}
                        {{--                                     </li> --}}
                        {{--                                 @endforeach --}}
                        {{--                             </ul> --}}
                        {{--                         </li> --}}

                        @livewire('category-menu')


                        <li class="navbar-item dropdown">
                            <a class="navbar-link dropdown-arrow" href="#">Nạp tiền</a>
                            <ul class="dropdown-position-list">
                                <li><a href="indexaca8.html?action=recharge-bank"><img width="20px"
                                                                                       src="{{asset('assets/img/icon-bank.svg')}}">
                                        Ngân hàng</a></li>
                                <li><a href="index88fc.html?action=recharge-momo"><img width="20px"
                                                                                       src="{{asset('assets/img/icon-momo.png')}}">
                                        Ví MOMO</a></li>
                                <li><a href="index0a44.html?action=recharge-card"><img width="20px"
                                                                                       src="{{asset('assets/img/icon-cards.png')}}">
                                        Thẻ cào</a>
                                </li>
                                <li><a href="indexbb25.html?action=recharge-crypto"><img width="20px"
                                                                                         src="{{asset('assets/img/icon-usdt.svg')}}">
                                        Crypto</a>
                                </li>
                                <li><a href="index866c.html?action=recharge-paypal"><img width="20px"
                                                                                         src="{{asset('assets/img/icon-paypal.svg')}}">
                                        Paypal</a></li>
                                <li><a href="indexc009.html?action=recharge-perfectmoney"><img width="20px"
                                                                                               src="{{asset('assets/img/icon-perfectmoney.svg')}}">
                                        Perfect Money</a></li>
                                <li><a href="index3a22.html?action=recharge-toyyibpay"><img width="20px"
                                                                                            src="{{asset('assets/img/icon-toyyibpay.jpg')}}">
                                        Toyyibpay Malaysia</a></li>
                                <li><a href="index3d9d.html?action=recharge-squadco"><img width="20px"
                                                                                          src="{{asset('assets/img/icon-squadco.png')}}">
                                        Squadco Nigeria</a></li>
                                <li><a href="client/login.html"><img
                                            width="20px" src="{{asset('assets/storage/images/icon_gatewayK5TD.html')}}">
                                        Wise Manual</a></li>
                                <li><a href="client/login.html"><img
                                            width="20px" src="{{asset('assets/storage/images/icon_gatewayZAUG.html')}}">
                                        Skrill Manual</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-info-group">
                        <div class="navbar-info"><i class="fa-solid fa-phone"></i>
                            <p><small>Hotline</small><span>0988888XXX</span></p>
                        </div>
                        <div class="navbar-info"><i class="fa-regular fa-envelope"></i>
                            <p><small>Email</small><span>admin@domain.com</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside class="cart-sidebar">
    <div class="cart-header">
        <div class="cart-total"><i
                class="fa-solid fa-building-columns"></i><span>Chọn phương thức nạp tiền</span></div>
        <button class="cart-close"><i class="icofont-close"></i></button>
    </div>
    <ul class="category-list">
        <li class="category-item">
            <a class="category-link" href="indexaca8.html?action=recharge-bank"><img style="margin-right: 10px;"
                                                                                     width="30px"
                                                                                     src="{{asset('assets/img/icon-bank.svg')}}">
                Ngân hàng</a>
        </li>
        <li class="category-item"><a href="index88fc.html?action=recharge-momo" class="category-link"><img
                    style="margin-right: 10px;" width="30px" src="{{asset('assets/img/icon-momo.png')}}">
                Ví MOMO</a></li>
        <li class="category-item"><a class="category-link" href="index0a44.html?action=recharge-card">
                <img width="30px" style="margin-right: 10px;" src="{{asset('assets/img/icon-cards.png')}}">
                Thẻ cào</a>
        </li>
        <li class="category-item"><a class="category-link" href="indexbb25.html?action=recharge-crypto"><img
                    style="margin-right: 10px;" width="30px" src="{{asset('assets/img/icon-usdt.svg')}}">
                Crypto</a>
        </li>
        <li class="category-item"><a class="category-link" href="index866c.html?action=recharge-paypal"><img
                    style="margin-right: 10px;" width="30px" src="{{asset('assets/img/icon-paypal.svg')}}">
                Paypal</a></li>
        <li class="category-item"><a class="category-link"
                                     href="indexc009.html?action=recharge-perfectmoney"><img style="margin-right: 10px;"
                                                                                             width="30px"
                                                                                             src="{{asset('assets/img/icon-perfectmoney.svg')}}">
                Perfect Money</a></li>
        <li class="category-item"><a class="category-link" href="index3a22.html?action=recharge-toyyibpay"><img
                    style="margin-right: 10px;" width="30px" src="{{asset('assets/img/icon-toyyibpay.jpg')}}">
                Toyyibpay Malaysia</a></li>
        <li class="category-item"><a class="category-link" href="index3d9d.html?action=recharge-squadco"><img
                    style="margin-right: 10px;" width="30px" src="{{asset('assets/img/icon-squadco.png')}}">
                Squadco Nigeria</a></li>
        <li class="category-item"><a class="category-link" href="client/login.html"><img
                    style="margin-right: 10px;" width="30px"
                    src="{{asset('assets/storage/images/icon_gatewayK5TD.html')}}">
                Wise Manual</a></li>
        <li class="category-item"><a class="category-link" href="client/login.html"><img
                    style="margin-right: 10px;" width="30px"
                    src="{{asset('assets/storage/images/icon_gatewayZAUG.html')}}">
                Skrill Manual</a></li>
    </ul>
</aside>

{{-- ================= MOBILE =================== --}}
<aside class="nav-sidebar">
    <div class="nav-header"><a wire:navigate href="/"><img src="{{asset('assets/storage/images/kho682.png')}}"
                                                           alt="logo"></a>
        <button class="nav-close"><i class="icofont-close"></i></button>
    </div>
    <div class="nav-content">
        <div class="nav-btn">
            <a href="client/login.html" class="btn btn-inline">
                <i class="fa fa-unlock-alt"></i> <span>Đăng Nhập</span></a>

        </div>
        <div class="nav-select-group">
            <p>Số dư của tôi: <strong
                    class="text-wallet">0</strong></p>
        </div>
        <ul class="nav-list">
            <li><a class="nav-link" href="/"><i
                        class="icofont-home"></i>Trang chủ</a></li>
            <li><a class="nav-link dropdown-link" href="#"><i
                        class="fa-solid fa-cart-shopping"></i>Sản phẩm</a>
                <ul class="dropdown-list">
                    <li><a href="">Theme Wordpress</a></li>
                    <li><a href="">Plugin Wordpress</a></li>
                    <li><a href="">Khóa học online</a></li>
                    <li><a href="">Thư viện thiết kế</a></li>
                    <li><a href="">Tài khoản | Key</a></li>
                    <li><a href="">Source code</a></li>
                    <li><a href="">Phần mềm</a></li>
                </ul>
            </li>
            <li><a class="nav-link dropdown-link" href="#"><i
                        class="fa-solid fa-building-columns"></i>Nạp tiền</a>
                <ul class="dropdown-list">
                    <li><a href="indexaca8.html?action=recharge-bank"><img width="20px" class="me-2"
                                                                           src="{{asset('assets/img/icon-bank.svg')}}">
                            Ngân hàng</a></li>
                    <li><a href="index88fc.html?action=recharge-momo"><img width="20px" class="me-2"
                                                                           src="{{asset('assets/img/icon-momo.png')}}">
                            Ví MOMO</a></li>
                    <li><a href="index0a44.html?action=recharge-card"><img width="20px" class="me-2"
                                                                           src="{{asset('assets/img/icon-cards.png')}}">
                            Thẻ cào</a>
                    </li>
                    <li><a href="indexbb25.html?action=recharge-crypto"><img width="20px" class="me-2"
                                                                             src="{{asset('assets/img/icon-usdt.svg')}}">
                            Crypto</a>
                    </li>
                    <li><a href="index866c.html?action=recharge-paypal"><img width="20px" class="me-2"
                                                                             src="{{asset('assets/img/icon-paypal.svg')}}">
                            Paypal</a></li>
                    <li><a href="indexc009.html?action=recharge-perfectmoney"><img width="20px" class="me-2"
                                                                                   src="{{asset('assets/img/icon-perfectmoney.svg')}}">
                            Perfect Money</a></li>
                    <li><a href="index3a22.html?action=recharge-toyyibpay"><img width="20px" class="me-2"
                                                                                src="{{asset('assets/img/icon-toyyibpay.jpg')}}">
                            Toyyibpay Malaysia</a></li>
                    <li><a href="index3d9d.html?action=recharge-squadco"><img width="20px" class="me-2"
                                                                              src="{{asset('assets/img/icon-squadco.png')}}">
                            Squadco Nigeria</a></li>
                    <li><a href="client/login.html"><img width="20px"
                                                         class="me-2"
                                                         src="{{asset('assets/storage/images/icon_gatewayK5TD.html')}}">
                            Wise Manual</a></li>
                    <li><a href="client/login.html"><img width="20px"
                                                         class="me-2"
                                                         src="{{asset('assets/storage/images/icon_gatewayZAUG.html')}}">
                            Skrill Manual</a></li>
                </ul>
            </li>

            <li><a class="nav-link" href="client/index.html"><i
                        class="icofont-logout"></i>Đăng Xuất</a></li>
        </ul>
        <div class="nav-info-group">
            <div class="nav-info"><i class="icofont-ui-touch-phone"></i>
                <p><span>0988888XXX</span></p>
            </div>
            <div class="nav-info"><i class="icofont-ui-email"></i>
                <p><span>admin@domain.com</span></p>
            </div>
        </div>
    </div>
</aside>

