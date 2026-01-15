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
        return 'Showing page number ' . $this->currentPage();
    }

    public function showPage(int $pageNumber)
    {
        // Render the pagination component.
        $this->paginate($this->rq()->showPage(), $pageNumber);
    }
}

jaxon()->app()->setup(configFile('component.php'));
