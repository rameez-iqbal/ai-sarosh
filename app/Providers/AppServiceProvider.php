<?php

namespace App\Providers;

use App\Serivces\Articles\ArticlesInterface;
use App\Serivces\Library\LibraryInterface;
use App\Serivces\Library\LibraryService;
use App\Serivces\Webinars\WebinarsService;
use App\Serivces\OurTeam\OurTeamInterface;
use App\Serivces\OurTeam\OurTeamService;
use App\Serivces\Page\PageInterface;
use App\Serivces\Page\PageService;
use App\Serivces\ThematicServices\ThematicInterface;
use App\Serivces\ThematicServices\ThematicService;
use App\Serivces\Articles\ArticlesService;
use App\Serivces\Gallery\GalleryInterface;
use App\Serivces\Gallery\GalleryService;
use App\Serivces\GalleryHighlights\GalleryHighlightsInterface;
use App\Serivces\GalleryHighlights\GalleryHighlightsService;
use App\Serivces\Projects\ProjectInterface;
use App\Serivces\Projects\ProjectService;
use App\Serivces\Reports\ReportInterface;
use App\Serivces\Reports\ReportService;
use App\Serivces\Videos\VideoInterface;
use App\Serivces\Videos\VideoService;
use App\Serivces\Webinars\WebinarsInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PageInterface::class,PageService::class);
        $this->app->bind(ThematicInterface::class,ThematicService::class);
        $this->app->bind(OurTeamInterface::class,OurTeamService::class);
        $this->app->bind(LibraryInterface::class,LibraryService::class);
        $this->app->bind(WebinarsInterface::class,WebinarsService::class);
        $this->app->bind(ArticlesInterface::class,ArticlesService::class);
        $this->app->bind(VideoInterface::class,VideoService::class);
        $this->app->bind(ReportInterface::class,ReportService::class);
        $this->app->bind(ProjectInterface::class,ProjectService::class);
        $this->app->bind(GalleryInterface::class,GalleryService::class);
        $this->app->bind(GalleryHighlightsInterface::class,GalleryHighlightsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
