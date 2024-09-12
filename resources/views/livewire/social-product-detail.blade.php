<div style="margin: 50px 0 0 0">
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" id="col1" style="margin-bottom:20px;">
                    <div class="details-gallery mb-1">
                        <ul class="details-preview slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                <div class="slick-track">
                                    <li class="slick-slide slick-current slick-active">
                                        <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}">
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8" id="col2">
                    <div class="details-content">
                        <h3 class="details-name">{{ $product->name }}</h3>
                        <div class="details-meta">
                            <p>
                                <label class="label-text order">Tình trạng: <strong>{{ $stock > 0 ? 'Còn hàng' : 'Hết hàng' }}</strong></label>
                            </p>
                        </div>
                        <h3 class="details-price">
                            <span>{{ number_format($price, 0, ',', '.') }}đ</span>
                        </h3>
                        <p>Số lượng còn lại: <strong>{{ $attributeQuantity }}</strong></p> <!-- Hiển thị số lượng của attribute đã chọn -->

                        <p class="details-desc">
                            {!! $product->short_content !!}
                        </p>

                        @if ($product->attributes->isNotEmpty())
                        <div class="card">
                            <div class="card-header">
                                <h5>Danh sách tùy chọn  </h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group attribute-list">
                                    @foreach ($product->attributes as $attribute)
                                        <li class="list-group-item attribute-item d-flex justify-content-between align-items-center
                                            @if($selectedAttributeId === $attribute->id) selected @endif"
                                            wire:click="setSelectedAttribute({{ $attribute->id }})">
                                            <span class="attribute-name">{{ $attribute->attribute_name }}</span>
                                            <span class="badge badge-primary badge-pill attribute-price">

                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                <button class="btn-buy mb-2"
                                    @if($selectedAttributeId === null || $stock <= 0) disabled @endif>
                                    <i class="fa-solid fa-cart-shopping"></i> MUA NGAY
                                </button>
                            </div>
                            <div class="col-lg-6">
                                <button wire:click="addToCart" class="btn-more"
                                    @if($selectedAttributeId === null || $stock <= 0) disabled @endif>
                                    <span>Thêm vào giỏ hàng</span>
                                </button>
                            </div>
                        </div>

                        @if (session()->has('message'))
                        <div style="color: rgb(3, 185, 3)" id="popup-message" class="popup-message">
                            {{ session('message') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                var popup = document.getElementById('popup-message');
                                if (popup) {
                                    popup.classList.add('hide');
                                }
                            }, 3000);
                            setTimeout(function() {
                                var popup = document.getElementById('popup-message');
                                if (popup) {
                                    popup.remove();
                                }
                            }, 3500);
                        </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .attribute-item {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.attribute-item:hover {
    background-color: #e9ecef;
    transform: translateY(-2px);
}

.attribute-item.selected {
    background-color: #28a745;
    color: white;
    border-color: #28a745;
    transform: scale(1.02); /* Thêm hiệu ứng zoom nhỏ để dễ thấy */
    transition: transform 0.2s ease, background-color 0.2s ease;
}

    </style>
</div>
