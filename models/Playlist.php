<?php namespace Eriks\Gallery\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Playlist Model
 *
 * @property Video[] $videos;
 * @property int $videos_count
 */
class Playlist extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'eriks_gallery_galleries';

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['name', 'description'];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name'];

    public $rules = [
        'name' => 'required|between:3,64',
        'slug' => ['required', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i', 'unique:eriks_gallery_galleries'],
    ];

    public $attributeNames = [
        'name' => 'eriks.gallery::lang.plugin.models.playlist.attributes.name',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'videos' => [
            Video::class,
            'table' => 'eriks_gallery_playlist_video'
        ],
        'videos_count' => [
            Video::class,
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
