<?php

// Includes
include './includes/config.php';

$urlPokemonsList = 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=30';

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
<link rel="stylesheet" href="../assets/styles/stylePokedex.css">
</head>
<body>

    <main class="grid">
        <header class="header">
            <h1 class="mainTitle">Pokédex</h1>
            <h3 class="descTitle">Search for a Pokémon by name or using its National Pokédex number</h3>
            <!-- FORM -->
            <form class="form" action="./pokemon.php?pokemon=<?= $pokemon ?>" method="GET">
                <!-- Search bar -->
                <input class="inputSubmit" type="submit" value="">
                <input href="./" class="inputText" type="search" placeholder="Name or number" name="pokemon" value="<?= $pokemon ?>">
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
                <a href="./pokemon.php?pokemon=<?= $key + 1 ?>" class="pokemonCard" style="background-color:<?= $colorBackground ?>">
                    <img class="spritePokemonCard" src="<?= $resultJsonPokemon->sprites->other->{'official-artwork'}->front_default ?>" alt="Image of Pokemon">
                    <h2 class="namePokemonCard"><?= ucfirst($nameOfPokemon) ?></h2>
                    <h3 class="idPokemonCard"><?= $key + 1 ?></h3>
                </a>
            <?php } ?>
        </section>
    </main>



<!-- FOOTER -->
<?php include './chunks/footer.php' ?>