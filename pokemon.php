<?php

// Includes
include './includes/config.php';

$urlPokemonsList = 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=30';

$urlPokemon = 'https://pokeapi.co/api/v2/pokemon/' . strtolower($pokemon);
$urlSpecies = 'https://pokeapi.co/api/v2/pokemon-species/' . strtolower($pokemon);

$resultJsonPokemon = apiCall($urlPokemon);
$resultJsonSpecies = apiCall($urlSpecies);

include './includes/pokemonConfig.php';

$hpStat = $resultJsonPokemon->stats[0]->base_stat / 2.55;
$attackStat = $resultJsonPokemon->stats[1]->base_stat / 2.55;
$defenseStat = $resultJsonPokemon->stats[2]->base_stat / 2.55;
$specialAttackStat = $resultJsonPokemon->stats[3]->base_stat / 2.55;
$specialDefenseStat = $resultJsonPokemon->stats[4]->base_stat / 2.55;
$speedStat = $resultJsonPokemon->stats[5]->base_stat / 2.55;

?>

<!-- HEADER -->
<?php include './chunks/header.php' ?>
<!-- CSS -->
<link rel="stylesheet" href="../assets/styles/style.css">
<link rel="stylesheet" href="../assets/styles/stylePokedex.css">
<link rel="stylesheet" href="../assets/styles/stylePokemon.css">
</head>
<body>

    <div class="grid">
        <div class="header">
            <a class="previousIcon" href="./pokemon.php?pokemon=<?= $pokemon - 1?>">
                <img src="./assets/images/previous-icon.svg">
            </a>
            <div class="title">
                <div class="namePokemon"><?= ucfirst($resultJsonPokemon->name) ?></div>
                <div class="idPokemon"><?= str_pad($resultJsonPokemon->id,  3, "00", STR_PAD_LEFT) ?></div>
            </div>
            <a class="nextIcon" href="./pokemon.php?pokemon=<?= $pokemon + 1?>">
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

                    $urlPokemonFromEvolution = 'https://pokeapi.co/api/v2/pokemon/' . $evolution;
                    $resultJsonPokemonFromEvolution = apiCall($urlPokemonFromEvolution);
                    ?>
                    <a class="miniCardPokemon" href="./pokemon.php?pokemon=<?= $resultJsonPokemonFromEvolution->id ?>" style="background-color:<?= $colorBackground ?>">
                        <img src="<?= $resultJsonPokemonFromEvolution->sprites->other->{'official-artwork'}->front_default ?>">
                    </a>
                    <?php } ?>
                </div>
            </div>

            <div class="typesContent">
                <?php
                    foreach ($resultJsonPokemon->types as $key => $typeOfPokemon) 
                    {
                ?>
                    <div class="typePokemon">
                        <img src="./assets/images/types/type-<?= $typeOfPokemon->type->name ?>.svg" alt="Type <?= $typeOfPokemon->type->name ?>" width="80px" height="80px">
                        <h3><?= ucfirst($typeOfPokemon->type->name) ?></h3>
                    </div>
                    
                <?php } ?>
            </div>

            <div class="statsContent">
                <div class="listStats">

                    <!-- HP -->
                    <p>HP</p>
                    <div class="barStat">
                        <div class="hpStat" style="background-color: #90ee90; width: <?= $hpStat ?>%;"></div>
                    </div>

                    <!-- Attack -->
                    <p>Attack</p>
                    <div class="barStat">
                        <div class="attackStat" style="background-color: #f08080; width: <?= $attackStat ?>%;"></div>
                    </div>

                    <!-- Defense -->
                    <p>Defense</p>
                    <div class="barStat">
                        <div class="defenseStat" style="background-color: #add8e6; width: <?= $defenseStat ?>%;"></div>
                    </div>

                    <!-- Special attack -->
                    <p>Special attack</p>
                    <div class="barStat">
                        <div class="specialAttackStat" style="background-color: #ffa07a; width: <?= $specialAttackStat ?>%;"></div>
                    </div>

                    <!-- Special defense -->
                    <p>Special defense</p>
                    <div class="barStat">
                        <div class="specialDefenseStat" style="background-color: #b0c4de; width: <?= $specialDefenseStat ?>%;"></div>
                    </div>

                    <!-- Speed -->
                    <p>Speed</p>
                    <div class="barStat">
                        <div class="speedStat" style="background-color: #87cefa; width: <?= $speedStat ?>%;"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>

<!-- FOOTER -->
<?php include './chunks/footer.php' ?>