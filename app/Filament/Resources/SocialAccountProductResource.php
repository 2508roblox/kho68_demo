<?php

    namespace App\Filament\Resources;

    use Filament\Forms;
    use Filament\Forms\Components\MultiSelect;
    use Filament\Tables;
    use Filament\Forms\Form;
    use Filament\Tables\Table;
    use Filament\Resources\Resource;
    use App\Models\SocialAccountProduct;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\Repeater;
    use Filament\Forms\Components\Textarea;
    use Filament\Tables\Actions\EditAction;
    use Filament\Forms\Components\TextInput;
    use Illuminate\Database\Eloquent\Builder;
    use Filament\Tables\Actions\BulkActionGroup;
    use Filament\Tables\Actions\DeleteBulkAction;
    use Illuminate\Database\Eloquent\SoftDeletingScope;
    use App\Filament\Resources\SocialAccountProductResource\Pages;
    use App\Filament\Resources\SocialAccountProductResource\RelationManagers;
    use App\Filament\Resources\SocialAccountProductResource\Pages\EditSocialAccountProduct;
    use App\Filament\Resources\SocialAccountProductResource\Pages\ListSocialAccountProducts;
    use App\Filament\Resources\SocialAccountProductResource\Pages\CreateSocialAccountProduct;
    use Filament\Forms\Set;
    use Illuminate\Support\Str;

    // Sử dụng để tạo slug từ name
    use Filament\Forms\Components\Card;
    use Filament\Forms\Components\FileUpload;
    use Filament\Forms\Components\Section;
    use Filament\Forms\Components\Grid;
    use Filament\Forms\Components\RichEditor;
    use Filament\Forms\Components\Tabs;
    use Filament\Forms\Components\Tab;

    class SocialAccountProductResource extends Resource
    {
        protected static ?string $model = SocialAccountProduct::class;

        protected static ?string $navigationIcon = 'heroicon-o-document-text';
        // Thay đổi tên và icon
        protected static ?string $label = 'Sản phẩm tài khoản xã hội';
        protected static ?string $pluralLabel = 'Sản phẩm tài khoản xã hội';

        protected static ?string $navigationLabel = 'Sản phẩm tài khoản';
        protected static ?string $navigationGroup = 'Tài khoản';

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    // Section for basic information
                    Section::make('Thông tin cơ bản')
                        ->schema([
                            Grid::make(2) // 2 columns layout
                            ->schema([
                                TextInput::make('name')
                                    ->label('Tên sản phẩm')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        fn(string $operation, $state, Set $set) => true ? $set('slug', Str::slug($state)) : null,
                                    ),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->unique(SocialAccountProduct::class, 'slug', ignoreRecord: true)
                                    ->required()
                                    ->disabled() // Người dùng không chỉnh sửa trực tiếp
                                    ->dehydrated(),

                                Select::make('category')
                                    ->label('Danh mục')
                                    ->relationship('category', 'name')
                                    ->required(),
                            ]),

                            FileUpload::make('thumbnail')
                                ->label('Ảnh đại diện')
                                ->image()
                                ->directory('Social')
                                ->nullable()
                                ->rules('mimes:jpeg,jpg,png,gif,webp,svg'),
                        ]),

                    // Section for inventory
                    Section::make('Quản lý kho')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('stock')
                                        ->label('Tồn kho')
                                        ->numeric()
                                        ->default(0),

                                    TextInput::make('sold')
                                        ->label('Đã bán')
                                        ->numeric()
                                        ->default(0),
                                ]),
                        ]),

                    // Section for pricing and content
                    Section::make('Giá và Nội dung')
                        ->schema([
                            TextInput::make('price')
                                ->prefix('vnd')
                                ->label('Giá sản phẩm')
                                ->numeric()
                                ->nullable(),

                            RichEditor::make('short_content')
                                ->label('Mô tả ngắn gọn')
                                ->nullable(),

                            RichEditor::make('long_content')
                                ->label('Mô tả chi tiết')
                                ->nullable(),
                        ]),

                    // Section for account data
                    Section::make('Dữ liệu tài khoản')
                        ->schema([
                            TextInput::make('data_account')
                                ->label('Dữ liệu tài khoản')
                                ->nullable(),

                            Select::make('social_account_id')
                                ->label('Tài khoản xã hội')
                                ->relationship('socialAccount', 'name')
                                ->required(),
                        ]),

                    // Section for attributes
                    Section::make('Thuộc tính sản phẩm')
                        ->schema([
                            Repeater::make('attributes')
                                ->relationship('attributes') // Liên kết với model SocialAccountProductAttribute
                                ->label('Thuộc tính sản phẩm')
                                ->schema([
                                    TextInput::make('attribute_name')
                                        ->label('Tên thuộc tính')
                                        ->required(),

                                    TextInput::make('additional_price')
                                        ->label('Giá bán')
                                        ->prefix('vnd')
                                        ->numeric()
                                        ->default(0),
                                        TextInput::make('quantity')
                                        ->label('Tồn kho')
                                        ->numeric()
                                        ->default(0),

                                ])
                                ->columns(2)
                                ->createItemButtonLabel('Thêm thuộc tính'),
                        ]),
                ]);

        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\ImageColumn::make('thumbnail')
                        ->label('Ảnh địa diện')
                        ->toggleable()
                        ->url(fn(SocialAccountProduct $record) => $record->getFirstMediaUrl('Social'))
                        ->openUrlInNewTab()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('name')
                        ->label('Tên')
                        ->searchable()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('price')
                        ->label('Giá')
                        ->money('vnd')
                        ->sortable(),

                    Tables\Columns\TextColumn::make('stock')
                        ->label('Kho')
                        ->toggleable()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('sold')
                        ->label('Đã bán')
                        ->toggleable()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('social_account.name')
                        ->label('Tài khoản xã hội')
                        ->toggleable()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('category.name')
                        ->label('Danh mục')
                        ->sortable()
                        ->toggleable(),

                    Tables\Columns\TextColumn::make('status')
                        ->label('Trạng thái')
                        ->toggleable()
                        ->sortable(),
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
                'index' => Pages\ListSocialAccountProducts::route('/'),
                'create' => Pages\CreateSocialAccountProduct::route('/create'),
                'edit' => Pages\EditSocialAccountProduct::route('/{record}/edit'),
            ];
        }
    }
