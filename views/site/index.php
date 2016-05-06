<?php

/* @var $this yii\web\View */

$this->title = 'Каталог';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php foreach ($catalog as $item) {?>
                <div class="col-lg-4">
                    <h2><?=$item->name ?></h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-default" href="/catalog/<?=$item->id?>">Подробнее</a></p>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
