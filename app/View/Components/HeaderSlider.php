<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderSlider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->header_slider = \App\Models\HeaderSlider::where('is_active', true)->first();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-slider', [
            'header_slider' => $this->header_slider
        ]);
    }
}
