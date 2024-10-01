<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Webinars extends Component
{
    /**
     * Create a new component instance.
     */
    public $webinarTitle;
    public $webinarImg;
    public $webinarCreationDate;
    public $columns;
    public $href;
    public function __construct($webinarTitle,$webinarImg,$webinarCreationDate,$columns,$href)
    {
        $this->webinarTitle = $webinarTitle;
        $this->webinarImg = $webinarImg;
        $this->webinarCreationDate = $webinarCreationDate;
        $this->columns = $columns;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.webinars');
    }
}
