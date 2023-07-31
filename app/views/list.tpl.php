<?php 
$pokemons = $viewVars['pokemons'];

if(!empty($pokemons)) {
    echo "<ul class='main_list'>";
    foreach($pokemons as $pokemon): ?>
        <li>
            <a href="<?= $_SERVER['BASE_URI']. '/detail/'. $pokemon->getNumber(); ?>">
                <img class="illustration" src="<?= $_SERVER['BASE_URI'] . '/img/' . $pokemon->getNumber() . '.png' ?>" alt="<?= $pokemon->getName() ?>">
                <div class="name"><span class="number">#<?= $pokemon->getNumber() ?></span> <?= $pokemon->getName() ?></div>
            </a>
        </li>
    <?php endforeach;
    echo "</ul>";
} else {
    echo "I couldn't find anything!";
}