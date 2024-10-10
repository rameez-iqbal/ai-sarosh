<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\GalleryHighlights;
use App\Models\LibraryTypes;
use App\Models\OurClient;
use App\Models\OurTeam;
use App\Models\Page;
use App\Models\Project;
use App\Models\Report;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Video;
use App\Models\Webinar;

class FrontEndController extends Controller
{
    public function home()
    {
        return view('frontend.home.home');
    }

    public function getRandomGalleryImages()
    {
        $images = [];
        $json_gallery_images = Gallery::where('gallery_images', '!=', null)->pluck('gallery_images')->toArray();
        if(count($json_gallery_images)>0)
        {
            foreach ($json_gallery_images as $json_gallery_image)
                $images = array_merge($images, json_decode($json_gallery_image));
            $random_keys = array_rand($images, min(8, count($images)));
            $random_images = [];
            foreach ($random_keys as $key)
                $random_images[] = $images[$key];
            return $random_images;
        }
    }

    public function projects()
    {
        $breadcrumbItems = [
            ['text' => 'Our Work']
        ];
        return view('frontend.projects.project', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back']
        ]);
    }

    public function getProjectsByCountry()
    {
        $project_list = [];
        $projects  = Project::with('details', 'country:id,name,bgColor')->get();
        foreach ($projects as $project) {
            if ($project?->country?->id == $project->country_id)
                $project_list[$project->country->name][] = $project;
        }
        return $project_list;
    }

    public function getProjects()
    {
        return Project::with('details', 'country:id,name,bgColor')->get();
    }

    public function getPages()
    {
        return Page::getPagesName()->get();
    }

    public function homeBannerSectionData()
    {
        return Page::where('slug', 'home')
            ->where('type', 'page')
            ->first(['name', 'slug', 'image', 'heading', 'sub_heading', 'description']);
    }

    public function getSettings()
    {
        return Setting::first();
    }

    public function getVisionMission()
    {
        return Page::where('type', 'section')
            ->whereIn('slug', ['our-vision', 'our-mission'])
            ->get(['heading', 'description']);
    }

    public function donor()
    {
        return Page::where('slug', 'about-our-donor')
            ->where('type', 'section')
            ->first();
    }

    public function ourClients()
    {
        return OurClient::get();
    }

    public function getObjectives()
    {
        return Service::where('type', 'service')->get();
    }

    public function getProjectBanner()
    {
        return Page::where('slug', 'our-work')
            ->where('type', 'section')
            ->first();
    }

    public function ourTeamView()
    {
        $breadcrumbItems = [
            ['text' => 'Our Work']
        ];
        return view('frontend.team.our-team', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
            'title' => 'Our Team',
            'description' => 'Meet the dynamic team behind our knowledge hub.',
            'image' => "app-assets/images/frontend/our_team.svg",
        ]);
    }

    public function getOurTeamsData()
    {
        $our_teams = OurTeam::with('category:id,role,bgColor')->get();
        $leaderships = [];
        $teachnical_team = [];
        $implementation_team = [];
        $communication_team = [];
        foreach ($our_teams as $our_team) {
            if ($our_team?->category?->role == 'Leadership')
                $leaderships[] = $our_team;
            if ($our_team?->category?->role == 'Technical Team')
                $teachnical_team[] = $our_team;
            if ($our_team?->category?->role == 'Implementation Team')
                $implementation_team[] = $our_team;
            if ($our_team?->category?->role == 'Communications Team')
                $communication_team[] = $our_team;
        }
        return [$leaderships, $teachnical_team, $implementation_team, $communication_team];
    }

    public function library()
    {
        $breadcrumbItems = [
            ['text' => 'Library']
        ];
        return view('frontend.library.library', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
            'title' => 'Library',
            'description' => 'Knowledge is like money: to be of value it must circulate, and in circulating it can increase in quantity and, hopefully, in value." – Author Louis L’Amour. ',
            'image' => "app-assets/images/frontend/library.svg",
        ]);
    }

    public function getLibraryTypes()
    {
        return LibraryTypes::all(['id', 'type', 'image', 'slug']);
    }

    public function webinars()
    {
        $breadcrumbItems = [
            ['text' => 'Library'],
            ['text' => 'Webinars']
        ];
        return view('frontend.webinars.webinar', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],

        ]);
    }

    public function getWebinars()
    {
        return Webinar::all(['id', 'title', 'image', 'redirect_url', 'webinar_date']);
    }

    public function articles()
    {
        $breadcrumbItems = [
            ['text' => 'Library'],
            ['text' => 'Articles']
        ];
        return view('frontend.articles.index', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],

        ]);
    }

    public function getArticles()
    {
        return Article::get(['id', 'title', 'sub_title', 'image', 'redirect_url', 'article_date']);
    }

    public function gallery()
    {
        $breadcrumbItems = [
            ['text' => 'Library'],
            ['text' => 'Gallery']
        ];
        return view('frontend.gallery.index', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
        ]);
    }
    public function getGalleries()
    {
        return Gallery::get(['id', 'heading', 'slug', 'banner_images', 'gallery_images']);
    }
    public function get_Pages($slug = '')
    {
        $page = Page::where('slug', $slug)->where('type', 'page')->first();
        switch ($slug) {
            case "about_us":
                return view('pages/about', $page);
        }
    }
    public function aboutUs()
    {
        $breadcrumbItems = [
            ['text' => 'About Us']
        ];
        return view('frontend.about.about-us', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back']
        ]);
    }

    public function getAboutUsBanner()
    {
        return Page::where('slug', 'about-us')->where('type', 'page')
            ->select('name', 'image', 'heading', 'description', 'sub_heading')
            ->first();
    }

    public function getThematicAreas()
    {
        return Service::whereType('thematic_area')->get();
    }

    public function reports()
    {
        $breadcrumbItems = [
            ['text' => 'Library'],
            ['text' => 'Reports']
        ];
        return view('frontend.reports.index', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
        ]);
    }

    public function getReports()
    {
        return Report::all(['id', 'title', 'organization', 'description', 'report_file', 'image', 'library_type_id']);
    }

    public function videos()
    {
        $breadcrumbItems = [
            ['text' => 'Library'],
            ['text' => 'Videos']
        ];
        return view('frontend.videos.index', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
        ]);
    }

    public function getVideos()
    {
        return Video::all(['id', 'title', 'name', 'organization', 'iframe_url', 'image', 'video_link']);
    }

    public function getGalleryConferences($slug, $day = null)
    {
        $gallery_details = Gallery::with('highlights')->where('slug', $slug)->first();
        $grouped_highlights = $gallery_details->highlights->groupBy('day');
        $grouped_highlights_array = $grouped_highlights->toArray();
        $breadcrumbItems = [
            ['text' => 'Library'],
            ['text' => 'Gallery'],
            ['text' => $gallery_details->heading],
        ];
        $view = (count($gallery_details->highlights) > 0) ? 'frontend.workshop.codesign' : 'frontend.conference.index';
        return view($view, [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
            'conference' => $gallery_details,
            'grouped_highlights_array' => $grouped_highlights_array
        ]);
    }

    public function getWorkshop($slug = null)
    {
        return GalleryHighlights::where('day', $slug)->get();
    }

    // public function PHCConference()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => '13 Int. Public Health Conf'],
    //     ];
    //     return view('frontend.conference.13th_International_public_health_conference', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }

    // public function canadianConference()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => '2023 Canadian Conf. on Global Health'],
    //     ];
    //     return view('frontend.conference.canadian_conference', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }

    // public function ghsSummit()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => 'Global Health Security Summit Isb.'],
    //     ];
    //     return view('frontend.conference.global_health_security_summit', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }

    // public function al4gh()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => 'AI4GH: Nairobi.'],
    //     ];
    //     return view('frontend.conference.al4gh', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }

    // public function wdc()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => 'WDC’23'],
    //     ];
    //     return view('frontend.conference.women_deliever_conference', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }

    public function contactUs()
    {
        $breadcrumbItems = [
            ['text' => 'Contact Us']
        ];
        return view('frontend.contactus.contact-us', [
            'breadcrumbItems' => $breadcrumbItems,
            'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
            'title' => 'Contact us',
            'description' => 'Feel free to contact us any time with any concerns or queries. ',
            'image' => "app-assets/images/frontend/contact_us.svg",
        ]);
    }

    // public function codesign()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => 'Co-Design Workshop Day 1'],
    //     ];
    //     return view('frontend.workshop.codesign', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }

    // public function codesignDay2()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => 'Co-Design Workshop Day 2'],
    //     ];
    //     return view('frontend.workshop.codesign-day2', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }

    // public function codesignDay3()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => 'Co-Design Workshop Day 3'],
    //     ];
    //     return view('frontend.workshop.codesign-day3', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }

    // public function codesignDay4()
    // {
    //     $breadcrumbItems = [
    //         ['text' => 'Library'],
    //         ['text' => 'Gallery'],
    //         ['text' => 'Co-Design Workshop Day 4'],
    //     ];
    //     return view('frontend.workshop.codesign-day4', [
    //         'breadcrumbItems' => $breadcrumbItems,
    //         'backLink' => ['href' => url()->previous(), 'text' => 'Back'],
    //     ]);
    // }
}
