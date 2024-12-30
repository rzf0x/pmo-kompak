<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardDashboard extends Component
{
    public $bgColor;
    public $icon;
    public $title;
    public $subtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($bgColor, $icon, $title, $subtitle)
    {
        $this->bgColor = $bgColor;
        $this->icon = $icon;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-dashboard');
    }
}
