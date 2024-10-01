<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $backLink;
    public $homeText;
    public $breadcrumbItems;

    public function __construct($backLink = null, $homeText = 'Home', $breadcrumbItems = [])
    {
        $this->backLink = $backLink;
        $this->homeText = $homeText;
        $this->breadcrumbItems = $breadcrumbItems;
    }

    public function render()
    {
        return view('components.breadcrumb');
    }
}

