<?php namespace Eriks\Gallery\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Eriks\Gallery\Models\Gallery as galleryList;

class GalleriesList extends ComponentBase
{
    /**
     * A collection of galleries to display
     * @var Collection
     */
    public $gallerylist;

    /**
     * Message to display when there are no messages.
     * @var string
     */
    public $noGalleriesMessage;

    /**
     * Reference to the page name for linking to galleries.
     * @var string
     */
    public $galleryPage;

    /**
     * Reference to the page name for linking to categories.
     * @var string
     */
    public $categoryPage;


    private $field;
    private $order;


    public function componentDetails()
    {
        return [
            'name'        => 'eriks.gallery::lang.gallerylist.name',
            'description' => 'eriks.gallery::lang.gallerylist.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'galleryPage' => [
                'title'         => 'eriks.gallery::lang.gallerylist.galleryPage',
                'description'   => 'eriks.gallery::lang.gallerylist.galleryPage_description',
                'type'          => 'dropdown',
                'group'         => 'Links',
                'default'       => 'gallery'
            ],
            'categoryPage' => [
                'title'         => 'eriks.gallery::lang.gallerylist.categoryPage',
                'description'   => 'eriks.gallery::lang.gallerylist.categoryPage_description',
                'type'          => 'dropdown',
                'group'         => 'Links',
                'default'       => 'gallery/category'
            ],
            'noGalleriesMessage' => [
                'title'         => 'eriks.gallery::lang.gallerylist.noGalleriesMessage',
                'description'   => 'eriks.gallery::lang.gallerylist.noGalleriesMessage_description',
                'type'          => 'string',
                'default'       => 'No galleries found',
                'showExternalParam' => false
            ],
            'sortGallery' => [
                'title'         => 'Sorting',
                'description'   => 'Выбор метода сортировки.',
                'default'       => 'baseFileName',
                'type'          => 'dropdown',
                'required'      => true,
                'options' => [
                    'name'      => 'name',
                    'name_r'    => 'name r',
                    'date'      => 'date',
                    'date_r'    => 'date r',
                ],
            ],

        ];
    }

    public function getGalleryPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName','baseFileName');
    }

    public function getCategoryPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName','baseFileName');
    }

    public function onRun()
    {
        $this->prepareProperties();

        $this->gallerylist = $this->page['galleries'] = $this->listGalleries();
    }

    protected function prepareProperties()
    {
        $this->noGalleriesMessage = $this->page['noGalleriesMessage'] = $this->property('noGalleriesMessage');

        /**
         * Page links
         */
        $this->galleryPage = $this->page['galleryPage']= $this->property('galleryPage');

        $this->categoryPage = $this->page['categoryPage']= $this->property('categoryPage');
    }

    protected function listGalleries()
    {
        /**
         * Fetch all published galleries
         */
        $galleries = new galleryList();
        switch ($this->property('sortGallery')) {
            case 'name':
                $this->field = 'name';
                $this->order = 'asc';
                break;
            case 'name_r':
                $this->field = 'name';
                $this->order = 'desc';
                break;
            case 'date':
                $this->field = 'created_at';
                $this->order = 'asc';
                break;
            case 'date_r':
            default:
                $this->field = 'created_at';
                $this->order = 'desc';
                break;
        }
        $galleries = $galleries->orderBy($this->field, $this->order)->isPublished()->get();

        /**
         * Set url's for each gallery
         */
        $galleries->each(function($gallery){
            $gallery->setUrl($this->galleryPage,$this->controller);

            $gallery->categories->each(function($category){
                $category->setUrl($this->categoryPage,$this->controller);
            });
        });

        return $galleries;
    }
}
