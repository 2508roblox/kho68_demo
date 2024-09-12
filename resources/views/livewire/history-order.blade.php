<div>
    <section class="py-5 inner-section profile-part">
        <div class="container">
            <div class="row content-reverse">
                @include('livewire.partials._sidebar-account')
                <div class="col-lg-9">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="account-card pt-3">
                                <form action="#" method="GET">
                                    <input type="hidden" name="action" value="product-orders">
                                    <div class="row">
                                        <div class="col-lg col-md-4 col-6">
                                            <input class="form-control mb-2" type="hidden"
                                                   value="POyLKf3pegBiV0lGDojThEXrQYH185AqmaRdZxM2nzc7WJ6kUwuCbIS4vstN91710434385bd4511329cdd615a183c9fcd3cc55068"
                                                   id="token">
                                            <input class="form-control mb-2" type="text" value="" name="trans_id"
                                                   placeholder="Mã đơn hàng">
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
                                            <a href="#product-orders/" class="shop-widget-btn mb-2"><i
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
                                                <option value="1000">1000
                                                </option>
                                            </select>
                                        </div>
                                        <div class="filter-short">
                                            <label class="filter-label">Short by Date:</label>
                                            <select name="shortByDate" onchange="this.form.submit()"
                                                    class="form-select filter-select">
                                                <option value="">Tất cả</option>
                                                <option value="1">
                                                    Hôm nay
                                                </option>
                                                <option value="2">
                                                    Tuần này
                                                </option>
                                                <option value="3">
                                                    Tháng này
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-scroll table-wrapper">
                                    <table class="table fs-sm text-nowrap table-hover  mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                <input type="checkbox" class="form-check-input" name="check_all"
                                                       id="check_all_checkbox" value="option1">
                                            </th>
                                            <th class="text-center">Thao tác</th>
                                            <th class="text-center">Mã đơn hàng</th>
                                            <th class="text-center">Sản phẩm</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Thanh toán</th>
                                            <th class="text-center">Ghi chú cá nhân</th>
                                            <th class="text-center">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr style="vertical-align: middle;background-color:#ffd6d6;">
                                            <td class="text-center">
                                            </td>
                                            <td class="text-center">
                                                <strong>Đơn hàng đã bị xóa</strong>
                                            </td>
                                            <td class="text-center">
                                                S6CW66c350a7c1ee3
                                            </td>
                                            <td class="text-center">
                                                <strong><small>Outlook New</small></strong>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge bg-primary">2</span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge bg-danger">200.000đ</span>
                                            </td>
                                            <td class="text-center">
                                                <textarea class="saveNote" rows="1" data-id="101"></textarea>
                                            </td>
                                            <td class="text-center">
                                                <strong data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-bs-original-title="1 tuần trước"><small>2024-08-19
                                                        21:03:20</small></strong>
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: middle;">
                                            <td class="text-center">
                                                <input type="checkbox" class="form-check-input checkbox" data-id="96"
                                                       name="checkbox" value="96">
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-sm" href="#product-order/OQ7Z66b4d8af274db"
                                                   type="button"><i class="fa-solid fa-eye"></i>
                                                    View</a>
                                                <button class="btn btn-primary btn-sm"
                                                        onclick="downloadOrder(`OQ7Z66b4d8af274db`)"><i
                                                        class="fa-solid fa-cloud-arrow-down"></i>
                                                    Download
                                                </button>
                                                <button type="button" onclick="deleteOrder(`96`)"
                                                        class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                OQ7Z66b4d8af274db
                                            </td>
                                            <td class="text-center">
                                                <strong><small>FB Clone Việt 100-200 Bạn bè - CÓ NHIỀU BÀI ĐĂNG</small></strong>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge bg-primary">21</span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge bg-danger">758.743đ</span>
                                            </td>
                                            <td class="text-center">
                                                <textarea class="saveNote" rows="1" data-id="96"></textarea>
                                            </td>
                                            <td class="text-center">
                                                <strong data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-bs-original-title="3 tuần trước"><small>2024-08-08
                                                        21:39:43</small></strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-bs-original-title="Xóa đơn hàng đã chọn khỏi lịch sử của bạn">
                                                    <i class="fa-solid fa-trash"></i> Xóa đơn hàng
                                                </button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="bottom-paginate">
                                    <p class="page-info">Showing 10 of 87 Results</p>
                                    <div class="pagination">
                                        <div class="paging_simple_numbers">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous"><a
                                                        class="page-link active">1</a></li>
                                                <li class="paginate_button page-item previous "><a class="page-link"
                                                                                                   href="#">2</a>
                                                </li>
                                                <li class="paginate_button page-item previous "><a class="page-link"
                                                                                                   href="#">3</a>
                                                </li>
                                                <li class="paginate_button page-item previous disabled"><a
                                                        class="page-link">...</a></li>
                                                <li class="paginate_button page-item previous "><a class="page-link"
                                                                                                   href="#">9</a>
                                                </li>
                                                <li class="paginate_button page-item previous "><a class="page-link"
                                                                                                   href=""><i
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
