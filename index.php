<?php

if (!isset($_GET['search'])){
    $search = 1;
}
else {
    $search = $_GET['search'];
}

    $pokeLink = "https://pokeapi.co/api/v2/pokemon/".$search;
    $pokeData = file_get_contents($pokeLink);
    $pokemonData = json_decode($pokeData, true);
    $id = $pokemonData['id'];

///////////////////////// SPRITE ////////////////////////////

    $pokePic = isset($pokemonData['sprites']['front_default']) ? $pokemonData['sprites']['front_default'] : '';
    // (if statement!!)
    $sprite = $pokePic;

///////////////////////// MOVES ///////////////////////////////

    $pokeMoves = $pokemonData['moves'];
        if(count($pokeMoves) > 4){
            $move1 = $pokeMoves[0]["move"]["name"];
            $move2 = $pokeMoves[1]["move"]["name"];
            $move3 = $pokeMoves[2]["move"]["name"];
            $move4 = $pokeMoves[3]["move"]["name"];
        }elseif(count($pokeMoves) == 1){
            $move1 = $pokeMoves[0]["move"]["name"];
            $move2 = '-';
            $move3 = '-';
            $move4 = '-';
        }else{
            $move1 = '-';
            $move2 = '-';
            $move3 = '-';
            $move4 = '-';
        }


///////////////////////// TYPES /////////////////////////

    $pokeType = $pokemonData['types'];
    $types = ($pokeType);
       if (count($pokeType) == 2){
           $type1 = $pokeType[0]['type']['name'];
           $type2 = $pokeType[1]['type']['name'];
       } else{
           $type1 = $pokeType[0]['type']['name'];
           $type2 = '-';
       }

///////////////////////// SPECIES /////////////////////////

      // $species = "https://pokeapi.co/api/v2/pokemon-species/";

      // $s_DATA = file_get_contents($species . $id . '/');
     //  $pokeSpecies = json_decode($s_DATA, true);

     //  $speciesPic = $pokeSpecies['chain']['evolves_to']['url'];
       // $evoOne = ($speciesPic);
            //if(count($pokeSpecies)==;







    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Megrim&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/f4d1593471d222ddebd973210265762a?family=Pokemon" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Pokédex</title>
</head>
<body>
<header>
    <h1>Pokédex</h1>
</header>




<div class="superContainer" id="superContainer">
    <div class="main-container" id="main-container">
        <div class="main-screen" id="main-screen">
            <div class="front-sprite" id="front-sprite">
                <img id="poke-sprite" src="<?php echo $sprite ?>" alt="woops" >
                <p id="poke-name"><?php echo $pokemonData['name'] ?></p>
                <p id="poke-id"><?php echo $id?></p>
            </div>
            <div class="weight" id="weight"><p><?php echo $pokemonData['weight']?></p> </div>
            <div class="height" id="height"><p><?php echo $pokemonData['height']?></p> </div>
        </div>
        <div class="type-screen" id="type-screen">
            <div class="type1-s" id="type1-s"><?php echo $type1 ?></div>
            <div class="type2-s" id="type2-s"><?php echo $type2 ?></div>
        </div>
        <div class="buttons" id="buttons">
            <div class="btn-up" id="btn-up" onclick="nextEvolution()"></div>
            <div class="btn-r" id="btn-r" onclick="nextPokemon()"></div>
            <div class="btn-down" id="btn-down" onclick="previousEvolution()"></div>
            <div class="btn-l" id="btn-l" onclick="previousPokemon()"></div>
        </div>
    </div>
    <div class="right-container" id="right-container">
        <div class="move-screen" id="move-screen">
            <div class="move1" id="move1"><p class="moves"> <?php echo $move1?></p></div>
            <div class="move2" id="move2"><p class="moves"> <?php echo $move2?></p></div>
            <div class="move3" id="move3"><p class="moves"> <?php echo $move3?></p></div>
            <div class="move4" id="move4"><p class="moves"> <?php echo $move4?></p></div>
        </div>
        <div class="evolutions" id="evolutions">
            <img src="" alt="" id="img-1">
            <img src="" alt="" id="img-2">
            <img src="" alt="" id="img-3">
        </div>
        <div class="input-field" id="input-field">
            <form action="" method="get"  >
            <input type="text" id="text-num" name="search"  placeholder=" Pokémon name or id">
            </form>
        </div>
    </div>
</div>




<!--<script src="pokedex.js"></script>-->
</body>
</html>