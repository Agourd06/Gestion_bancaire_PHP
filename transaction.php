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
        if (isset($_POST['submit']) && isset($_POST['compts_id'])) {
            // Sanitize the input to prevent SQL injection
            $compts_id = $cnx->real_escape_string($_POST['compts_id']);

             // Your SQL query goes here to fetch client data
             $compts_sql = "SELECT * FROM compts WHERE id_compts = '$compts_id'";
             $compts_result = $cnx->query($compts_sql);
     
             if ($compts_result->num_rows > 0) {
                 // output client data
                 $compts_row = $compts_result->fetch_assoc();
                 echo "<div class ='flex w-[100%]  justify-center h-[60px] border-[2px] border-white border-solid items-center text-white'>";
        
                 echo "<p class='border-[2px] border-white border-solid w-[25%] h-[100%] flex items-center  justify-center'>RIB: " . $compts_row["rib"] . "</p>";
                 echo "<p class='border-[2px] border-white border-solid w-[25%] h-[100%] flex items-center  justify-center''>BALANCE: " . $compts_row["balance"] . "</p>";
                 echo "<p class='border-[2px] border-white border-solid w-[25%] h-[100%] flex items-center  justify-center'>Device: " . $compts_row["devise"] . "</p>";
                 echo "<p class='border-[2px] border-white border-solid w-[25%] h-[100%] flex items-center  justify-center'>Client ID: " . $compts_row["id_client"] . "</p>";
                 echo "</div>";
             }

            // Your SQL query goes here
            $sql = "SELECT * FROM `transactions` WHERE id_compts = '$compts_id'";
            $result = $cnx->query($sql);

            // Process the query result
            if ($result->num_rows > 0) {
                echo '<table class="leading-9 h-[90%] w-[100%] text-center text-white">';
                echo '<thead>
                        <tr>
                            <th class = "border-[2px] border-white border-solid w-[25%]">ID</th>
                            <th class = "border-[2px] border-white border-solid w-[25%]">montant</th>
                            <th class = "border-[2px] border-white border-solid w-[25%]">type</th>
                            <th class = "border-[2px] border-white border-solid w-[25%]">id_compts</th>
                        </tr>
                    </thead>';
                while ($row = $result->fetch_assoc()) {
                    // Process each row of data
                    echo "<tr>
                            <td class = 'border-[2px] border-white border-solid w-[25%]'>" . $row["id_transactions"] . " </td>
                            <td class = 'border-[2px] border-white border-solid w-[25%]'> " . $row["montant"] . "</td>
                            <td class = 'border-[2px] border-white border-solid w-[25%]'> " . $row["type"] . " </td>
                            <td class = 'border-[2px] border-white border-solid w-[25%]'>" . $row["id_compts"] . "</td>
                        </tr>";
                }
                echo '</table>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        } else {
            // Display the form in any case, so the user can select a client
            $sqlall = "SELECT * FROM `transactions`";
            $result2 = $cnx->query($sqlall);

            if ($result2->num_rows > 0) {
                
                echo '<table class="leading-9 h-[90%] w-[100%] text-center text-white ">';
                echo '<thead>
                        <tr>
                            <th class = "border-[2px] border-white border-solid w-[25%]">ID</th>
                            <th class = "border-[2px] border-white border-solid w-[25%]">montant</th>
                            <th class = "border-[2px] border-white border-solid w-[25%]">type</th>
                            <th class = "border-[2px] border-white border-solid w-[25%]">id_compts</th>
                        </tr>
                    </thead>';
                while ($row = $result2->fetch_assoc()) {
                    echo "<tr>
                            <td class = 'border-[2px] border-white border-solid w-[25%]'>" . $row["id_transactions"] . " </td>
                            <td class = 'border-[2px] border-white border-solid w-[25%]'> " . $row["montant"] . "</td>
                            <td class = 'border-[2px] border-white border-solid w-[25%]'> " . $row["type"] . " </td>
                            <td class = 'border-[2px] border-white border-solid w-[25%]'>" . $row["id_compts"] . "</td>
                        </tr>";
                }
                echo '</table>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        }

        $cnx->close();
        ?>
    </section>

    <footer class="bg-black h-[5vh] border-l-8 border-r-8 border-white border-solid">
        <h2 class="text-center text-white">copyright 2023</h2>
    </footer>
</body>

</html>