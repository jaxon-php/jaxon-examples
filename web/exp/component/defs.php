<?php

require(__DIR__ . '/../../../vendor/autoload.php');
use function Jaxon\jaxon;

class PageTitle extends \Jaxon\App\Component
{
    public $page = 1;

    public function html():  string
    {
        return 'Showing page number ' . $this->page;
    }
}

class Paginator extends \Jaxon\App\Component
{
    public function showPage($pageNumber)
    {
        $pageTitle = $this->cl(PageTitle::class);
        $pageTitle->page = $pageNumber;
        $pageTitle->show();

        $this->paginator($pageNumber, 10, 150)->paginate($this->rq()->showPage());
        return $this->response;
    }
}

jaxon()->app()->setup(__DIR__ . '/../../../config/component.php');
