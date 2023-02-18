<?php

namespace App\Filament\Resources\ExperienceResource\Pages;

use App\Filament\Resources\ExperienceResource;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;

class CreateExperience extends CreateRecord
{
    protected static string $resource = ExperienceResource::class;

    protected function form(Form $form): Form
    {
        return $form->schema([
            Select::make('vendor_id')->options(User::where('type', User::TYPE_VENDOR)
                ->pluck('first_name', 'id')
                ->toArray())
                ->required(),
            TextInput::make('name')->required(),
            Textarea::make('description')
                ->rows(10)
                ->cols(20)
                ->required(),
            SpatieMediaLibraryFileUpload::make('photo_gallery')
                ->multiple(),
        ]);
    }
}
