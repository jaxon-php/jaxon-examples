<?php

require __DIR__ . '/../../../includes/autoload.php';

use Jaxon\App\PageComponent;
use function Jaxon\jaxon;

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
        // Get the paginator. This will also set the final page number value.
        $paginator = $this->paginator($pageNumber);
        // Render the page content.
        $this->render();
        // Render the pagination component.
        $paginator->render($this->rq()->showPage());
    }
}

jaxon()->app()->setup(__DIR__ . '/../../../config/component.php');
