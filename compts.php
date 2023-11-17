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
                <a href="index.php">Home</a>
                <a href="client.php">Client</a>
                <a href="compts.php">Compts</a>
                <a href="transaction.php">Transactions</a>
            </nav>
        </header>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "gestion_banque";
        $cnx = new mysqli($servername, $username, $password, $databasename);
        ?>


        <h1 class="text-[55px] h-[10%] mb-[20px] text-center text-white">Gestionaire Bancaire</h1>

        <?php
        // Check if the button is clicked and if the client_id is set
        if (isset($_POST['submit']) && isset($_POST['client_id'])) {
            // Sanitize the input to prevent SQL injection
            $client_id = $cnx->real_escape_string($_POST['client_id']);


            // Your SQL query goes here to fetch client data
            $client_sql = "SELECT id_client, nom, prenom, nationalité, sexe FROM Client WHERE id_client = '$client_id'";
            $client_result = $cnx->query($client_sql);

            if ($client_result->num_rows > 0) {
                // output client data
                $client_row = $client_result->fetch_assoc();
                echo "<div class ='flex w-[100%]  justify-center h-[60px] border-[2px] border-white border-solid items-center text-white'>";
               
                echo "<p class='border-[2px] border-white border-solid w-[25%] h-[100%] flex items-center  justify-center'>Nom : " . $client_row["nom"] . "</p>";
                echo "<p class='border-[2px] border-white border-solid w-[25%] h-[100%] flex items-center  justify-center'>Prénom : " . $client_row["prenom"] . "</p>";
                echo "<p class='border-[2px] border-white border-solid w-[25%] h-[100%] flex items-center  justify-center'>Nationalité : " . $client_row["nationalité"] . "</p>";
                echo "<p class='border-[2px] border-white border-solid w-[25%] h-[100%] flex items-center  justify-center'>Genre : " . $client_row["sexe"] . "</p>";
                echo "</div>";
            }

            // Your SQL query goes here
            $sql = "SELECT * FROM `compts` WHERE id_client = '$client_id'";
            $result = $cnx->query($sql);

            // Process the query result
            if ($result->num_rows > 0) {

                echo '<table class="leading-9 h-[90%] w-[100%] text-center text-white">';
                echo '<thead>
                        <tr>
                            <th class = "border-[2px] border-white border-solid w-[15%]">ID</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">RIB</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">Balance</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">Devise</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">ID_client</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">Détails</th>
                        </tr>
                    </thead>';
                while ($row = $result->fetch_assoc()) {
                    // Process each row of data
                    echo '<form action="transaction.php" method="post" class="h-[50vh] items-start">';
                    echo "<tr><td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["id_compts"] . " </td>
                    <td class = 'border-[2px] border-white border-solid w-[15%]'> " . $row["rib"] . "</td>
                    <td class = 'border-[2px] border-white border-solid w-[15%]'> " . $row["balance"] . " </td>
                    <td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["devise"] . "</td>
                    <td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["id_client"] . "</td>
                    <td class = 'border-[2px] border-white border-solid w-[15%]'>
                    <input type='hidden' name='compts_id' value='" . $row["id_compts"] . "'>
                    <input type='submit' name='submit' class='hight-[80px] cursor-pointer	  w-[100%] hover:bg-black bg-white hover:text-white text-black ' value='transaction'>
                </td>
            </tr>";
                }
                echo '</table></form>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        } else {
            // Display the form in any case, so the user can select a client
            $sqlall = "SELECT * FROM `compts`";
            $result2 = $cnx->query($sqlall);

            if ($result2->num_rows > 0) {

                echo '<table class="leading-9 h-[90%] w-[100%] text-center h-[50vh] items-start text-white">';
                echo '<thead>
                        <tr>
                            <th class = "border-[2px] border-white border-solid w-[15%]">ID</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">RIB</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">Balance</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">Devise</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">ID_client</th>
                            <th class = "border-[2px] border-white border-solid w-[15%]">Détails</th>
                        </tr>
                    </thead>';
                while ($row = $result2->fetch_assoc()) {
                    echo '<form action="transaction.php" method="post" class="h-[50vh] items-start" >';
                    echo "<tr>
                            <td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["id_compts"] . " </td>
                            <td class = 'border-[2px] border-white border-solid w-[15%]'> " . $row["rib"] . "</td>
                            <td class = 'border-[2px] border-white border-solid w-[15%]'> " . $row["balance"] . " </td>
                            <td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["devise"] . "</td>
                            <td class = 'border-[2px] border-white border-solid w-[15%]'>" . $row["id_client"] . "</td>
                            
                            <td class = 'border-[2px] border-white border-solid w-[15%]'>
                                <input type='hidden' name='compts_id' value='" . $row["id_compts"] . "'>
                                <input type='submit' name='submit' class='hight-[80px] cursor-pointer	  w-[100%] hover:bg-black bg-white hover:text-white text-black ' value='transaction'>
                            </td>
                        </tr>";
                }
                echo '</table></form>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        }

        $cnx->close();
        // Check if the button is clicked and if the client_id is set

        ?>
    </section>

    <footer class="bg-black h-[5vh] border-l-8 border-r-8 border-white border-solid">
        <h2 class="text-center text-white">copyright 2023</h2>
    </footer>
</body>

</html>