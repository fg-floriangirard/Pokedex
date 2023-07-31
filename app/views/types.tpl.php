<div class="types_list">
    <p>Click on a type to see every Pokemon from this type</p>
    <?php  $types = $viewVars['types'];

    if(!$types) {
        echo "Whoops, this type was not found!";
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