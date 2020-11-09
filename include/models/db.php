<?php 
//Creating a connection
function db_connect() {
    // Define connection as a static variable, undvika att koppla upp sig fler gånger om möjligt
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        //Skippar parsning, relativt säker eftersom i funktion. Parsning skulle vara bra om vi kunde lägga filen så att den inte kan nås, dvs utanför root folder
        //$config = parse_ini_file('config.ini'); 
        $connection = new mysqli('dbtrain.im.uu.se', 'dbtrain_531', 'rktemx', 'dbtrain_531');
    }
    //Changing Charset to UTF8, else print error msg
    if (!mysqli_set_charset($connection, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($connection));
        exit();
    }
    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error(); 
    }
    return $connection; 
}

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection, $query);

    return $result;
}

//Error report
function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

//Running a select query and returning selected rows
function db_select($query) {
    $rows = array();
    $result = db_query($query);
    // If query failed, return `false`
    if($result === false) {
        return false;
    }
    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
