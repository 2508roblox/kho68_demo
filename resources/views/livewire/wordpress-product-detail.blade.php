<div>
    <section class="inner-section" style="margin: 40px 0 40px 0;">
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
                                            src="{{ Storage::url($product->image) }}"
                                            alt="{{ $product->name }}"></li>
                                </div>
                            </div>
                        </ul>
                        @if($product->gallery)
                            <ul class="details-thumb slick-initialized slick-slider">
                                <div class="slick-list draggable">
                                    <div class="slick-track"
                                         style="opacity: 1; width: 74px; transform: translate3d(0px, 0px, 0px);">
                                        @foreach($product->gallery as $image)
                                            <li class="slick-slide slick-current slick-active" data-slick-index="0"
                                                aria-hidden="false" style="width: 58px;" tabindex="0">
                                                <img
                                                    src="{{ Storage::url($image) }}"
                                                    alt="Gallery Image">
                                            </li>
                                        @endforeach
                                    </div>
                                </div>
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="col-lg-8" id="col2">
                    <div class="details-content">
                        <h3 class="details-name">{{ $product->name }}</h3>
                        <h3 class="details-price">
                            <span>{{ number_format($product->price) }} VND</span>
                        </h3>
                        <p class="details-desc">
                            Phiên bản: {{ $product->version }}
                            {{--                                 <br>Changelog Xem ngay --}}
                            <br>Ngày cập nhật: {{ $product->updated_at->format('d/m/Y') }}
                        </p>
                        <div class="details-list-group"><label class="details-list-title">Share:</label>
                            <ul class="details-share-list">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}"
                                       title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url=https://zshopclone7.cmsnt.net/product/fb-clone-viet-100-200-ban-be-co-nhieu-bai-dang"
                                       title="Twitter"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                                <li>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://zshopclone7.cmsnt.net/product/fb-clone-viet-100-200-ban-be-co-nhieu-bai-dang"
                                       title="Linkedin"><i class="fa-brands fa-linkedin"></i></a></li>
                                <li>
                                    <a href="https://www.instagram.com/?url=https://zshopclone7.cmsnt.net/product/fb-clone-viet-100-200-ban-be-co-nhieu-bai-dang"
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
                                    <div class="col-lg-6">
                                        <button wire:click="addToCart" class="btn-more">
                                            <span>Thêm vào giỏ hàng</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade show active" id="tab-desc">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <div>
                                <div>
                                    {!! $product->long_content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <script>
        window.addEventListener('show-alert', event => {
            alert(event.detail.message);
        });
    </script>

</div>
