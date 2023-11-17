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
    <section class="min-h-[95vh] w-[100vw] bg-[url('homeback.png')] bg-cover">
        <header class="navbr w-[100%] h-[10vh] ;
    
">
            <nav class="h-[100%] flex gap-4 justify-center text-white items-center">
                <a href="index.php" class="hover:text-gray-200">Home</a>
                <a href="client.php" class="hover:text-gray-200">Client</a>
                <a href="compts.php" class="hover:text-gray-200">Compts</a>
                <a href="transaction.php" class="hover:text-gray-200">Transactions</a>
            </nav>
        </header>

        <div class="h-[70vh] flex flex-col gap-[50px] justify-center items-center bg-black/20">
            <h1 class="md:text-[60px] text-[35px] text-white font-bold	">Apex Wealth banque</h1>
            <p class="md:text-[20px] text-[10px] text-white text-center font-semibold	 ">À la Banque Apex Wealth, nous propulsons votre parcours financier. Atteignez le sommet <br>de la prospérité avec nos solutions sur mesure et notre soutien indéfectible.</p>
            <button class=' md:h-[50px] h-[30px] cursor-pointer md:text-[15px] text-[8px] w-[20%]	 md:w-[12%] hover:bg-cyan-600 rounded-xl	 white bg-gray-200 hover:text-black text-black flex justify-center  md:gap-[12px] gap-[5px] items-center'><a href="client.php">Clients List</a><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg></button></a>
        </div>
    </section>
    <footer class="text-center h-[5vh] text-white bg-black flex items-center justify-center">
        <h2 >Copyright © 2030 Hashtag Developer. All Rights Reserved</h2>
    </footer>