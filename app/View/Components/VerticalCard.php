<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VerticalCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $image;
    public $name;
    public $columns;
    public $href;
    public function __construct($image,$name,$columns,$href)
    {
        $this->image = $image;
        $this->name = $name;
        $this->columns = $columns;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vertical-card');
    }
}
