<?php namespace Alza\Language;

use Backend;
use System\Classes\PluginBase;

/**
 * Language Plugin Information File
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
            'name'        => 'Language',
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
            'Alza\Language\Components\MyComponent' => 'myComponent',
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
            'alza.language.some_permission' => [
                'tab' => 'Language',
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
            'language' => [
                'label'       => 'Language',
                'url'         => Backend::url('alza/language/languagescontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['alza.language.*'],
                'order'       => 500,
            ],
        ];
    }
}
