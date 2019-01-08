<?php namespace Eriks\Gallery\Components;

use Lang;
use Cms\Classes\ComponentBase;
use Eriks\Gallery\Models\Gallery as GalleryModel;

class Gallery extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'eriks.gallery::lang.idgallery.title',
            'description' => 'eriks.gallery::lang.idgallery.description',
        ];
    }

    public function defineProperties()
    {
        return [
            'idGallery'    => [
                'title'       => 'eriks.gallery::lang.idgallery.title',
                'description' => 'eriks.gallery::lang.idgallery.description',
                'type'        => 'dropdown',
            ],
            'lang'         => [
                'title'       => 'eriks.gallery::lang.misc.title',
                'description' => 'eriks.gallery::lang.misc.description',
                'type'        => 'string',
                'default'     => Lang::get('eriks.gallery::lang.misc.defaultname'),
            ],
            'jqueryinject' => [
                'title'       => 'eriks.gallery::lang.jqueryinject.title',
                'description' => 'eriks.gallery::lang.jqueryinject.description',
                'type'        => 'dropdown',
                'default'     => 'yes',
                'options'     => ['yes' => 'eriks.gallery::lang.jqueryinject.optionsyes', 'no' => 'eriks.gallery::lang.jqueryinject.optionsno'],
            ],
            'thumbnail'    => [
                'title'       => 'eriks.gallery::lang.thumbnail.title',
                'description' => 'eriks.gallery::lang.thumbnail.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('eriks.gallery::lang.groups.options'),
                'options'     => ['true' => 'eriks.gallery::lang.thumbnail.optionstrue', 'false' => 'eriks.gallery::lang.thumbnail.optionsfalse'],
            ],
            'caption'      => [
                'title'       => 'eriks.gallery::lang.caption.title',
                'description' => 'eriks.gallery::lang.caption.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('eriks.gallery::lang.groups.options'),
                'options'     => ['true' => 'eriks.gallery::lang.caption.optionstrue', 'false' => 'eriks.gallery::lang.caption.optionsfalse'],
            ],
            'desc'         => [
                'title'       => 'eriks.gallery::lang.desc.title',
                'description' => 'eriks.gallery::lang.desc.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('eriks.gallery::lang.groups.options'),
                'options'     => ['true' => 'eriks.gallery::lang.desc.optionstrue', 'false' => 'eriks.gallery::lang.desc.optionsfalse'],
            ],
            'counter'      => [
                'title'       => 'eriks.gallery::lang.counter.title',
                'description' => 'eriks.gallery::lang.counter.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('eriks.gallery::lang.groups.options'),
                'options'     => ['true' => 'eriks.gallery::lang.counter.optionstrue', 'false' => 'eriks.gallery::lang.counter.optionsfalse'],
            ],
            'controls'     => [
                'title'       => 'eriks.gallery::lang.controls.title',
                'description' => 'eriks.gallery::lang.controls.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('eriks.gallery::lang.groups.options'),
                'options'     => ['true' => 'eriks.gallery::lang.controls.optionstrue', 'false' => 'eriks.gallery::lang.controls.optionsfalse'],
            ],
            'preload'      => [
                'title'             => 'eriks.gallery::lang.preload.title',
                'description'       => 'eriks.gallery::lang.preload.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'eriks.gallery::lang.preload.validationMessage',
                'default'           => '1',
                'group'             => Lang::get('eriks.gallery::lang.groups.options'),
            ],

            'mode'    => [
                'title'       => 'eriks.gallery::lang.mode.title',
                'description' => 'eriks.gallery::lang.mode.description',
                'type'        => 'dropdown',
                'default'     => 'lg-slide',
                'group'       => Lang::get('eriks.gallery::lang.groups.effects'),
            ],
            'speed'   => [
                'title'             => 'eriks.gallery::lang.speed.title',
                'description'       => 'eriks.gallery::lang.speed.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'eriks.gallery::lang.speed.validationMessage',
                'default'           => '600',
                'group'             => Lang::get('eriks.gallery::lang.groups.effects'),
            ],
            'loop'    => [
                'title'       => 'eriks.gallery::lang.loop.title',
                'description' => 'eriks.gallery::lang.loop.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('eriks.gallery::lang.groups.effects'),
                'options'     => ['true' => 'eriks.gallery::lang.loop.optionstrue', 'false' => 'eriks.gallery::lang.loop.optionsfalse'],
            ],
            'auto'    => [
                'title'       => 'eriks.gallery::lang.auto.title',
                'description' => 'eriks.gallery::lang.auto.description',
                'type'        => 'dropdown',
                'default'     => 'false',
                'group'       => Lang::get('eriks.gallery::lang.groups.effects'),
                'options'     => ['true' => 'eriks.gallery::lang.auto.optionstrue', 'false' => 'eriks.gallery::lang.auto.optionsfalse'],
            ],
            'pause'   => [
                'title'             => 'eriks.gallery::lang.pause.title',
                'description'       => 'eriks.gallery::lang.pause.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'eriks.gallery::lang.pause.validationMessage',
                'default'           => '2000',
                'group'             => Lang::get('eriks.gallery::lang.groups.effects'),
            ],
            'escKey'  => [
                'title'       => 'eriks.gallery::lang.escKey.title',
                'description' => 'eriks.gallery::lang.escKey.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('eriks.gallery::lang.groups.effects'),
                'options'     => ['true' => 'eriks.gallery::lang.escKey.optionstrue', 'false' => 'eriks.gallery::lang.escKey.optionsfalse'],
            ],
            'height'  => [
                'title'             => 'eriks.gallery::lang.height.title',
                'description'       => 'eriks.gallery::lang.height.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'eriks.gallery::lang.height.validationMessage',
                'default'           => '70',
                'group'             => Lang::get('eriks.gallery::lang.groups.thumbs'),
            ],
            'width'   => [
                'title'             => 'eriks.gallery::lang.width.title',
                'description'       => 'eriks.gallery::lang.width.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'eriks.gallery::lang.width.validationMessage',
                'default'           => '100',
                'group'             => Lang::get('eriks.gallery::lang.groups.thumbs'),
            ],
            'resizer' => [
                'title'       => 'eriks.gallery::lang.resizer.title',
                'description' => 'eriks.gallery::lang.resizer.description',
                'type'        => 'dropdown',
                'default'     => 'auto',
                'options'     => ['auto' => 'eriks.gallery::lang.resizer.optionsauto', 'exact' => 'eriks.gallery::lang.resizer.optionsexact', 'portrait' => 'eriks.gallery::lang.resizer.optionsportrait', 'landscape' => 'eriks.gallery::lang.resizer.optionslandscape', 'crop' => 'eriks.gallery::lang.resizer.optionscrop'],
                'group'       => Lang::get('eriks.gallery::lang.groups.thumbs'),
            ],
        ];
    }

    public function getModeOptions()
    {
        return $this->getTransitions();
    }

    private function getTransitions()
    {
        return [
            'lg-slide'                    => 'Slide',
            'lg-fade'                     => 'Fade',
            'lg-zoom-in'                  => 'Zoom In',
            'lg-zoom-in-big'              => 'Zoom In Big',
            'lg-zoom-out'                 => 'Zoom Out',
            'lg-zoom-out-big'             => 'Zoom Out Big',
            'lg-zoom-out-in'              => 'Zoom Out In',
            'lg-zoom-in-out'              => 'Zoom In Out',
            'lg-soft-zoom'                => 'Soft Zoom',
            'lg-scale-up'                 => 'Scale Up',
            'lg-slide-circular'           => 'Slide Circular',
            'lg-slide-circular-vertical'  => 'Slide Circular Vertical',
            'lg-slide-vertical'           => 'Slide Vertical',
            'lg-slide-vertical-growth'    => 'Slide Vertical Growth',
            'lg-slide-skew-only'          => 'Slide Skew Only',
            'lg-slide-skew-only-rev'      => 'Slide Skew Only Reverse',
            'lg-slide-skew-only-y'        => 'Slide Skew Only-Y',
            'lg-slide-skew-only-y-rev'    => 'Slide Skew Only-Y Reverse',
            'lg-slide-skew'               => 'Slide Skew',
            'lg-slide-skew-rev'           => 'Slide Skew Reverse',
            'lg-slide-skew-cross'         => 'Slide Skew Cross',
            'lg-slide-skew-cross-rev'     => 'Slide Skew Cross Reverse',
            'lg-slide-skew-ver'           => 'Slide Skew Vertical',
            'lg-slide-skew-ver-rev'       => 'Slide Skew Vertical Reverse',
            'lg-slide-skew-ver-cross'     => 'Slide Skew Vertical Cross',
            'lg-slide-skew-ver-cross-rev' => 'Slide Skew Vertical Cross Reverse',
            'lg-lollipop'                 => 'Lollipop',
            'lg-lollipop-rev'             => 'Lollipop Reverse',
            'lg-rotate'                   => 'Rotate',
            'lg-rotate-rev'               => 'Rotate Reverse',
            'lg-tube'                     => 'Tube',
            'lg-start-zoom'               => 'Start Zoom',
        ];
    }

    public function getidGalleryOptions()
    {
        return GalleryModel::orderBy('name')->lists('name', 'id');
    }

    public function onRun()
    {
        if ($this->property('jqueryinject') == "yes") {
            $this->addJs('assets/js/jquery-1.9.1.min.js');
        }

        $this->addCss('assets/css/lightgallery.min.css');
        $this->addCss('assets/css/lg-transitions.min.css');

        $this->addJs('assets/js/lightgallery.min.js');
        $this->addJs('assets/js/jquery.mousewheel.min.js');
        $this->addJs('assets/js/lg-thumbnail.min.js');
        $this->addJs('assets/js/lg-autoplay.min.js');
        $this->addJs('assets/js/lg-pager.min.js');
        $this->addJs('assets/js/lg-zoom.min.js');
        $this->addJs('assets/js/lg-fullscreen.min.js');
    }

    public function onRender()
    {
        $this->gallery = $this->page['gallery'] = GalleryModel::find($this->property('idGallery'));

        // Inject all gallery properties to page.
        foreach ($this->getProperties() as $key => $value) {
            $this->page[$key] = $value;
        }
    }

}