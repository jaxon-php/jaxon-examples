<?php

use Jaxon\App\PageComponent;
use Jaxon\App\PageDatabagTrait;

use function Jaxon\page;

/**
 * @databag page
 */
class PageContent extends PageComponent
{
    use PageDatabagTrait;

   /**
    * @inheritDoc
    */
   protected function bagName(): string
   {
       return 'page';
   }

   /**
    * @inheritDoc
    */
   protected function bagAttr(): string
   {
       return 'number';
   }

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
            $this->bag('page')->get('title') .
            '</div>Showing page number ' . $this->currentPage();
    }

    public function showPage(int $pageNumber)
    {
        // Render the pagination component.
        $this->paginate($this->rq()->showPage(page()), $pageNumber);
    }

    public function show()
    {
        $title = 'This is the page title';
        $this->bag('page')->set('title', $title);
        $this->showPage(1);
    }
}

jaxon()->app()->setup(configFile('component.php'));
