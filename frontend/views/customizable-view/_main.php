<div class="row">
    <?php
    $childs = \common\models\UiTable::find()->where(['parent'=>1,'visibility'=>'true'])->orderBy('position')->all();
    foreach ($childs as $child) {
        echo $this->render($child->div, [
            'childs' => \common\models\UiTable::find()->where(['parent' => $child->id,'visibility'=>'true'])->orderBy('position')->all()
        ]);
    }
    ?>

</div>

