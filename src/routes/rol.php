<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    $app = new \Slim\App;


        // GET todos los roles
    $app->get("/personas/list",function(Request $request, Response $response){
        $list = Roles::get();
        pr($list);
    });

    //GET por rol
    $app->get("/persona/{idrol}",function(Request $request, Response $response){
        try {
            $idrol = $request->getAttribute('idrol');
            $rol = Roles::select($idrol);
            if(haveRows($rol)){
                pr($rol);
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



   