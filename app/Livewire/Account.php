<?php

    namespace App\Livewire;

    use Illuminate\Support\Facades\Auth;
    use Livewire\Component;
    use Illuminate\Support\Facades\DB;
    use App\Models\User;
    use App\Models\UserDetail;

    class Account extends Component
    {
        public $phone;
        public $fullname;

        public function mount()
        {
            $user = auth()->user();

            // Kiểm tra nếu userDetail tồn tại
            if ($user && $user->userDetail) {
                $this->phone = $user->userDetail->phone;
                $this->fullname = $user->userDetail->fullname;
            } else {
                // Nếu userDetail không tồn tại, đặt các giá trị mặc định
                $this->phone = '';
                $this->fullname = '';
            }

            if (!Auth::check()) {
                return redirect()->route('login');
            }
        }

        public function saveChanges()
        {
            $user = auth()->user();

            // Kiểm tra nếu userDetail tồn tại trước khi cập nhật
            if ($user && $user->userDetail) {
                $user->userDetail->update([
                    'phone' => $this->phone,
                    'fullname' => $this->fullname,
                ]);

                session()->flash('message', 'Thông tin đã được cập nhật thành công.');
            } else {
                // Xử lý nếu userDetail không tồn tại (tạo mới hoặc thông báo lỗi)
                session()->flash('error', 'Thông tin người dùng không tồn tại.');
            }
        }

        public function render()
        {
            return view('livewire.account');
        }
    }
