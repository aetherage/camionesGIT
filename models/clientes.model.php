<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerClientes(){
        $clientes = array();
        $sqlstr = "select * from clientes;";
        $clientes = obtenerRegistros($sqlstr);
        return $clientes;
    }
    function obtenerClientes($clienteID){
      $cliente = array();
      $sqlstr = "select * from clientes where cli_id = %d;";
      $sqlstr = sprintf($sqlstr, $clienteID);
      $cliente = obtenerUnRegistro($sqlstr);
      return $cliente;
    }
    function insertarCliente($cliente){
      if($cliente && is_array($cliente)){
         $sqlInsert = "INSERT INTO clientes(`ctgdsc`,`ctgest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($cliente["ctgdsc"]),
                        valstr($cliente["ctgest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarCliente($cliente){
      if($cliente && is_array($cliente)){
        $sqlUpdate = "update clientes set ctgdsc='%s', ctgest='%s' where cli_id=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($cliente["ctgdsc"]),
                      valstr($cliente["ctgest"]),
                      valstr($cliente["cli_id"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrarCliente($clienteID){
      if($clienteID){
        $sqlDelete = "delete from clientes where cli_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($clienteID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
