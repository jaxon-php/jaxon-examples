<?php

use Jaxon\App\PageComponent;

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

        // Get the paginator. This will also set the final page number value.
        $paginator = $this->paginator($pageNumber);
        // Render the page content.
        $this->render();
        // Render the pagination component.
        $paginator->render($this->rq()->showPage(je()->rd()->page(), $title));
    }
}

jaxon()->app()->setup(configFile('component.php'));
