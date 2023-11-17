<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gestionaire Bancaire</title>
    <style>
     header {
    
    filter: drop-shadow(4px 4px 5px rgba(255, 255, 255));
    border: 1px white solid;
     }
    </style>
</head>

<body>
<section class="min-h-[95vh] w-[100vw] bg-[url('back.png')] bg-cover">
<header class="navbr w-[100%] h-[10vh] ;
    
    ">
                <nav class="h-[100%] flex gap-4 justify-center text-white items-center">
                    <a href="index.php" class="hover:text-gray-200">Home</a>
                    <a href="client.php" class="hover:text-gray-200">Client</a>
                    <a href="compts.php" class="hover:text-gray-200">Compts</a>
                    <a href="transaction.php" class="hover:text-gray-200">Transactions</a>
                </nav>
            </header>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";



    // Create connection

    $databasename = "gestion_banque";
    $Dbcreation = "CREATE DATABASE IF NOT EXISTS $databasename";

    // if ($cnx->query($Dbcreation)) {
    //     die("database not created<br>" . $cnx->error);
    // } else {
    //     echo "<br>Database created successfully";
    // }
    // ... (your existing code)



    // ... (the rest of your code)



    // $cnx = new mysqli($servername, $username, $password);
    // // Check connection
    // if (!$cnx->query($Dbcreation)) {
    //     die("Connection failed: " . $cnx->error);
    // } else {
    //     echo "Connected successfully";
    // }

    $cnx = new mysqli($servername, $username, $password, $databasename);


    ?>
   
        <h1 class="text-[55px] text-white text-center">Gestionaire Bancaire</h1>

        <table class="leading-9 w-[100%] text-center">
            <thead class="text-white">
                <tr>
                    <th class = "border-[2px] border-white border-solid w-[15%]">ID</th>
                    <th class = "border-[2px] border-white border-solid w-[15%]">Nom</th>
                    <th class = "border-[2px] border-white border-solid w-[15%]">Prénom</th>
                    <th class = "border-[2px] border-white border-solid w-[15%]">Nationalité</th>
                    <th class = "border-[2px] border-white border-solid w-[15%]">genre</th>
                    <th class = "border-[2px] border-white border-solid w-[15%]">Détails</th>
                </tr>
                <?php
                $sql = "SELECT id_client, nom, prenom, nationalité, sexe FROM Client";
                $result = $cnx->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
            <td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["id_client"] . " </td>
            <td class = 'border-[2px] border-white border-solid w-[15%]'> " . $row["nom"] . "</td>
            <td class = 'border-[2px] border-white border-solid w-[15%]'> " . $row["prenom"] . " </td>
            <td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["nationalité"] . "</td>
            <td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["sexe"] . "</td>
            <td class = 'border-[2px] border-white border-solid w-[15%]'>
                <form action='compts.php' method='post' h-[50vh] items-start'>
                    <input type='hidden' name='client_id' value='" . $row["id_client"] . "'>
                    <input type='submit' class='hight-[80px] cursor-pointer	 w-[100%] hover:bg-black bg-white hover:text-white text-black ' name='submit' value='Compts'>
                </form>
            </td>
          </tr><br>";
                    }
                } else {
                    /* echo "0 results";*/
                }

                $cnx->close();
                ?>
            </thead>


        </table>

    </section>
    <footer class="text-center h-[5vh] text-white bg-black flex items-center justify-center">
        <h2 >Copyright © 2030 Hashtag Developer. All Rights Reserved</h2>
    </footer>
</body>

</html>