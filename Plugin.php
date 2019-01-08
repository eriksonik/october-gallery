<?php namespace Eriks\Gallery;

//use App;
//use Event;
use Backend;
use System\Classes\PluginBase;


class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'eriks.gallery::lang.plugin.name',
            'description' => 'eriks.gallery::lang.plugin.description',
            'author'      => 'eriks.gallery::lang.plugin.author',
            'icon'        => 'icon-camera-retro',
            'homepage'    => 'https://github.com/eriksonik/october-gallery'
        ];
    }

    public function registerComponents()
    {
        return [
            'Eriks\Gallery\Components\Gallery' => 'galleryId',
            'Eriks\Gallery\Components\GallerySlug' => 'gallerySlug',
            'Eriks\Gallery\Components\GalleriesList' => 'galleriesList',
            'Eriks\Gallery\Components\SinglePlaylist' => 'Playlist',
        ];
    }

//    public function registerPageSnippets()
//    {
//        return [
//            'Eriks\Gallery\Components\Gallery' => 'galleryId',
//            'Eriks\Gallery\Components\GallerySlug' => 'gallerySlug',
//            'Eriks\Gallery\Components\GalleriesList' => 'galleriesList'
//        ];
//    }

    public function registerNavigation()
    {
        return [
            'gallery' => [
                'label'       => 'eriks.gallery::lang.menu.label',
                'url'         => Backend::url('eriks/gallery/galleries'),
                'icon'        => 'icon-camera-retro',
                'permissions' => ['eriks.gallery.*'],
                'order'       => 500,

                'sideMenu' => [
//                    'new_gallery' => [
//                        'label'       => 'raviraj.rjgallery::lang.menu.new_gallery',
//                        'icon'        => 'icon-plus',
//                        'url'         => Backend::url('eriks/gallery/galleries/create'),
//                        'permissions' => ['raviraj.rjgallery.access_galleries']
//                    ],
                    'galleries' => [
                        'label'       => 'eriks.gallery::lang.menu.galleries',
                        'icon'        => 'icon-file-image-o',
                        'url'         => Backend::url('eriks/gallery/galleries'),
                        'permissions' => ['eriks.gallery.access_galleries']
                    ],
//                    'new_category' => [
//                        'label'       => 'eriks.gallery::lang.menu.new_category',
//                        'icon'        => 'icon-plus',
//                        'url'         => Backend::url('eriks/gallery/categories/create'),
//                        'permissions' => ['eriks.gallery.access_galleries']
//                    ],
                    'categories' => [
                        'label'       => 'eriks.gallery::lang.menu.categories',
                        'icon'        => 'icon-server',
                        'url'         => Backend::url('eriks/gallery/categories'),
                        'permissions' => ['eriks.gallery.access_categories']
                    ],

                    'videos' => [
                        'label' => 'eriks.gallery::lang.plugin.navigation.sidemenu.videos.label',
                        'icon' => 'icon-video-camera',
                        'url' => Backend::url('eriks/gallery/videos'),
                        'permissions' => ['eriks.gallery.access_videos']
                    ],
                    'playlists' => [
                        'label' => 'eriks.gallery::lang.plugin.navigation.sidemenu.playlists.label',
                        'icon' => 'icon-list',
                        'url' => Backend::url('eriks/gallery/playlists'),
                        'permissions' => ['eriks.gallery.access_playlists']
                    ]

                ]
            ]
        ];
    }

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
//    public function registerFormWidgets()
//    {
//
//    }
//
//    public function registerMailTemplates()
//    {
//
//    }

    public function registerPermissions()
    {
        $tab = 'YouTube Video Gallery';

        return [
            'eriks.gallery.*' => ['tab' => 'eriks.gallery::lang.plugin.name', 'label' => 'eriks.gallery::lang.permissions.all'],
            'eriks.gallery.tab' => [
                'label' => 'Show the YouTube Video Gallery tab in the backend',
                'tab' => $tab
            ],
            'eriks.gallery.access_videos' => [
                'label' => 'Access to the video section',
                'tab' => $tab
            ],
            'eriks.gallery.access_playlists' => [
                'label' => 'Access to the playlist section',
                'tab' => $tab
            ]
        ];
    }


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
