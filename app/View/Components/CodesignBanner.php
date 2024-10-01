<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CodesignBanner extends Component
{
    /**
     * Create a new component instance.
     */
    public $day;
    public function __construct($day)
    {
        $this->day = $day;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.codesign-banner');
    }
}
