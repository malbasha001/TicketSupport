<?php

namespace App\Livewire\ActivityLogs;

use App\Models\Ticket;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class ShowLogs extends Component
{
    public Ticket $ticket;

    public function render()
    {
        $logs = Activity::with('causer')
            ->forSubject($this->ticket)
            ->latest()->get();

        return view('livewire.activity-logs.show-logs', [
            'logs' => $logs,
        ]);
    }
}
