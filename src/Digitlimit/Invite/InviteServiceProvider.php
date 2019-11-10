<?php

namespace Digitlimit\Invite;

use Illuminate\Support\ServiceProvider;
use Digitlimit\Invite\Contracts\Factory;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;

class InviteServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/invite.php',
            'invite'
        );

        $this->app->singleton(Factory::class, function ($app) {
            return new InviteManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Factory::class];
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(Filesystem $filesystem)
    {
        $this->publishes([
            __DIR__.'/../config/invite.php' => config_path('invite.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/create_invites_tables.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_invites_tables.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_invites_tables.php")
            ->first();
    }
}