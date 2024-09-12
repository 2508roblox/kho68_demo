<div>
    <section class="py-5 inner-section profile-part">
        <div class="container">
            <div class="row content-reverse">
                @include('livewire.partials._sidebar-account')
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="account-card">
                                <h4 class="account-title">Biến động số dư</h4>
                                <form action="" method="GET">
                                    <input type="hidden" name="action" value="transactions">
                                    <div class="row">
                                        <div class="col-lg col-md-4 col-6">
                                            <input class="form-control mb-2" type="text" value="" name="reason"
                                                   placeholder="Lý do">
                                        </div>
                                        <div class="col-lg col-md-4 col-6">
                                            <input type="text" class="js-flatpickr form-control mb-2 flatpickr-input"
                                                   id="example-flatpickr-range" name="time"
                                                   placeholder="Chọn thời gian cần tìm" value="" data-mode="range"
                                                   readonly="readonly">
                                        </div>
                                        <div class="col-lg col-md-4 col-6">
                                            <button class="shop-widget-btn mb-2"><i class="fas fa-search"></i><span>Tìm kiếm</span>
                                            </button>
                                        </div>
                                        <div class="col-lg col-md-4 col-6">
                                            <a href="https://zshopclone7.cmsnt.net/?action=transactions"
                                               class="shop-widget-btn mb-2"><i
                                                    class="far fa-trash-alt"></i><span>Bỏ lọc</span></a>
                                        </div>
                                    </div>
                                    <div class="top-filter">
                                        <div class="filter-show"><label class="filter-label">Show :</label>
                                            <select name="limit" onchange="this.form.submit()"
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
                                        <div class="filter-short">
                                            <label class="filter-label">Short by Date:</label>
                                            <select name="shortByDate" onchange="this.form.submit()"
                                                    class="form-select filter-select">
                                                <option value="">Tất cả</option>
                                                <option value="1">Hôm nay</option>
                                                <option value="2">Tuần này</option>
                                                <option value="3">Tháng này</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-scroll table-wrapper">
                                    <table class="table text-nowrap fs-sm mb-0">
                                        <thead>
                                        <tr>
                                            <th width="20%">Thời gian</th>
                                            <th class="text-center">Số dư ban đầu</th>
                                            <th class="text-center">Số dư thay đổi</th>
                                            <th class="text-center">Số dư hiện tại</th>
                                            <th>Lý do</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>2024-08-19 21:03:19</td>
                                            <td class="text-right"><b style="color: green;">91.273.500đ</b>
                                            </td>
                                            <td class="text-right"><b style="color:red;">200.000đ</b>
                                            </td>
                                            <td class="text-right"><b style="color: blue;">91.073.500đ</b>
                                            </td>
                                            <td><small>Thanh toán đơn hàng mua tài khoản <b>Outlook New</b> -
                                                    #S6CW66c350a7c1ee3</small></td>
                                        </tr>
                                        <tr>
                                            <td>2024-07-05 11:06:55</td>
                                            <td class="text-right"><b style="color: green;">92.648.000đ</b>
                                            </td>
                                            <td class="text-right"><b style="color:red;">36.131đ</b>
                                            </td>
                                            <td class="text-right"><b style="color: blue;">92.611.900đ</b>
                                            </td>
                                            <td><small>Thanh toán đơn hàng mua tài khoản <b>FB Clone Việt 100-200 Bạn bè
                                                        - CÓ NHIỀU BÀI ĐĂNG</b> - #3HE6687715f1310e</small></td>
                                        </tr>
                                        <tr>
                                            <td>2024-07-01 22:51:16</td>
                                            <td class="text-right"><b style="color: green;">92.539.600đ</b>
                                            </td>
                                            <td class="text-right"><b style="color:red;">108.392đ</b>
                                            </td>
                                            <td class="text-right"><b style="color: blue;">92.648.000đ</b>
                                            </td>
                                            <td><small>Hoàn tiền đơn hàng #JPC666b903674f27</small></td>
                                        </tr>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
