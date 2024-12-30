<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailNavbarButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $buttons;

    public function __construct($buttons)
    {
        $this->buttons = $buttons; // Menyimpan tombol-tombol yang diberikan
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.detail-navbar-button');
    }
}
