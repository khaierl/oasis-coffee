<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('name')
                ->label('Nama Menu')
                ->placeholder('Contoh: Cafe Latte')
                ->required()
                ->maxLength(255),

            Select::make('category')
                ->label('Kategori')
                ->options([
                    'Coffee' => 'Coffee',
                    'Non-Coffee' => 'Non-Coffee',
                    'Pastry' => 'Pastry',
                    'Snack' => 'Snack',
                ])
                ->placeholder('Pilih Kategori')
                ->required()
                ->native(false),

            TextInput::make('price')
                ->label('Harga')
                ->numeric()
                ->prefix('Rp')
                ->placeholder('Contoh: 25000')
                ->required(),

            Textarea::make('description')
                ->label('Deskripsi')
                ->placeholder('Deskripsi menu...')
                ->rows(4)
                ->columnSpanFull(),

            FileUpload::make('image')
                ->label('Foto Menu')
                ->image()
                ->disk('public')
                ->directory('menus')
                ->visibility('public')
                ->imageEditor()
                ->columnSpanFull(),

            Toggle::make('is_available')
                ->label('Tersedia')
                ->default(true),

        ]);
    }
}