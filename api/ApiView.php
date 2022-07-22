<?php
class ApiView {

    public function response($data, $status) {

        //Define tipo de contenido y código de respuesta del header de la respuesta HTTP
        header("Content-Type: application/json");
        header("HTTP/1.1 $status ".$this->_requestStatus($status));

        //Respuesta de la petición HTTP
        echo json_encode($data);
    }

    //Devuelve un código de respuesta HTTP
    private function _requestStatus($statusParam) {

        $status = [
            200 => "OK",
            404 => "Not Found",
            500 => "Internal Server Error"
        ];

        return $status[$statusParam];
    }    
}
?>