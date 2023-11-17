<?php


$servername = "localhost";
$username = "root";
$password = "";

$cnx = new mysqli($servername, $username, $password);

if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}





$databasename = "gestion_banque";
$Dbcreation = "CREATE DATABASE IF NOT EXISTS $databasename";

if (!$cnx->query($Dbcreation)) {
    die("database not created<br>" . $cnx->error);
} else {
    echo "<br>Database created successfully";
}

$cnx->select_db($databasename);

// <!-----------------------------------tables----------------------------------------->





// $clienttable = "
// CREATE TABLE Client (
//     id_client INT AUTO_INCREMENT PRIMARY KEY,
//     nom VARCHAR(50),
//     prenom VARCHAR(50),
//     nationalité VARCHAR(50),
//     sexe ENUM('male', 'female')

// );
// ";


// $comptstable = "
// CREATE TABLE compts (
//     id_compts INT AUTO_INCREMENT PRIMARY KEY,
//     rib INT(50),
//     balance INT(50),
//     devise VARCHAR(50),
//     id_client INT(20)

// );
// ";



// $transactionstable = "
// CREATE TABLE transactions (
//     id_transactions INT AUTO_INCREMENT PRIMARY KEY,
//     montant INT(50),
//     type ENUM('débit' , 'crédit'),
//     id_compts INT(20)

// );
// ";


// if ($cnx->query($transactionstable) === TRUE) {
//     echo "Table created successfully";
// } else {
//     echo "Error creating table: " . $cnx->error;
// }




// <!-----------------------------------tables----------------------------------------->




// <!-----------------------------------insert into tables----------------------------------------->



$firstclient = "
INSERT INTO Client (nom, prenom, nationalité, sexe)

VALUES 
 ('agourd', 'ahmed', 'marocain', 'male'),
('agourd', 'oualid', 'marocain', 'male');
";




// $firstcompts = "
// INSERT INTO compts (rib, balance, devise, id_client)
// VALUES 
//  ('27564466494656', '7000', 'MAD', '1'),
//  ('28564465654885', '2000', 'MAD', '1'),
//  ('29564466494999', '100', 'MAD', '1'),
//  ('27999466494656', '10000', 'MAD', '2'),
//  ('28999466494656', '3000', 'MAD', '2'),
//  ('26699466494656', '200', 'MAD', '2');
// ";





// $firsttransactions = "
// INSERT INTO transactions (montant, type, id_compts)

// VALUES 
//   ('1000', 'crédit', '1'),
//   ('2000', 'débit', '1'),
//   ('1500', 'crédit', '2'),
//   ('3000', 'débit', '2'),
//   ('1000', 'débit', '3'),
//   ('6000', 'crédit', '3'),
//   ('1500', 'débit', '4'),
//   ('7000', 'crédit', '5'),
//   ('2000', 'débit', '5'),
//   ('3000', 'crédit', '6'),
//   ('1000', 'crédit', '6');

// ";



if (!$cnx->query($firsttransactions)) {
    die("Client not inserted: " . $cnx->error);
} else {
    echo "Client inserted successfully";
}
// <!-----------------------------------insert into tables----------------------------------------->
?>

