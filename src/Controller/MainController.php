<?php
   
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController {
   
    public function index(){
        return new Response('its just a test example');
    }

}

?>