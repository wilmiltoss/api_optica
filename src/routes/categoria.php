<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    $app = new \Slim\App;


        // GET todos 
    $app->get("/categorias/list",function(Request $request, Response $response){
        $list = Categoria::get();
        pr($list);
    });

    //GET por id
    $app->get("/categoria/{idcategoria}",function(Request $request, Response $response){
        try {
            $idcategoria = $request->getAttribute('idcategoria');
            $categoria = Categoria::select($idcategoria);
            if(haveRows($categoria)){
                pr($categoria);
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


