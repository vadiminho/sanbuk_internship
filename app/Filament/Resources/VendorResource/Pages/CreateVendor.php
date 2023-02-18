<?php

namespace App\Filament\Resources\VendorResource\Pages;

use App\Filament\Resources\VendorResource;
use App\Models\User;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateVendor extends CreateRecord
{
    protected static string $resource = VendorResource::class;

    protected function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('first_name')
                ->minLength(2)
                ->maxLength(255)
                ->placeholder('John')
                ->required(),
            TextInput::make('last_name')
                ->minLength(2)
                ->maxLength(255)
                ->placeholder('Doe')
                ->required(),
            TextInput::make('email')
                ->minLength(5)
                ->maxLength(255)
                ->placeholder('vadiminho@gmail.com')
                ->unique(ignorable: fn($record) => $record)
                ->required(),
            Select::make('status')
                ->options(User::STATUS_LIST)
                ->required(),
            SpatieMediaLibraryFileUpload::make('avatar')->avatar()
                ->enableOpen()->enableDownload()
                ->imageResizeTargetWidth('300')
                ->imageResizeTargetHeight('300'),
            TextInput::make('password')
                ->minLength(5)
                ->maxLength(255)
                ->dehydrateStateUsing(fn($state) => Hash::make($state))
                ->password()
                ->required(),
            Hidden::make('type')->default(User::TYPE_VENDOR),
        ]);
    }
}
