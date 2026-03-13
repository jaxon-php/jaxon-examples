<?php

use Jaxon\App\PageComponent;

use function Jaxon\page;

class PageContentCp extends PageComponent
{
    /**
     * @inheritDoc
     */
    protected function limit(): int
    {
        return 10;
    }

    /**
     * @inheritDoc
     */
    protected function count(): int
    {
        return -1;
    }

    public function html():  string
    {
        return '<div style="margin-bottom:10px;font-weight:bold;" id="page-title">' .
            $this->stash()->get('title') .
            '</div>Showing page number ' . $this->currentPage();
    }

    public function showPage(string $title, int $pageNumber = 0)
    {
        $this->stash()->set('title', $title);

        // Render the pagination component.
        $this->paginate($this->rq()->showPage($title, page()), $pageNumber);
    }

    public function show()
    {
        $this->showPage('This is the page title');
    }
}
