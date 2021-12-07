<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    $app = new \Slim\App;


        // GET todos 
    $app->get("/personas/list",function(Request $request, Response $response){
        $list = Personas::get();
        pr($list);
    });

    //GET por id
    $app->get("/persona/{idpersona}",function(Request $request, Response $response){
        try {
            $idpersona = $request->getAttribute('idpersona');
            $persona = Personas::select($idpersona);
            if(haveRows($persona)){
                pr($persona);
            }else{
                $return = array(
                    "code" => 404,
                    "msg" => "404 - No se encontraron resultados"
                );
                echo json_encode($return);
            }
        } catch (Exception $e) {
            echo '{error: {"text": '.$e->getMessage().'}}';
        }
    });
