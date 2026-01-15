<?php

use Jaxon\App\PageComponent;

use function Jaxon\page;

class PageContent extends PageComponent
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
        return 150;
    }

    public function html():  string
    {
        return '<div style="margin-bottom:10px;font-weight:bold;">' .
            $this->stash()->get('title') .
            '</div>Showing page number ' . $this->currentPage();
    }

    public function showPage(int $pageNumber, string $title)
    {
        $this->stash()->set('title', $title);

        // Render the pagination component.
        $this->paginate($this->rq()->showPage(page(), $title), $pageNumber);
    }
}

jaxon()->app()->setup(configFile('component.php'));
