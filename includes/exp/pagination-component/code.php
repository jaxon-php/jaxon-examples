<?php

use Jaxon\App\PageComponent;
use function Jaxon\jaxon;
use function Jaxon\pm;

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
        $paginator->render($this->rq()->showPage(pm()->page(), $title));
    }
}

jaxon()->app()->setup($configDir . '/component.php');
jaxon()->view()->addNamespace('pagination',
    dirname(__DIR__, 3) . '/templates/pagination', '.php', 'jaxon');
