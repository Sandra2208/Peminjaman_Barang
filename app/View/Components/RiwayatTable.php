<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RiwayatTable extends Component
{
    public $pinjamlog;
    /**
     * Create a new component instance.
     */
    public function __construct($pinjamlog)
    {
        $this->pinjamlog = $pinjamlog;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.riwayat-table');
    }
}
