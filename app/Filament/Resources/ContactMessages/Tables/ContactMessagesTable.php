<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('subject')
                    ->label('Subject')
                    ->searchable(),

                TextColumn::make('message')
                    ->label('Message')
                    ->limit(60),

                TextColumn::make('created_at')
                    ->label('Dikirim')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Lihat'),

                DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}