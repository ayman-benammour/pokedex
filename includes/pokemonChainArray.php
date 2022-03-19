<?php

$evolutionChain = apiCall($resultJsonSpecies->evolution_chain->url);

$evolution1 = $evolutionChain->chain->species->name;

$evolutionChainArray = [$evolution1];

$isEvolution2 = !empty($evolutionChain->chain->evolves_to);
if ($isEvolution2) 
{
    $evolution2 = $evolutionChain->chain->evolves_to[0]->species->name;

    array_push($evolutionChainArray, $evolution2);

    $isEvolution3 = !empty($evolutionChain->chain->evolves_to[0]->evolves_to);
    if($isEvolution3)
    {
        $evolution3 = $evolutionChain->chain->evolves_to[0]->evolves_to[0]->species->name;

        array_push($evolutionChainArray, $evolution3);
    }
}