<?php

/** @var yii\web\View $this */

/** @var \yii\data\ActiveDataProvider $provider */

use yii\widgets\ListView;

$this->title = 'Novator';
?>
<div class="site-index">
        <?php
        echo ListView::widget([
            'dataProvider' => $provider,
            'itemView' => '_book',
            'options' => [
                    'class' => 'list-view'
            ],
            'layout' => "{summary}\n<div class=\"row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 py-3\">{items}</div>\n{pager}",
            'pager' => [
                    'class' => 'yii\bootstrap5\LinkPager',
            ]
        ]);
        ?>

</div>
