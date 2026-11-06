<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->default('Contact Us')
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),

                TextInput::make('address')
                    ->label('Alamat')
                    ->placeholder('Alamat Oasis\' Coffee')
                    ->columnSpanFull(),

                TextInput::make('email')
                    ->label('Email')
                    ->email(),

                TextInput::make('phone')
                    ->label('Nomor Telepon'),

                TextInput::make('instagram')
                    ->label('Instagram')
                    ->placeholder('@oasiscoffee'),

                TextInput::make('facebook')
                    ->label('Facebook'),

                TextInput::make('whatsapp')
                    ->label('WhatsApp'),
            ]);
    }
}