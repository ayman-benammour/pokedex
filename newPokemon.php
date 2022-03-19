<?php

// Includes
include './includes/config.php';

$urlPokemonsList = 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=30';

$urlPokemon = 'https://pokeapi.co/api/v2/pokemon/' . strtolower($pokemon);
$urlSpecies = 'https://pokeapi.co/api/v2/pokemon-species/' . strtolower($pokemon);

$resultJsonPokemon = apiCall($urlPokemon);
$resultJsonSpecies = apiCall($urlSpecies);

include './includes/pokemonConfig.php';

?>

<!-- HEADER -->
<?php include './chunks/header.php' ?>
<!-- CSS -->
<link rel="stylesheet" href="../assets/styles/stylePokedex.css">
<link rel="stylesheet" href="../assets/styles/stylePokemon.css">
</head>
<body>

    <div class="grid">
        <div class="header">
            <a class="previousIcon" href="./newPokemon.php?pokemon=<?= $pokemon - 1?>">
                <img src="./assets/images/previous-icon.svg">
            </a>
            <div class="title">
                <div class="namePokemon"><?= ucfirst($resultJsonPokemon->name) ?></div>
                <div class="idPokemon"><?= str_pad($resultJsonPokemon->id,  3, "00", STR_PAD_LEFT) ?></div>
            </div>
            <a class="nextIcon" href="./newPokemon.php?pokemon=<?= $pokemon + 1?>">
                <img src="./assets/images/next-icon.svg">
            </a>
        </div>

        <div class="cardPokemon" style="background-color:<?= $colorBackground ?>">
            <img src="<?= $resultJsonPokemon->sprites->other->{'official-artwork'}->front_default ?>">
        </div>

        <div class="categoriesButtons">
            <div class="infosButton buttonActive">Infos</div>
            <div class="formsButton">Forms</div>
            <div class="typesButton">Types</div>
            <div class="statsButton">Stats</div>
        </div>

        <div class="categoriesContent">

            <div class="infosContent contentActive">
                <div class="heightPokemon"><span>Height</span>&nbsp-&nbsp<?= $resultJsonPokemon->height / 10 ?>&nbspm</div>
                <div class="weightPokemon"><span>Weight</span>&nbsp-&nbsp<?= $resultJsonPokemon->weight / 10 ?>&nbspkg</div>
                <div class="bioPokemon"><span>Bio</span><?= str_replace("", " ", $resultJsonSpecies->flavor_text_entries[0]->flavor_text) ?></div>
            </div>

            <div class="formsContent">
                <div class="cardsList">
                    <?php
                    include './includes/pokemonChainArray.php';

                    foreach ($evolutionChainArray as $key => $evolution) 
                    {

                    $urlPokemon = 'https://pokeapi.co/api/v2/pokemon/' . $evolution;
                    $resultJsonPokemon = apiCall($urlPokemon);
                    ?>
                    <a class="miniCardPokemon" href="./newPokemon.php?pokemon=<?= $resultJsonPokemon->id ?>" style="background-color:<?= $colorBackground ?>">
                        <img src="<?= $resultJsonPokemon->sprites->other->{'official-artwork'}->front_default ?>">
                    </a>
                    <?php } ?>
                </div>
            </div>

            <div class="typesContent"></div>
            <div class="statsContent">
                <div class="listStats">

                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>

<!-- FOOTER -->
<?php include './chunks/footer.php' ?>