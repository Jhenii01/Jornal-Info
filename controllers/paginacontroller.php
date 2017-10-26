<?php

namespace Controllers;

use Lib\Controller;

/**
 * Description of PaginaController
 *
 * @author Jheny
 */
class PaginaController extends Controller{
    
    public function index() {
        $this->data ['teste'] = '</br>Aqui vai ter lista de post';
        
    }
    
    public function ver() {
        
        $idPagina = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_INT);
        if($idPagina != FALSE){
           $this->data ['conteudo'] = "aqui vai mostrar pagina de id = {$idPagina}";
        }
            
    }
    
}
