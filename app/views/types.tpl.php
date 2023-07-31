<div class="types_list">
    <p>Cliquez sur un type pour voir tous les Pokémon de ce type</p>
    <?php  $types = $viewVars['types'];

    if(!$types) {
      echo "Oups, aucun type trouvé !";
    } else {
        echo "<ul>";
        foreach ($types as $type): ?>
            <li class="type" style="background: #<?= $type->getColor() ?>;">
                <a href="<?= $_SERVER['BASE_URI'] . '/type/' . $type->getId() ?>"><?php echo $type->getName() ?></a>
            </li>
        <?php endforeach;
        echo "</ul>";
    }?>
</div>