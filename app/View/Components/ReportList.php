<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReportList extends Component
{
    public $image;
    public $href;
    public $title;
    public $description;
    public $date;
    public $imageCol;
    public $textCol;
    public $type;
    public $organization;
    public $reportFile;
    public function __construct($image,$href,$title,$description,$date,$imageCol,$textCol,$organization,$reportFile,$type="article")
    {
        $this->image = $image;
        $this->href = $href;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->imageCol = $imageCol;
        $this->textCol = $textCol;
        $this->type = $type;
        $this->organization = $organization;
        $this->reportFile = $reportFile;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.report-list');
    }
}
