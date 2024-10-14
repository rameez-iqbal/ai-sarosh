<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LibraryList extends Component
{
    /**
     * Create a new component instance.
     */
    public $image;
    public $name;
    public $columns;
    public $href;
    public $borderRadius;
    public $bannerImage;
    public $isGallery;
    public function __construct($image,$name,$columns,$href,$borderRadius="0px",$bannerImage=null,$isGallery=false)
    {
        $this->image = $image;
        $this->name = $name;
        $this->columns = $columns;
        $this->href = $href;
        $this->borderRadius = $borderRadius;
        $this->bannerImage = $bannerImage;
        $this->isGallery = $isGallery;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.library-list');
    }
}
