<?php 

$pokemon = $viewVars['pokemon']; 
$types = $viewVars['types'];

if(!$pokemon) :
    echo "Whoops, pokemon not found!";
else: ?>
    <div class="main_pokemon">
        <h1>Détails de <?php echo $pokemon->getName() ?></h1>
        <div class="wrapper">
            <div class="left_side">
                <img class="illustration" src="<?= $_SERVER['BASE_URI'] . '/img/' . $pokemon->getNumber() . '.png' ?>" alt="<?= $pokemon->getName() ?>">
            </div>
            <div class="right_side">
                <h2 class="title"><span>#<?= $pokemon->getNumber(); ?></span> <?= $pokemon->getName() ?></h2>
                <div class="types">
                    <ul>
                        <?php 
                        foreach($types as $type):
                            echo "<li class='type' style='background:#".$type->getColor()."'>" . $type->getName() . "</li>";              
                        endforeach; 
                        ?>
                    </ul>
                </div>
                <div class="stats">
                    <h3>Statistiques</h3>
                    <div class="stat">
                        <div class="label">PV</div>
                        <div class="value"><?php echo $pokemon->getHp() ?></div>
                        <div class="stat_container">
                            <?php // Width calculation: (stat value * 100) / maximum value (255) ?>
                            <div class="bar_value" style="width:<?php echo ($pokemon->getHp() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Attaque</div>
                        <div class="value"><?php echo $pokemon->getAttack() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getAttack() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Défense</div>
                        <div class="value"><?php echo $pokemon->getDefense() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getDefense() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Attaque spé.</div>
                        <div class="value"><?php echo $pokemon->getSpeAttack() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getSpeAttack() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Défense spé.</div>
                        <div class="value"><?php echo $pokemon->getSpeDefense() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getSpeDefense() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Vitesse</div>
                        <div class="value"><?php echo $pokemon->getSpeed() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getSpeed() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back" href="<?= $_SERVER['BASE_URI'] ?>">Revenir à la liste</a>
    </div>
<?php endif;

