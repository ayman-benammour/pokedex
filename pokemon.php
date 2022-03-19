<?php

// Includes
include './includes/config.php';

$urlPokemon = 'https://pokeapi.co/api/v2/pokemon/' . strtolower($pokemon);
$urlSpecies = 'https://pokeapi.co/api/v2/pokemon-species/' . strtolower($pokemon);

$resultJsonPokemon = apiCall($urlPokemon);
$resultJsonPokemonSpecies = apiCall($urlSpecies);

$colorOfPokemon = $resultJsonPokemonSpecies->color->name;
$colorBackground = '#000000';

switch($colorOfPokemon)
{
    case 'black':
        $colorBackground = '#252525';
        break;

    case 'blue':
        $colorBackground = '#002a4a';
        break;

    case 'brown':
        $colorBackground = '#624226';
        break;
        
    case 'gray':
        $colorBackground = '#616161';
        break;

    case 'green':
        $colorBackground = '#7bad56';
        break;

    case 'pink':
        $colorBackground = '#d0768f';
        break;

    case 'purple':
        $colorBackground = '#7a29d6';
        break;

    case 'red':
        $colorBackground = '#b22e2f';
        break;

    case 'white':
        $colorBackground = '#c7c7c7';
        break;

    case 'yellow':
        $colorBackground = '#ffc000';
        break;
}

$typesOfPokemon = $resultJsonPokemon->types;

?>

<!-- HEADER -->
<?php include './chunks/header.php' ?>
<link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body style="background-color:<?= $colorBackground ?>">

    <!-- GRID -->
    <div class="grid">

        <!-- HEADER -->
        <div class="header">

            <!-- BUTTON PREVIOUS -->
            <a href="./index.php" class="buttonPrevious">
                <img src="./assets/images/previous-icon.svg" alt="Previous">
            </a>

            <!-- NAME AND NUMBER OF POKEMON -->
            <div class="titlePokemon">
                <div class="numberOfPokemon"><?= str_pad($resultJsonPokemon->id,  4, "#00", STR_PAD_LEFT) ?></div>
                <div class="nameOfPokemon"><?= ucfirst($resultJsonPokemon->name) ?></div>
            </div>

        </div>

        <!-- POKEMON IMAGE AND JAPANESE NAME -->
        <div class="pokemonHero">
            <div class="imageOfPokemon"><img src="<?= $resultJsonPokemon->sprites->other->{'official-artwork'}->front_default ?>"></div>
            <div class="nameOfPokemonJapanese"><?= $resultJsonPokemonSpecies->names[0]->name ?></div>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <div class="infos">
                <div class="heightOfPokemon"><span>Height</span>&nbsp-&nbsp<?= $resultJsonPokemon->height / 10 ?>&nbspm</div>
                <div class="weightOfPokemon"><span>Weight</span>&nbsp-&nbsp<?= $resultJsonPokemon->weight / 10 ?>&nbspkg</div>
                <div class="typeOfPokemon"><span>Type</span>&nbsp-
                    <?php foreach ($typesOfPokemon as $key => $typeOfPokemon) { ?>
                        <?= ($key!=0 ? '& ' : '') . ucfirst($typeOfPokemon->type->name)  ?>
                    <?php } ?>
                </div>
            </div>
            
            <div class="bioOfPokemon">
                <div class="title">Bio</div>
                <div class="contentOfBio"><?= str_replace("", " ", $resultJsonPokemonSpecies->flavor_text_entries[0]->flavor_text) ?></div>
            </div>
        </div>

    </div>



<!-- FOOTER -->
<?php include './chunks/footer.php' ?>