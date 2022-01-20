<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $notification,$count;
    protected $listeners = ['notifications'];

    public function mount()
    {
        $this->notifications();
    }

    public function resetNotificationCount()
    {
        auth()->user()->notification = 0;
        auth()->user()->save();
    }

    public function read($id)
    {
        $notificacion = auth()->user()->notifications()->findOrFail($id);
        $notificacion->markAsRead();
    }

    public function render()
    {
        return view('livewire.notification-component');
    }
    public function notifications()
    {
        $this->notification = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();
    }
}
