<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\UserResource\Pages;
    use App\Filament\Resources\UserResource\RelationManagers;
    use App\Models\User;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Tables\Filters\SelectFilter;
    use Illuminate\Support\Facades\Hash;
    use App\Models\UserDetail;

    class UserResource extends Resource
    {
        protected static ?string $model = User::class;

        protected static ?string $navigationIcon = 'heroicon-o-user';
        protected static ?string $navigationLabel = 'Quản lý người dùng';
        private $record;

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('Tên người dùng'),
                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->email()
                        ->label('Email'),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->label('Mật khẩu')
                        ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                        ->required(fn(Page $livewire) => $livewire instanceof Pages\CreateUser)
                        ->label('Mật khẩu')
                        ->dehydrated(fn($state) => filled($state)),
                    Forms\Components\TextInput::make('phone')
                        ->label('Số điện thoại')
                        ->dehydrateStateUsing(fn($state, $record) => $record->userDetail->phone ?? null),
                    Forms\Components\TextInput::make('fullname')
                        ->label('Họ và tên')
                        ->dehydrateStateUsing(fn($state, $record) => $record->userDetail->fullname ?? null),
                    Forms\Components\Select::make('role')
                        ->options([
                            'customer' => 'Khách hàng',
                            'admin' => 'Quản trị viên',
                        ])
                        ->required()
                        ->label('Vai trò')
                        ->dehydrateStateUsing(fn($state, $record) => $record->userDetail->role ?? null),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    TextColumn::make('name')->label('Tên'),
                    TextColumn::make('email')->label('Email'),
                    TextColumn::make('userDetail.role')->label('Vai trò'),
                    TextColumn::make('created_at')->label('Ngày tạo')->dateTime(),
                ])
                ->filters([
                    //
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
                ]);
        }

        protected function beforeSave($data)
        {
            // Lưu thông tin vào bảng user_details
            if ($this->record->userDetail) {
                $this->record->userDetail->update([
                    'phone' => $data['phone'],
                    'fullname' => $data['fullname'],
                    'role' => $data['role'],
                ]);
            } else {
                // Nếu userDetail không tồn tại thì tạo mới
                UserDetail::create([
                    'user_id' => $this->record->id,
                    'phone' => $data['phone'],
                    'fullname' => $data['fullname'],
                    'role' => $data['role'],
                ]);
            }
        }

        public static function getRelations(): array
        {
            return [
                //
            ];
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListUsers::route('/'),
                'create' => Pages\CreateUser::route('/create'),
                'edit' => Pages\EditUser::route('/{record}/edit'),
            ];
        }
    }
