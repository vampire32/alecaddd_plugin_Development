<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc;

final class Init
{
    public static function get_services($plugin)
    {
        return [
            new Pages\Admin($plugin)
        ];
    }

    public static function register_services($plugin)
    {
        foreach (self::get_services($plugin) as $service) {
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
}
