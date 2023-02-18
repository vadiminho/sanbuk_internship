<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\AvatarProviders\Contracts\AvatarProvider;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                SpatieMediaLibraryImageColumn::make('avatar')->circular(),
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
                TextColumn::make('email'),
                BadgeColumn::make('status')->enum(User::STATUS_LIST)->colors([
                    'danger' => User::STATUS_INACTIVE,
                    'success' => User::STATUS_ACTIVE,
                ]),
                BadgeColumn::make('type')->enum(User::TYPE_LIST),
                TextColumn::make('password'),
            ])
            ->filters([
                //
            ]);
    }
}
