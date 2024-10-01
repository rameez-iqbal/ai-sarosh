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
use App\Serivces\Reports\ReportInterface;
use App\Serivces\Reports\ReportService;
use App\Serivces\Videos\VideoInterface;
use App\Serivces\Videos\VideoService;
use App\Serivces\Webinars\WebinarsInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        $this->app->bind(PageInterface::class,PageService::class);
        $this->app->bind(ThematicInterface::class,ThematicService::class);
        $this->app->bind(OurTeamInterface::class,OurTeamService::class);
        $this->app->bind(LibraryInterface::class,LibraryService::class);
        $this->app->bind(WebinarsInterface::class,WebinarsService::class);
        $this->app->bind(ArticlesInterface::class,ArticlesService::class);
        $this->app->bind(VideoInterface::class,VideoService::class);
        $this->app->bind(ReportInterface::class,ReportService::class);
        
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
