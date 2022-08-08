<?php

use Jaxon\Response\Response;
use function Jaxon\jaxon;

class Upload
{
    public function uploadedFile()
    {
        // Get uploaded files
        $aUploadedFiles = jaxon()->upload()->files();
        $images = $aUploadedFiles['image'];
        $html = '';
        foreach($images as $image)
        {
            $array = [
                'type' => $image->type(),
                'name' => $image->name(),
                'filename' => $image->filename(),
                'extension' => $image->extension(),
                'size' => $image->size(),
                'path' => $image->path(),
            ];
            $html .= '<pre>'.print_r($array, true).'</pre>';
        }

        $response = new Response;
        $response->assign("aUploadedFiles", "innerHTML", $html);
        return $response;
    }
}
