<?php

namespace Eriks\Gallery\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * video Model
 */
class Video extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'eriks_gallery_videos';

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['title'];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['title', 'yt_watch', 'published'];

    public $rules = [
        'title' => 'required',
        'yt_watch' => 'required',
        'published' => 'boolean'
    ];

    public $attributeNames = [
        'title' => 'eriks.gallery::lang.plugin.models.video.attributes.title',
        'yt_watch' => 'eriks.gallery::lang.plugin.models.video.attributes.yt_watch'
    ];

    /**
     * Tries to extract YouTube video id if a full YouTube url was given
     *
     * @param $value
     */
    public function setYtWatchAttribute($value)
    {
        preg_match(
            '/(?:https?:)?(?:\/\/)?(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube(?:-nocookie)?\.com\S*?[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:[\'"][^<>]*>|<\/a>))[?=&+%\w.-]*/',
            $value,
            $matches
        );

        $this->attributes['yt_watch'] = (isset($matches[1])) ? $matches[1] : $value;
    }

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'playlists' => [
            Playlist::class,
            'table' => 'eriks_gallery_playlist_video'
        ],
        'playlists_count' => [
            Playlist::class,
            'table' => 'eriks_gallery_playlist_video',
            'count' => true
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
