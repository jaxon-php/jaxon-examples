<?php

require(__DIR__ . '/../../../vendor/autoload.php');

use Jaxon\App\Component;
use Jaxon\App\PaginationComponent;
use function Jaxon\jaxon;

class PageContent extends Component
{
    private $page = 1;

    public function html():  string
    {
        return 'Showing page number ' . $this->page;
    }

    public function showPage(int $pageNumber)
    {
        $this->cl(Pagination::class)
            ->paginator($pageNumber, 150)
            ->page(function(int $page) {
                $this->page = $page;
                // Render the page content.
                $this->render();
            })
            // Render the paginator.
            ->render($this->rq()->showPage());

        return $this->response;
    }
}

class Pagination extends PaginationComponent
{
    /**
     * @inheritDoc
     */
    protected function itemsPerPage(): int
    {
        return 10;
    }
}

jaxon()->app()->setup(__DIR__ . '/../../../config/component.php');
