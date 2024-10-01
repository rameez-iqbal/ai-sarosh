<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Service extends Component
{
    /**
     * Create a new component instance.
     */
    public $columns;
    public $title;
    public $description;
    public $image;
    public function __construct($columns,$title,$description,$image)
    {
        $this->columns = $columns;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service');
    }
}
