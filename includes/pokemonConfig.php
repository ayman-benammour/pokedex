<?php
$resultJsonSpecies = apiCall($urlSpecies);
$resultJsonPokemon = apiCall($urlPokemon);

$colorOfPokemon = $resultJsonSpecies->color->name;
$colorBackground = '#000000';

switch($colorOfPokemon)
{
    case 'black':
        $colorBackground = '#252525';
        break;
    
    case 'blue':
        $colorBackground = '#aec8db';
        break;
    
    case 'brown':
        $colorBackground = '#b1957d';
        break;

    case 'gray':
        $colorBackground = '#616161';
        break;
    
    case 'green':
        $colorBackground = '#c4e3d4';
        break;
    
    case 'pink':
        $colorBackground = '#d0768f';
        break;
    
    case 'purple':
        $colorBackground = '#aa8beb';
        break;
    
    case 'red':
        $colorBackground = '#ebbcb4';
        break;
    
    case 'white':
        $colorBackground = '#e1e1e1';
        break;
    
    case 'yellow':
        $colorBackground = '#ffe28a';
        break;
}