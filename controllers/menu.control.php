<?php
  require_once("libs/template_engine.php");
  function run(){
    $datos_para_vista = array();
    $datos_para_vista["arr_menues"] = array();
     
    $datos_para_vista["arr_menues"][] = array(
                                      "nom_combo"=>"Combo 1 - Cuarto de Libra",
                                      "prc_combo"=> 150.00,
                                      "enOferta" => true,
                                      "extras"=> array(
                                          array("comp"=>"Cuarto de Carne"),
                                          array("comp"=>"Papas Medianas"),
                                          array("comp"=>"Refresco de 16oz"),
                                          array("comp"=>"Porción de Postre del día")
                                        )
                                      );
    $datos_para_vista["arr_menues"][] = array(
                                      "nom_combo"=>"Combo 2 - Toropolada",
                                      "prc_combo"=> 250.00,
                                      "enOferta" => false,
                                      "extras"=> array(
                                          array("comp"=>"Libra y Media de Res"),
                                          array("comp"=>"Papas Extra Grande"),
                                          array("comp"=>"Refresco de 24oz"),
                                          array("comp"=>"Postre Completo")
                                        )
                                      );
    
    
    renderizar("menu", $datos_para_vista);
  }
 
  run();
?>