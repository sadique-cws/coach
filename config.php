<?php 

$connect = mysqli_connect("localhost","root","","coach") or die("mar gaya re");


session_start();

function redirect($page="index.php"){
    echo "<script>window.open('$page','_self')</script>";
}


function countData($table){
    global $connect;
    $count = mysqli_num_rows(mysqli_query($connect, "select * from $table"));
    return $count;

}

function insertData($query){
    global $connect;
    $query = mysqli_query($connect, $query);
    return (($query)? true : false);
}

function redirectIfNotLogin(){
    if(!isset($_SESSION['admin'])){
        redirect("login.php");
    }
}


?>