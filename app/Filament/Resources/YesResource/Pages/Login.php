<?php

namespace App\Filament\Resources\YesResource\Pages;

use App\Filament\Resources\YesResource;
use Filament\Resources\Pages\Page;

class Login extends Page
{
    protected static string $resource = YesResource::class;

    protected static string $view = 'filament.resources.yes-resource.pages.login';
}
