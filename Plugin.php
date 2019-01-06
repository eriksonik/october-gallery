<?php

namespace Eriks\Gallery;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'eriks.gallery::lang.plugin.name',
            'description' => 'eriks.gallery::lang.plugin.description',
            'author'      => 'eriks.gallery::lang.plugin.author',
            'icon'        => 'icon-newspaper-o',
            'homepage'    => 'https://github.com/eriksonik/october-gallery'
        ];
    }

//    public function registerNavigation()
//    {
//
//    }
//
//    public function registerSettings()
//    {
//
//    }
//
//    public function registerReportWidgets()
//    {
//
//    }
//
//    public function registerComponents()
//    {
//
//    }
//
//    public function registerFormWidgets()
//    {
//
//    }
//
//    public function registerMailTemplates()
//    {
//
//    }
//
//    public function registerPermissions()
//    {
//
//    }
//
//    public function registerSchedule($schedule)
//    {
//        $schedule->command('queue:work --daemon --queue=newsletter')->everyMinute()->withoutOverlapping();
//    }
//
//    public function boot()
//    {
//        /**
//         * Hide unused form fields
//         */
//        PostsController::extendFormFields(function($form, $model, $context)
//        {
//            if (!$model instanceof Posts) {
//                return;
//            }
//
//            $settings = json_decode(Db::table('system_settings')->where('item', 'indikator_news_settings')->value('value'));
//            $admin = BackendAuth::getUser();
//
//            if (isset($settings->fields_slug) && !$settings->fields_slug) {
//                $form->removeField('slug');
//            }
//            if ((isset($settings->fields_category) && !$settings->fields_category) || (!$admin->is_superuser && !$admin->hasPermission('indikator.news.categories'))) {
//                $form->removeField('category');
//            }
//            if (isset($settings->fields_tags) && !$settings->fields_tags) {
//                $form->removeField('tags');
//            }
//            if (!isset($settings->fields_author) || (isset($settings->fields_author) && !$settings->fields_author)) {
//                $form->removeField('user');
//            }
//        });
//
//        PostsController::extendListColumns(function($list, $model)
//        {
//            if (!$model instanceof Posts) {
//                return;
//            }
//
//            $settings = json_decode(Db::table('system_settings')->where('item', 'indikator_news_settings')->value('value'));
//            $admin = BackendAuth::getUser();
//
//            if (isset($settings->fields_slug) && !$settings->fields_slug) {
//                $list->removeColumn('slug');
//            }
//            if ((isset($settings->fields_category) && !$settings->fields_category) || (!$admin->is_superuser && !$admin->hasPermission('indikator.news.categories'))) {
//                $list->removeColumn('category');
//            }
//            if (isset($settings->fields_tags) && !$settings->fields_tags) {
//                $list->removeColumn('tags');
//            }
//            if (!isset($settings->fields_author) || (isset($settings->fields_author) && !$settings->fields_author)) {
//                $list->removeColumn('user');
//            }
//        });
//
//        /**
//         * Extensions for Sitemap
//         */
//        Event::listen('pages.menuitem.listTypes', function()
//        {
//            return [
//                'post-list' => 'indikator.news::lang.sitemap.post_list',
//                'post-page' => 'indikator.news::lang.sitemap.post_page'
//            ];
//        });
//
//        Event::listen('pages.menuitem.getTypeInfo', function($type)
//        {
//            if ($type == 'post-list' || $type == 'post-page') {
//                return Posts::getMenuTypeInfo($type);
//            }
//        });
//
//        Event::listen('pages.menuitem.resolveItem', function($type, $item, $url, $theme)
//        {
//            if ($type == 'post-list' || $type == 'post-page') {
//                return Posts::resolveMenuItem($item, $url, $theme);
//            }
//        });
//
//        /**
//         * Attach posts relationship to backend user model as extension
//         */
//        User::extend(function($model)
//        {
//            $model->hasMany['posts'] = [
//                'Indikator\News\Models\Posts',
//                'key' => 'user_id'
//            ];
//        });
//    }

}
