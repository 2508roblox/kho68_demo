<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialAccountResource\Pages;
use App\Models\Category;
use App\Models\SocialAccount;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class SocialAccountResource extends Resource
{
    protected static ?string $model = SocialAccount::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; // Cập nhật icon
    protected static ?string $label = 'Tài khoản xã hội';
    protected static ?string $pluralLabel = 'Tài khoản xã hội';
    protected static ?string $navigationLabel = 'Loại Tài khoản';
    protected static ?string $navigationGroup = 'Tài khoản';
    public static function form(Form $form): Form
    {

    return $form
    ->schema([
        Section::make('Thông tin tài khoản xã hội') // Section chứa các thông tin cơ bản
            ->description('Điền thông tin về tài khoản xã hội và slug tự động tạo')
            ->schema([

                Grid::make(2) // Chia bố cục thành 2 cột
                    ->schema([

                        // Trường nhập tên tài khoản
                        TextInput::make('name')
                            ->label('Tên tài khoản xã hội')
                            ->required()
                            ->live(onBlur: true) // Kích hoạt sự kiện khi rời khỏi trường
                            ->afterStateUpdated(
                                fn (string $operation, $state, Set $set) => true ? $set('slug', Str::slug($state)) : null, // Tạo slug tự động
                            ),

                        // Trường slug tự động được tạo
                        TextInput::make('slug')
                            ->label('Slug')
                            ->disabled() // Không cho người dùng sửa slug
                            ->dehydrated() // Đảm bảo slug được lưu vào cơ sở dữ liệu
                            ->required()
                            ->unique(SocialAccount::class, 'slug', ignoreRecord: true), // Đảm bảo slug là duy nhất
                    ]),

                // Thêm trường select để chọn danh mục
                Select::make('category_id')
                    ->label('Danh mục')
                    ->options(Category::all()->pluck('name', 'id')) // Lấy tất cả các danh mục từ bảng categories
                    ->searchable() // Thêm chức năng tìm kiếm
                    ->required() // Bắt buộc phải chọn một danh mục
                    ->label('Chọn danh mục') // Nhãn của trường select
            ]),
    ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên tài khoản')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable(),


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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialAccounts::route('/'),
            'create' => Pages\CreateSocialAccount::route('/create'),
            'edit' => Pages\EditSocialAccount::route('/{record}/edit'),
        ];
    }
}
