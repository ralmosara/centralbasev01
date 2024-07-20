<?php

namespace App\Filament\Pages;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Components\TextInput;

class Login extends BaseLogin
{
    protected static string $layout = 'filament.pages.login';

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email Address')
                ->email()
                ->required()
                ->autocomplete('email'),
            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(),
        ];
    }

    public function getHeading(): string
    {
        return 'Welcome Back';
    }

    public function getSubheading(): string
    {
        return 'Please log in to access your account';
    }

    protected function getViewData(): array
    {
        return [
            'heading' => $this->getHeading(),
            'subheading' => $this->getSubheading(),
        ];
    }
}