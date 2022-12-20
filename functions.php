<?php

$conn = mysqli_connect("sql307.epizy.com","epiz_33185680","zNO6OfirkQGHa","epiz_33185680_perpus");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
        
    return $rows;
}
function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    if ($password !== $password2){
        echo "<script>
            alert('konfimarsi password tidak sesuai');
        </script>";
        
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($conn, "INSERT INTO users VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);


}
