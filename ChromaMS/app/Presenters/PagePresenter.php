<?php 
namespace ChromaMS\Presenters;

use Lewis\Presenter\AbstractPresenter;
use GrahamCampbell\Markdown\Facades\Markdown;

class PagePresenter extends AbstractPresenter
{
    protected $markdown;

    public function __construct($object, Markdown $markdown)
    {
        $this->markdown = $markdown;

        parent::__construct($object);
    }

    public function contentHtml()
    {
        return Markdown::convertToHtml($this->content);
    }

    public function uriWildcar()
    {
        return $this->uri.'*';
    }

    public function prettyUri()
    {
        return '/'.ltrim($this->uri, '/');
    }

    public function linkToPaddedTitle($link)
    {
        $padding = str_repeat('&nbsp;', $this->depth * 4);

        return $padding.link_to($link, $this->title);
    }

    public function paddedTitle()
    {
        return str_repeat('&nbsp;', $this->depth * 4).$this->title;
    }
}
