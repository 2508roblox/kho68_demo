<?php

    use App\Livewire\OtherProductDetail;
    use App\Livewire\SocialProductDetail;
    use Illuminate\Support\Facades\Route;
    use App\Livewire\Home;
    use App\Livewire\Account;
    use App\Livewire\ChangePassword;
    use App\Livewire\DetailK;
    use App\Livewire\CourseProductDetail;
    use App\Livewire\WordpressProductDetail;
    use App\Livewire\Auth\Login;
    use App\Livewire\Auth\Register;
    use App\Livewire\HistoryOrder;
    use App\Livewire\Transactions;
    use App\Livewire\Auth\Logout;
    use App\Livewire\Cart;
    use App\Livewire\ProductList;
    use App\Http\Livewire\ProductSearch;
    use App\Http\Controllers\MediaController;
    use App\Livewire\Checkout;
    use App\Livewire\CheckPayment;

    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/checkpayment', CheckPayment::class)->name('checkpayment');

    Route::get('/', Home::class)->name('home');
    Route::get('/account', Account::class)->name('account');

    Route::get('/change-password', ChangePassword::class)->name('change-password');

    Route::get('/detail-k', DetailK::class)->name('detail-k');
    Route::get('/course-product-detail/{slug}', CourseProductDetail::class)->name('course-product-detail');
    Route::get('/social-product-detail/{slug}', SocialProductDetail::class)->name('social-product-detail');
    Route::get('/other-product-detail/{slug}', OtherProductDetail::class)->name('other-product-detail');

    Route::get('/wordpress-product-detail/{slug}', WordpressProductDetail::class)->name('wordpress-product-detail');

    Route::get('/login', Login::class)->name('login');

    Route::get('/register', Register::class)->name('register');

    Route::get('/history-order', HistoryOrder::class)->name('history-order');
    Route::get('/transactions', Transactions::class)->name('transactions');

    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');

    Route::get('/cart', Cart::class)->name('cart');
    Route::get('/category/{slug}', ProductList::class)->name('category-products');

    Route::get('/{slug}', ProductList::class)->name('products');
//    Route::get('/{slug}/{course}', CourseProductDetail::class)->name('course');
//    Route::get('/{slug}/{course}/{module}', CourseProductDetail::class)->name('course-module');
//    Route::get('/{slug}/{course}/{module}/{lesson}', CourseProductDetail::class)->name('course-lesson');
//
//    Route::get('/{slug}/{course}/{module}/{lesson}/{lessonDetail}', CourseProductDetail::class)->name('course-lesson-detail');

    Route::get('/search', function () {
        return view('search');
    })->name('search');

