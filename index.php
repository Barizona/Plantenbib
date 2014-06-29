<?php
require_once 'lib/Database.php';
require_once 'lib/Router.php';

require_once 'Plant.php';


$router = new Router();

$router->add_routes(array(
    
        #PLANTEN
    
        "planten/json" => function(){
            $planten = new Plant();
            print($planten->get_planten_json());
        },
                
        "planten" => function(){
            $planten = new Plant();
            $plant_data = $planten->get_planten();
        },
                
        "planten/new" => function(){
                        
            $planten = new Plant();
            $planten->receive();
            $planten->insert_plant();
        },
                
        "planten/new/json" => function(){
            $planten = new Plant();
            $planten->insert_plant_json();
        },

        "planten/update" => function(){
            $planten = new Plant();
            $planten->receive();
            $planten->update_plant();
        },
                
        "planten/update/json" => function(){
            $planten = new Plant();
            $planten->update_plant_json();
        },
        
        "planten/delete" => function(){
            $planten = new Plant();
            $planten->delete_plant(htmlspecialchars($_POST['id']));
        },
        
        #EIGENSCHAPPEN
                
        "eigenschappen/json" => function(){
            $eigenschappen = new Eigenschap();
            print($eigenschappen->get_eigenschappen_json());
        },
                
        "eigenschappen" => function(){
            $eigenschappen = new Eigenschap();
            $eigenschap_data = $eigenschappen->get_eigenschappen();
        },
                
        "eigenschappen/new" => function(){
                        
            $eigenschappen = new Eigenschap();
            $eigenschappen->receive();
            $eigenschappen->insert_eigenschap();
        },
                
        "eigenschappen/new/json" => function(){
            $eigenschappen = new Eigenschap();
            $eigenschappen->insert_eigenschap_json();
        },

        "eigenschappen/update" => function(){
            $eigenschappen = new Eigenschap();
            $eigenschappen->receive();
            $eigenschappen->update_eigenschap();
        },
                
        "eigenschappen/update/json" => function(){
            $eigenschappen = new Eigenschap();
            $eigenschappen->update_eigenschap_json();
        },
        
        "eigenschappen/delete" => function(){
            $eigenschappen = new Eigenschap();
            $eigenschappen->delete_eigenschap(htmlspecialchars($_POST['id']));
        },
        
        #REGIOS
                
        "regios/json" => function(){
            $regios = new Regio();
            print($regios->get_regios_json());
        },
                
        "regios" => function(){
            $regios = new Regio();
            $regio_data = $regios->get_regios();
        },
                
        "regios/new" => function(){
            $regios = new Regio();
            $regios->receive();
            $regios->insert_regio();
        },
                
        "regios/new/json" => function(){
            $regios = new Regio();
            $regios->insert_regio_json();
        },

        "regios/update" => function(){
            $regios = new Regio();
            $regios->receive();
            $regios->update_regio();
        },
                
        "regios/update/json" => function(){
            $regios = new Regio();
            $regios->update_regio_json();
        },
        
        "regios/delete" => function(){
            $regios = new Regio();
            $regios->delete_regio(htmlspecialchars($_POST['id']));
        }

    )
    
);

$router->execute_url();