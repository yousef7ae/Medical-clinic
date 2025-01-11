<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class WhatsAppLink extends Component
{
    public function mount()
    {
        $whatsapp = \App\Models\Setting::where('name', 'url_whatsapp')->first();

        if (!$whatsapp) {
            abort(404, 'whatsapp number is empty');
        }

        redirect('https://wa.me/' . $whatsapp->value);
    }

    public function render()
    {
        return view('livewire.site.whats-app-link');
    }
}
