<?php

require(__DIR__ . '/../../../vendor/autoload.php');

use Jaxon\App\Component;
use Jaxon\App\PaginatorComponent;
use function Jaxon\jaxon;

class PageContent extends Component
{
    private $page = 1;

    public function html():  string
    {
        return 'Showing page number ' . $this->page;
    }

    /**
     * @exclude
     */
    public function update(int $pageNumber)
    {
        $this->page = $pageNumber;

        return $this->render();
    }
}

class Paginator extends PaginatorComponent
{
    public function showPage(int $pageNumber)
    {
        $this->cl(PageContent::class)->update($pageNumber);

        $this->paginator($pageNumber, 10, 150)->paginate($this->rq()->showPage());
        return $this->response;
    }
}

jaxon()->app()->setup(__DIR__ . '/../../../config/component.php');
