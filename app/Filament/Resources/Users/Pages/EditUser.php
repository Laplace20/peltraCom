<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Password;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sendPasswordResetLink')
                ->label('Kirim Link Reset Password')
                ->icon('heroicon-m-envelope')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Kirim Link Reset Password')
                ->modalDescription('Email reset password akan dikirim ke alamat email user ini.')
                ->action(function (): void {
                    $status = Password::broker(config('fortify.passwords'))
                        ->sendResetLink(['email' => $this->record->email]);

                    if ($status === Password::RESET_LINK_SENT) {
                        Notification::make()
                            ->success()
                            ->title('Link reset password terkirim')
                            ->body('Email reset password berhasil dikirim ke '.$this->record->email)
                            ->send();

                        return;
                    }

                    Notification::make()
                        ->danger()
                        ->title('Gagal mengirim link reset password')
                        ->body(__($status))
                        ->send();
                }),
            DeleteAction::make(),
        ];
    }
}
