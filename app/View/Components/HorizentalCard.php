<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class horizentalCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $image;
    public $href;
    public $title;
    public $owner;
    public $date;
    public $imageCol;
    public $textCol;
    public $type;
    public function __construct($image,$href,$title,$owner,$date,$imageCol,$textCol,$type="article")
    {
        $this->image = $image;
        $this->href = $href;
        $this->title = $title;
        $this->owner = $owner;
        $this->date = $date;
        $this->imageCol = $imageCol;
        $this->textCol = $textCol;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.horizental-card');
    }
}
