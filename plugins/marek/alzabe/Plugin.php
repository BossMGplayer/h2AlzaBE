<?php namespace Marek\AlzaBE;

use Backend;
use System\Classes\PluginBase;

/**
 * AlzaBE Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'AlzaBE',
            'description' => 'No description provided yet...',
            'author'      => 'Marek',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Marek\AlzaBE\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'marek.alzabe.some_permission' => [
                'tab' => 'AlzaBE',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'alzabe' => [
                'label'       => 'AlzaBE',
                'url'         => Backend::url('marek/alzabe/people'),
                'icon'        => 'icon-leaf',
                'permissions' => ['marek.alzabe.*'],
                'order'       => 500,
            ],
        ];
    }
}
