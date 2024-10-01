<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Video extends Component
{
    /**
     * Create a new component instance.
     */
    public $bgImg;
    public $title;
    public $name;
    public $org;
    public $videoLink;
    public function __construct($bgImg,$title,$name,$org,$videoLink)
    {
        $this->bgImg = $bgImg;
        $this->title = $title;
        $this->name = $name;
        $this->org = $org;
        $this->videoLink = $videoLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.video');
    }
}
