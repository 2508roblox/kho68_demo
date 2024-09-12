<div>
    <section class="inner-section" style="margin:40px 0 40px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" id="col1" style="margin-bottom:20px;">
                    <div class="details-gallery mb-1">
                        <ul class="details-preview slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 369px;">
                                    <li class="slick-slide slick-current slick-active" data-slick-index="0"
                                        aria-hidden="false"
                                        style="width: 369px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                        tabindex="0"><img
                                            src="{{ $course->image ? asset('storage/' . $course->image) : 'default-image.jpg' }}"
                                            alt="product"></li>
                                </div>
                            </div>
                        </ul>
                        <ul class="details-thumb slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                <div class="slick-track"
                                     style="opacity: 1; width: 74px; transform: translate3d(0px, 0px, 0px);">
                                    <li class="slick-slide slick-current slick-active" data-slick-index="0"
                                        aria-hidden="false" style="width: 58px;" tabindex="0"><img
                                            src="{{ $course->image ? asset('storage/' . $course->image) : 'default-thumbnail.jpg' }}"
                                            alt="product"></li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8" id="col2">
                    <div class="details-content">
                        <h3 class="details-name">{{ $course->title }}</h3>
                        <div class="details-meta">
                            <p>
                                <label class="label-text order">Thời gian: <strong>{{ $course->duration }} giờ</strong></label>
                            </p>
                        </div>
                        <h3 class="details-price">
                            @if ($course->sale_price && $course->sale_price > 0)
                                <span class="sale-price">{{ number_format($course->sale_price, 0, ',', '.') }}đ</span>
                                <span class="original-price">{{ number_format($course->price, 0, ',', '.') }}đ</span>
                            @else
                                <span>{{ number_format($course->price, 0, ',', '.') }}đ</span>
                            @endif
                        </h3>
                        <style>
                            .sale-price {
    color: red;
    font-weight: bold;
}

.original-price {
    text-decoration: line-through;
    color: grey !important;
}

                        </style>
                        <p class="details-desc">
                            {!! $course->short_description !!}
                        </p>
                        <div class="details-list-group"><label class="details-list-title">Share:</label>
                            <ul class="details-share-list">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                       title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"
                                       title="Twitter"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                                <li>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                                       title="Linkedin"><i class="fa-brands fa-linkedin"></i></a></li>
                                <li>
                                    <a href="https://www.instagram.com/?url={{ url()->current() }}"
                                       title="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn-buy mb-2"><i class="fa-solid fa-cart-shopping"></i>
                                        MUA NGAY
                                    </button>
                                </div>
                                <div class="col-lg-6">
{{--                                     <a class="btn-more" href="" type="button"> --}}
{{--                                         <span>Thêm vào giỏ hàng</span></a> --}}
                                    <button wire:click="addToCart" class="btn-more">
                                        <span>Thêm vào giỏ hàng</span>
                                    </button>



                                </div>
                            </div>
                        </div>
                        @if (session()->has('message'))
                        <div style="color: rgb(3, 185, 3)" id="popup-message" class="popup-message">
                            {{ session('message') }}
                        </div>

                        <script>
                            // Sau 3 giây, thêm class "hide" để ẩn thông báo
                            setTimeout(function() {
                                var popup = document.getElementById('popup-message');
                                if (popup) {
                                    popup.classList.add('hide');
                                }
                            }, 3000); // 3000ms = 3 giây

                            // Ẩn hoàn toàn thông báo khỏi DOM sau khi nó đã mờ đi
                            setTimeout(function() {
                                var popup = document.getElementById('popup-message');
                                if (popup) {
                                    popup.remove();
                                }
                            }, 3500); // Đợi thêm 500ms sau khi ẩn để xóa khỏi DOM
                        </script>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">Chi tiết</a></li>
                        <li><a href="#tab-content" class="tab-link" data-bs-toggle="tab">Nội dung</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade show active" id="tab-desc">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <div>
                                {!! $course->long_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <div class="container mt-3">
                                <div id="accordion">
                                    @foreach($course->modules as $module)
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="btn" data-bs-toggle="collapse" href="#collapse{{ $module->id }}">
                                                    {!! $module->title !!}
                                                </a>
                                            </div>
                                            <div id="collapse{{ $module->id }}" class="collapse" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    {!! $module->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>
