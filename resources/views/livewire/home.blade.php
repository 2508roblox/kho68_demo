<section class="section feature-part">
    <div class="container">
        <div class="mb-5"></div>

        {{--             top item --}}
        <div class="row mb-5">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="mb-3" style="text-align: center">
                            <h3>
                                Top items Wordpress bán chạy
                            </h3>
{{--                             <h5>Tổng hợp những sản phẩm bán chạy nhất trong tháng.</h5> --}}
                        </div>
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="prod-item col-sm-6 col-md-3 col-xl-3 mb-3">
                                    <div class="product-box4 ">
                                        <div class="product-head-box4" style="flex-direction: column">
                                            <img src="assets/storage/images/learndash-lms.png"
                                                 style="height: 100%"/>
                                            <h4 style="text-align: center; width: 100%; padding: 0; font-weight: normal">
                                                Plugin mới: LearnDash All-in-One Bundle</h4>
                                        </div>
                                        <div class="product-footer-box4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="price-box4" style="text-align: center">
                                                        <strong>36.131đ</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-buttons-box4">
                                            <a href="/" class="btn more-btn-box4">
                                                <i class="fa-solid fa-circle-info me-1"></i>Xem chi tiết </a>
                                            <button type="button"
                                                    class="btn buy-btn-box4">
                                                <i class="fa-solid fa-cart-shopping me-1"></i>Mua Ngay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <center>
                            <a type="button" href="" class="btn-more-new mb-3">Xem thêm</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        {{--             key phần mềm --}}
        <div class="row mb-5">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="mb-3" style="text-align: center">
                            <h3>
                                Key phần mềm
                            </h3>
                            <h5>Key bán chạy.</h5>
                        </div>
                        <div class="row">
                            @for ($i = 0; $i < 8; $i++)
                                <div class="prod-item col-sm-6 col-md-3 col-xl-3 mb-3"
                                     data-title="FB Clone Việt 100-200 Bạn bè - CÓ NHIỀU BÀI ĐĂNG">
                                    <div class="product-box4 ">
                                        <div class="product-head-box4" style="flex-direction: column">
                                            <img src="assets/storage/images/w10.webp" style="height: 100%"/>
                                            <h4 style="text-align: center; width: 100%; padding: 0; font-weight: normal">
                                                Windows 10 Pro</h4>
                                        </div>
                                        <div class="product-footer-box4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="price-box4" style="text-align: center">
                                                        <strong>36.131đ</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-buttons-box4">
                                            <a href="{{ route('detail-k') }}" class="btn more-btn-box4">
                                                <i class="fa-solid fa-circle-info me-1"></i>Xem chi tiết </a>
                                            <button type="button"
                                                    class="btn buy-btn-box4">
                                                <i class="fa-solid fa-cart-shopping me-1"></i>Mua Ngay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <center>
                            <a type="button" href="" class="btn-more-new mb-3">Xem thêm</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        {{--             khóa học online --}}
        <div class="row mb-5">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="mb-3" style="text-align: center">
                            <h3>
                                Khóa học online
                            </h3>
                            <h5>Khóa học phổ biến</h5>
                        </div>
                        <div class="row">
                            @for ($i = 0; $i < 8; $i++)
                                <div class="prod-item col-sm-6 col-md-3 col-xl-3 mb-3"
                                     data-title="FB Clone Việt 100-200 Bạn bè - CÓ NHIỀU BÀI ĐĂNG">
                                    <div class="product-box4 ">
                                        <div class="product-head-box4" style="flex-direction: column">
                                            <img src="assets/storage/images/capcut.webp" style="height: 100%"/>
                                            <h4 style="text-align: center; width: 100%; padding: 0; font-weight: normal">
                                                Khóa học Capcut PC Mastery cùng Kobe Media</h4>
                                        </div>
                                        <div class="product-footer-box4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="price-box4" style="text-align: center">
                                                        <strong>36.131đ</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-buttons-box4">
                                            <a href="/" class="btn more-btn-box4">
                                                <i class="fa-solid fa-circle-info me-1"></i>Xem chi tiết </a>
                                            <button type="button"
                                                    class="btn buy-btn-box4">
                                                <i class="fa-solid fa-cart-shopping me-1"></i>Mua Ngay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <center>
                            <a type="button" href="" class="btn-more-new mb-3">Xem thêm</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        {{--             Clone Facebook --}}
        <div class="row mb-5">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12 mb-5" id="category15">
                        <div class="home-heading mb-3">
                            <h3>
                                <img src="assets/storage/images/iconTRJC.png">
                                Clone Facebook
                            </h3>
                        </div>
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="prod-item col-sm-6 col-md-3 col-xl-3 mb-3"
                                     data-title="FB Clone Việt 100-200 Bạn bè - CÓ NHIỀU BÀI ĐĂNG">
                                    <div class="product-box4 ">
                                        <div class="product-head-box4">
                                            <img src="assets/storage/images/iconTRJC.png"/>
                                            <h4>FB Clone Việt 100-200 Bạn bè - CÓ NHIỀU BÀI ĐĂNG </h4>
                                        </div>
                                        <div class="product-body-box4">
                                            <p><i class="fa-solid fa-circle-check"></i> FB Clone Việt CÓ NHIỀU BÀI
                                                ĐĂNG
                                            </p>
                                            <p><i class="fa-solid fa-circle-check"></i> Có 100-200 Bạn bè
                                            </p>
                                            <p><i class="fa-solid fa-circle-check"></i> Có 2FA, verify Hotmail
                                            </p>
                                            <p><i class="fa-solid fa-circle-check"></i> Hàng zin chưa qua ADS
                                            </p>
                                            <p><i class="fa-solid fa-circle-check"></i> GAME - BAO TRÂU</p>
                                        </div>

                                        <div class="product-footer-box4">
                                            <div class="row">
                                                <div class="col-4 text-center border-end-box4">
                                                    <strong>Quốc gia</strong>
                                                    <img src="flagcdn.com/w160/vn.png"
                                                         alt="product">
                                                </div>
                                                <div class="col-4 text-center border-end-box4">
                                                    <strong>Hiện có</strong>
                                                    <span
                                                        class="badge bg-primary rounded-pill">77.681</span>
                                                </div>
                                                <div class="col-4">
                                                    <div class="price-box4">
                                                        <strong>36.131đ</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-buttons-box4">
                                            <a href="client/index.html" class="btn more-btn-box4">
                                                <i class="fa-solid fa-circle-info me-1"></i>Xem chi tiết </a>
                                            <button type="button" id="openModal_1357"
                                                    onclick="openModal(``, `1357`)"
                                                    class="btn buy-btn-box4">
                                                <i class="fa-solid fa-cart-shopping me-1"></i>Mua Ngay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <center><a type="button" href="category/clone-facebook.html"
                                   class="btn-more-new mb-3">Xem thêm</a></center>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
