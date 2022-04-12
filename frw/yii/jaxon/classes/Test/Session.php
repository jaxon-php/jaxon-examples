<?php

namespace Jaxon\App\Test;

use Jaxon\App\CallableClass as JaxonClass;

class Session extends JaxonClass
{
    public function command($command)
    {
        if($this->session()->has('LastCommand'))
        {
            $this->response->dialog->success('Last command is ' . $this->session()->get('LastCommand'),
                $this->session()->get('DialogTitle', 'No title'));
        }
        else
        {
            $this->response->dialog->success('This is the first command', $this->session()->get('DialogTitle', 'No title'));
        }
        $this->session()->set('LastCommand', $command);
        return $this->response;
    }

    public function reset()
    {
        $this->response->dialog->success('The session is cleared', $this->session()->get('DialogTitle', 'No title'));
        $this->session()->clear();
        return $this->response;
    }
}
