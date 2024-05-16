<?php
//echo $_SERVER['DOCUMENT_ROOT'];
//echo dirname(__FILE__,2);
//echo dirname(__DIR__);
//$host = $_SERVER['HTTP_HOST']
//$server = $_SERVER['SERVER_NAME'];
//$uri = $_SERVER['REQUEST_URI'];
//print "http://" .$server. $uri;
class FileUtil{
    private $file_name;
    private $path_name;
    private $file_path;
    function __construct($initial_filename){
        $this->file_name = $initial_filename;
        $this->path_name = dirname(__DIR__) . "/assets/files/";
        // $target_dir = "assets/uploads";
        // if(!file_exists( $target_dir ) && !is_dir( $target_dir )){
        //     mkdir($target_dir);
        // }
        $is_ready = $this->initFile();
        /*if($is_ready){
            echo '<p>File ready!</p><br>';
        }*/
    }
    function setFileName($new_filename){
        $this->file_name = $new_filename;
    }
    function getFileName(){
        return $this->file_name;
    }
    function initFile(){
        $is_ready = true;
        if (!isset($this->file_name) || trim($this->file_name) === ''){
            echo 'Nama file tidak valid!';
            $is_ready = false;
        }
        $this->file_path = $this->path_name . $this->file_name;
        if (!file_exists($this->file_path) || !is_readable($this->file_path)) {
            echo 'File ' . $this->file_name . ' tidak dapat diakses!';
            $is_ready = false;
        }
        return $is_ready;
    }
    function readTxtFile(){
        $str_data = "";
        try{
            $myfile = fopen($this->file_path, "r") or die("Tidak bisa membuka file!");
            // Output one character until end-of-file
            while(!feof($myfile)) {
                $tmp_data = fgets($myfile) . "<br>";
                $str_data = $str_data . $tmp_data;
            }
        }catch(Exception $ex){
            echo $ex;
        }finally{
            fclose($myfile);
        }
        return $str_data;
    }
    function readJSONFile(){
        try{
            //read json file from file path + name in php
            $readJSONFile = file_get_contents($this->file_path);
            //convert json to array in php
            $jsonObject = json_decode($readJSONFile, true);
            //var_dump($jsonObject); // print array
            //print_r($jsonObject); // Dump all data of the Object
            //echo $jsonObject[0]["nama_lengkap"]; // Access Object data
        }catch(Exception $ex){
            echo $ex;
            $jsonObject = [];
        }
        return $jsonObject;
    }
}
?>