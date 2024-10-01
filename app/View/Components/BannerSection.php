<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BannerSection extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $description;
    public $image;
    public function __construct( $title, $description, $image )
    {
        $this->title        = $title;
        $this->description  = $description;
        $this->image        = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.banner-section');
    }
}
