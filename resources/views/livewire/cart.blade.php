<div>
    <section class="py-5 inner-section profile-part">
        <div class="container">
            <div class="row content-reverse">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="account-card">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">{{ session('message') }}</div>
                                @endif
                                <h4 class="account-title">Giỏ hàng</h4>
                                <form action="" method="GET">
                                    <div class="top-filter">
                                        <div class="filter-show">
                                            <label class="filter-label">Hiển thị :</label>
                                            <select name="limit"
                                                    class="form-select filter-select">
                                                <option value="5">5</option>
                                                <option selected="" value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="500">500</option>
                                                <option value="1000">1000</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                @if($cart)
                                    <p><strong>Tổng tiền: {{ number_format($cart->total) }} VND</strong></p>
                                @else
                                    <p><strong>Giỏ hàng rỗng</strong></p>
                                @endif
                                <div class="table-scroll table-wrapper">
                                    <table class="table text-nowrap fs-sm mb-0">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th class="text-center">Giá tiền</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Tổng tiền</th>
                                            <th width="20%">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cartItems as $item)
                                            <tr>
                                                <td>
                                                    @if($item->type === 'wordpress')
                                                        {{ $item->product->name }}
                                                    @elseif($item->type === 'course')
                                                        {{ $item->product->title }}
                                                    @elseif($item->type === 'social')
                                                        {{ $item->product->name }}
                                                    @elseif($item->type === 'other')
                                                        {{ $item->product->name }}
                                                    @else
                                                        Không rõ sản phẩm
                                                    @endif
                                                </td>
                                                <td>{{ number_format($item->price) }} VND</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->quantity * $item->price) }} VND</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bottom-paginate">
                                    <p class="page-info">Showing 10 of 149 Results</p>
                                    <div class="pagination">
                                        <div class="paging_simple_numbers">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous"><a
                                                        class="page-link active">1</a></li>
                                                <li class="paginate_button page-item previous "><a class="page-link"
                                                                                                   href="https://zshopclone7.cmsnt.net/?action=transactions&amp;limit=10&amp;shortByDate=&amp;reason=&amp;time=&amp;page=2">2</a>
                                                </li>
                                                <li class="paginate_button page-item previous "><a class="page-link"
                                                                                                   href="https://zshopclone7.cmsnt.net/?action=transactions&amp;limit=10&amp;shortByDate=&amp;reason=&amp;time=&amp;page=3">3</a>
                                                </li>
                                                <li class="paginate_button page-item previous disabled"><a
                                                        class="page-link">...</a></li>
                                                <li class="paginate_button page-item previous "><a class="page-link"
                                                                                                   href="https://zshopclone7.cmsnt.net/?action=transactions&amp;limit=10&amp;shortByDate=&amp;reason=&amp;time=&amp;page=15">15</a>
                                                </li>
                                                <li class="paginate_button page-item previous "><a class="page-link"
                                                                                                   href="https://zshopclone7.cmsnt.net/?action=transactions&amp;limit=10&amp;shortByDate=&amp;reason=&amp;time=&amp;page=2"><i
                                                            class="fas fa-long-arrow-alt-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('checkout') }}" class="btn btn-primary">
                                            Thanh toán
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    const originalQP = document.getElementById('quantity-product').value;
    function checkChanges() {
        const currentQP = document.getElementById('quantity-product').value;
        if (currentQP !== originalQP) {
            document.querySelector('.product-item-save').style.display = '';
        } else {
            document.querySelector('.product-item-save').style.display = 'none';
        }
    }
</script>
