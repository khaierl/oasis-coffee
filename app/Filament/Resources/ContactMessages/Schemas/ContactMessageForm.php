<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Full Name')
                    ->required(),

                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required(),

                TextInput::make('subject')
                    ->label('Subject')
                    ->required(),

                Textarea::make('message')
                    ->label('Message')
                    ->rows(8)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}