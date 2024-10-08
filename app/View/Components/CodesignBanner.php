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
    public $groupedHighlightsArray;
    public $headerContent;
    public $slug;
    public function __construct($groupedHighlightsArray,$headerContent,$slug)
    {
        $this->groupedHighlightsArray = $groupedHighlightsArray;
        $this->headerContent = $headerContent;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.codesign-banner');
    }
}
