<div>
    <section class="py-5 inner-section">
        <div class="container">
            <h2>Thông tin thanh toán</h2>
            <div class="row">
                <div class="col-12">
                    <h4>Tổng tiền: {{ number_format($total) }} VND</h4>
                    <form wire:submit.prevent="submitOrder">
                        <div class="form-group">
                            <label for="paymentMethod">Phương thức thanh toán</label>
                            <select wire:model="paymentMethod" id="paymentMethod" class="form-control">
                                <option value="vnpay">Thanh toán qua VNPAY</option>
                                <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Xác nhận thanh toán</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
