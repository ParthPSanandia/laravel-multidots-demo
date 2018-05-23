<?php

namespace Multidots\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $commands = [
        'Multidots\Admin\Console\Admin',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin.auth' => \Multidots\Admin\Middleware\AuthenticateAdmin::class,
        'permission' => \Multidots\Admin\Middleware\Permission::class,
        'admin.redirect-authenticate' => \Multidots\Admin\Middleware\RedirectIfAuthenticated::class,
        'admin.not-authenticate' => \Multidots\Admin\Middleware\RedirectIfNotAdmin::class,
        \Multidots\Admin\Middleware\RolePermission::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'admin' => [
            'admin.auth',
            'admin.redirect-authenticate',
            'admin.not-authenticate',
        ],
    ];

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin');

        if (file_exists($routes = admin_path('routes.php'))) {
            $this->loadRoutesFrom($routes);
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config' => config_path()], 'laravel-admin-config');
            $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/admin')], 'laravel-admin-views');
            $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'laravel-admin-migrations');
            $this->publishes([__DIR__ . '/../database/seeds' => database_path('seeds')], 'laravel-admin-seeds');
            $this->publishes([__DIR__ . '/../public' => public_path('multidots/laravel-admin')], 'laravel-admin-assets');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '/routes/web.php';
        $this->app->make('Multidots\Admin\Controllers\AccountController');
        $this->app->make('Multidots\Admin\Controllers\AdministratorController');
        $this->app->make('Multidots\Admin\Controllers\Controller');
        $this->app->make('Multidots\Admin\Controllers\ForgotPasswordController');
        $this->app->make('Multidots\Admin\Controllers\HomeController');
        $this->app->make('Multidots\Admin\Controllers\LoginController');
        $this->app->make('Multidots\Admin\Controllers\ResetPasswordController');
        $this->app->make('Multidots\Admin\Controllers\RoleController');

        $this->loadAdminAuthConfig();

        $this->registerRouteMiddleware();
        $this->commands($this->commands);
    }

    /**
     * Setup auth configuration.
     *
     * @return void
     */
    protected function loadAdminAuthConfig()
    {
        config(array_dot(config('admin.auth', []), 'auth.'));
    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }
}
