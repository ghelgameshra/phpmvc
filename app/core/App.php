<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class App{

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();

        // controller
        // membuat huruf pertama dari controller menjadi kapital -> ucfirst()
        // mengecek apakah file ada dengan alamat yang diketikkan di url
        if( file_exists('../app/controllers/' . ucfirst($url[0]) . '.php') ){
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        } 


        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;


        // method
        if(isset($url[1])){
            // mengecek apakah sebuah method ada dari sebuah controller
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }

        }

        // kelola parameter
        if(!empty($url)){
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }

    public function parseURL(){

        // kondisi apabila ada url yang diketik atau mendapat url dari bar
        if(isset($_GET['url'])){
            // menghapus slash diakhir url
            $url = rtrim($_GET['url'], '/');

            // filter url dari karater
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // memecah url emnjadi array
            $url = explode('/', $url);

            return $url;       
        }

    }
}