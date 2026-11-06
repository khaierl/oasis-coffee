<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->placeholder('Nama anggota team')
                    ->required()
                    ->maxLength(255),

                TextInput::make('role')
                    ->label('Jabatan / Posisi')
                    ->placeholder('Contoh: Barista')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Foto Team')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('team')
                    ->visibility('public')
                    ->columnSpanFull(),
            ]);
    }
}