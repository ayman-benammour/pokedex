<?php

// Includes
include './includes/config.php';

$page = $_GET['page'];
$startAt = ($page - 1) * 30;

$urlPokemonsList = 'https://pokeapi.co/api/v2/pokemon/?offset=' . $startAt . '&limit=30';

$resultJsonPokemonsList = apiCall($urlPokemonsList);

$pokemonsList = $resultJsonPokemonsList->results;

$key = 0;

$urlPokemon = 'https://pokeapi.co/api/v2/pokemon/' . strtolower($key + 1);
$urlSpecies = 'https://pokeapi.co/api/v2/pokemon-species/' . strtolower($key + 1);

$resultJsonPokemon = apiCall($urlPokemon);
$resultJsonSpecies = apiCall($urlSpecies);

?>

<!-- HEADER -->
<?php include './chunks/header.php' ?>
<!-- CSS -->
<link rel="stylesheet" href="../assets/styles/style.css">
<link rel="stylesheet" href="../assets/styles/stylePokedex.css">
</head>
<body>

    <main class="grid">
        <header class="header">
            <h1 class="mainTitle">Pokédex</h1>
            <h3 class="descTitle">Search for a Pokémon by using its National Pokédex number</h3>
            <!-- FORM -->
            <form class="form" action="./pokemon.php?pokemon=<?= $pokemon ?>" method="GET">
                <!-- Search bar -->
                <input class="inputSubmit" type="submit" value="">
                <input class="inputText" type="number" placeholder="Number" name="pokemon" value="<?= $pokemon ?>">
            </form>
        </header>

        <section class="listPokemon">
            <?php foreach ($pokemonsList as $key => $pokemonList)
            {
                $nameOfPokemon = $pokemonList->name;

                $urlSpecies = 'https://pokeapi.co/api/v2/pokemon-species/' . $nameOfPokemon;
                $urlPokemon = 'https://pokeapi.co/api/v2/pokemon/' . $nameOfPokemon;

                include './includes/pokemonConfig.php';
            ?>
                <a href="./pokemon.php?pokemon=<?= $resultJsonPokemon->id ?>" class="pokemonCard" style="background-color:<?= $colorBackground ?>">
                    <img class="spritePokemonCard" src="<?= $resultJsonPokemon->sprites->other->{'official-artwork'}->front_default ?>" alt="Image of Pokemon">
                    <h2 class="namePokemonCard"><?= ucfirst($nameOfPokemon) ?></h2>
                    <h3 class="idPokemonCard"><?= $resultJsonPokemon->id ?></h3>
                </a>
            <?php } ?>
        </section>

        <div class="paging">

            <a class="previousIcon" href="./pokedex.php?page=<?= $page - 1?>">
                <img src="./assets/images/previous-icon.svg">
            </a>

            <form action="./pokedex.php?page=<?= $page ?>" method="GET">
                <select name="page">
                    <?php
                        for($id = 1; $id <= 30; $id++)
                        {
                    ?>
                        <option value="<?= $id ?>">Page <?= $id ?></option>
                    <?php 
                        } 
                        $id = $page;
                    ?>
                </select>
                <input type="submit" value="Go">
            </form>

            <a class="nextIcon" href="./pokedex.php?page=<?= $page + 1?>">
                <img src="./assets/images/next-icon.svg">
            </a>
            
        </div>

    </main>



<!-- FOOTER -->
<?php include './chunks/footer.php' ?>