<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectDetail extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $bgColor;
    public $logo;
    public $title;
    public $piName;
    public $coPiName;
    public $projectTimeline;
    public $projectTeam;
    public $country;
    public $organization;
    public $website;
    public $profileImage;
    public $countryFlag;
    public $userName;
    public $aboutProject;
    public $type;
    public function __construct($bgColor = '#FFDADB',$id,$logo,$title,$piName,$coPiName,$projectTimeline,$projectTeam,$country,$organization,$website,$profileImage,$countryFlag,$userName,$aboutProject,$type="text")
    {
        $this->bgColor = $bgColor;
        $this->id = $id;
        $this->logo = $logo;
        $this->title = $title;
        $this->piName = $piName;
        $this->coPiName = $coPiName;
        $this->projectTimeline = $projectTimeline;
        $this->projectTeam = $projectTeam;
        $this->country = $country;
        $this->organization = $organization;
        $this->website = $website;
        $this->profileImage = $profileImage;
        $this->countryFlag = $countryFlag;
        $this->userName = $userName;
        $this->aboutProject = $aboutProject;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-detail');
    }
}
