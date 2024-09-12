<?php

    namespace App\Filament\Resources;

    use Filament\Forms;
    use Filament\Tables;
    use App\Models\Course;
    use Filament\Forms\Set;
    use Filament\Forms\Form;
    use Filament\Tables\Table;
    use Illuminate\Support\Str;
    use Filament\Resources\Resource;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\Section;
    use Filament\Tables\Actions\EditAction;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Forms\Components\TextInput;
    use Filament\Tables\Columns\ImageColumn;

    use Filament\Forms\Components\FileUpload;
    use Filament\Forms\Components\RichEditor;
    use Illuminate\Database\Eloquent\Builder;
    use Filament\Tables\Actions\BulkActionGroup;
    use Filament\Tables\Actions\DeleteBulkAction;
    use App\Filament\Resources\CourseResource\Pages;
    use Illuminate\Database\Eloquent\SoftDeletingScope;
    use App\Filament\Resources\CourseResource\Pages\EditCourse;
    use App\Filament\Resources\CourseResource\RelationManagers;
    use App\Filament\Resources\CourseResource\Pages\ListCourses;
    use App\Filament\Resources\CourseResource\Pages\CreateCourse;
    use Filament\Forms\Components\Grid;

    class CourseResource extends Resource
    {
        protected static ?string $model = Course::class;

        protected static ?string $navigationLabel = 'Khóa học';
        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        protected static ?string $navigationGroup = 'Quản lý khóa học';

        public static function form(Form $form): Form
        {
            return $form->schema([
                Section::make('Thông tin khóa học')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Tên khóa học')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($state, Set $set) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->unique(Course::class, 'slug', ignoreRecord: true)
                                    ->required()
                                    ->disabled()
                                    ->dehydrated(),
                                Select::make('category_id')
                                    ->label('Danh mục')
                                    ->relationship('category', 'name') // Liên kết với bảng categories qua trường 'name'
                                    ->required(),
                            ]),

                        FileUpload::make('image')
                            ->label('Ảnh đại diện')
                            ->image()
                            ->directory('courses')
                            ->nullable(),

                        RichEditor::make('short_description')
                            ->label('Mô tả ngắn')
                            ->nullable(),

                        RichEditor::make('long_description')
                            ->label('Mô tả chi tiết')
                            ->nullable(),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('price')
                                    ->label('Giá')
                                    ->numeric()
                                    ->prefix('VND'),

                                TextInput::make('sale_price')
                                    ->label('Giá khuyến mãi')
                                    ->numeric()
                                    ->prefix('VND')
                                    ->nullable(),
                            ]),

                        TextInput::make('instructor')
                            ->label('Giảng viên')
                            ->nullable(),

                        TextInput::make('duration')
                            ->label('Thời lượng (phút)')
                            ->numeric()
                            ->nullable(),

                        TextInput::make('level')
                            ->label('Cấp độ khóa học')
                            ->nullable(),

                        Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'active' => 'Hoạt động',
                                'inactive' => 'Không hoạt động',
                                'draft' => 'Bản nháp',
                            ])
                            ->default('draft'),
                    ]),
            ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('category_id')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('title')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('slug')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('price')
                        ->money()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('sale_price')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\ImageColumn::make('image'),
                    Tables\Columns\TextColumn::make('instructor')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('duration')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('level')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('video_count')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('download_link')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('video_url')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('views')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('status'),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
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
                'index' => Pages\ListCourses::route('/'),
                'create' => Pages\CreateCourse::route('/create'),
                'edit' => Pages\EditCourse::route('/{record}/edit'),
            ];
        }
    }
