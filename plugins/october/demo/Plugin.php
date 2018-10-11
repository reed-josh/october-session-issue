<?php namespace October\Demo;


/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;
use Session;

class Plugin extends PluginBase
{

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Illuminate\Contracts\Http\Kernel')->prependMiddleware('October\Demo\Middleware\StartSession');
    }

    public function pluginDetails()
    {
        return [
            'name'        => 'October Demo',
            'description' => 'Provides features used by the provided demonstration theme.',
            'author'      => 'Alexey Bobkov, Samuel Georges',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            '\October\Demo\Components\Todo' => 'demoTodo'
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'session' => [Session::class, 'get']
            ]
        ];
    }
}
