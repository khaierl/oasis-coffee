<?php

namespace App\Filament\Resources\Abouts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->label('Label')
                    ->default('ABOUT US')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title')
                    ->label('Judul')
                    ->placeholder('More Than Just Coffee')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->placeholder('Tulis deskripsi tentang Oasis\' Coffee...')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Foto About')
                    ->image()
                    ->directory('about')
                    ->columnSpanFull(),

                TextInput::make('button_text')
                    ->label('Teks Tombol')
                    ->default('Learn More')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}