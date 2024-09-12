<section class="section feature-part">
    <div class="container">
        <div class="mb-5"></div>

        {{-- Danh sách sản phẩm theo danh mục --}}
        <div class="row mb-5">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="mb-3" style="text-align: center">
                            <h3>
                                Danh sách sản phẩm thuộc danh mục: {{ $categoryName }}
                            </h3>
                            <h5>Các sản phẩm hiện có trong danh mục này.</h5>
                        </div>

                        {{-- Social Accounts --}}
                        @if(!collect($socialAccounts)->isEmpty())
                            <h2 class="text-center">Tài khoản xã hội</h2>
                            <div class="row">
                                @foreach($socialAccounts as $socialAccount)
                                    @foreach($socialAccount->products as $product)
                                        <div class="prod-item col-sm-6 col-md-3 col-xl-3 mb-3">
                                            <div class="product-box4 ">
                                                <div class="product-head-box4" style="flex-direction: column">
                                                    <img src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->name }}" style="height: 100%">
                                                    <h4 style="text-align: center; width: 100%; padding: 0; font-weight: normal">
                                                        {{ $product->name }}
                                                    </h4>
                                                </div>
                                                <div class="product-footer-box4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="price-box4" style="text-align: center">
                                                                <strong>{{ $product->price }} VND</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-buttons-box4">
                                                    <a href="{{ route('social-product-detail', ['slug' => $product->slug]) }}" class="btn more-btn-box4">

                                                        <i class="fa-solid fa-circle-info me-1"></i>Xem chi tiết
                                                    </a>
                                                    <button type="button" class="btn buy-btn-box4">
                                                        <i class="fa-solid fa-cart-shopping me-1"></i>Mua Ngay
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif

                        {{-- Courses --}}
                        @if(!collect($courses)->isEmpty())
                            <h2 class="text-center">Khóa học</h2>
                            <div class="row">
                                @foreach($courses as $course)
                                    <div class="prod-item col-sm-6 col-md-3 col-xl-3 mb-3">
                                        <div class="product-box4 ">
                                            <div class="product-head-box4" style="flex-direction: column">
                                                <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" style="height: 100%">
                                                <h4 style="text-align: center; width: 100%; padding: 0; font-weight: normal">
                                                    {{ $course->title }}
                                                </h4>
                                            </div>
                                            <div class="product-footer-box4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="price-box4" style="text-align: center">
                                                            <strong>{{ $course->price }} VND</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-buttons-box4">
                                                <a href="{{ route('course-product-detail', ['slug' => $course->slug]) }}" class="btn more-btn-box4">
                                                    <i class="fa-solid fa-circle-info me-1"></i>Xem chi tiết
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Other Products --}}
                        @if(!collect($otherProducts)->isEmpty())
                            <h2 class="text-center">Sản phẩm khác</h2>
                            <div class="row">
                                @foreach($otherProducts as $product)
                                    <div class="prod-item col-sm-6 col-md-3 col-xl-3 mb-3">
                                        <div class="product-box4 ">
                                            <div class="product-head-box4" style="flex-direction: column">
                                                <img src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->name }}" style="height: 100%">
                                                <h4 style="text-align: center; width: 100%; padding: 0; font-weight: normal">
                                                    {{ $product->name }}
                                                </h4>
                                            </div>
                                            <div class="product-footer-box4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="price-box4" style="text-align: center">
                                                            <strong>{{ $product->price }} VND</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-buttons-box4">
                                                <a href="{{ route('other-product-detail', ['slug' => $product->slug]) }}" class="btn more-btn-box4">
                                                    <i class="fa-solid fa-circle-info me-1"></i>Xem chi tiết
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Wordpress Products --}}
                        @if(!collect($wordpressProducts)->isEmpty())
                            <h2 class="text-center">Sản phẩm Wordpress</h2>
                            <div class="row">
                                @foreach($wordpressProducts as $product)
                                    <div class="prod-item col-sm-6 col-md-3 col-xl-3 mb-3">
                                        <div class="product-box4 ">
                                            <div class="product-head-box4" style="flex-direction: column">
                                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="height: 100%">
                                                <h4 style="text-align: center; width: 100%; padding: 0; font-weight: normal">
                                                    {{ $product->name }}
                                                </h4>
                                            </div>
                                            <div class="product-footer-box4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="price-box4" style="text-align: center">
                                                            <strong>{{ $product->price }} VND</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-buttons-box4">
                                                 <a href="{{ route('wordpress-product-detail', ['slug' => $product->slug]) }}" class="btn more-btn-box4">
                                                     <i class="fa-solid fa-circle-info me-1"></i>Xem chi tiết
                                                 </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <center>
                            <a type="button" href="" class="btn-more-new mb-3">Xem thêm</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
