<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Team extends Component
{
    public $title;
    public $bgColor;
    public $leaders;
    public $columns;
    public $width;

    public function __construct($title,$bgColor,$leaders,$columns,$width='100')
    {
        $this->title = $title;
        $this->bgColor = $bgColor;
        $this->leaders = $leaders;
        $this->columns = $columns;
        $this->width = $width;
    }

    public function render(): View|Closure|string
    {
        return view('components.team');
    }
}
