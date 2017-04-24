<div class="col-md-4">
    <?php
    foreach ($childs as $child) {
        echo $this->render($child->div, [
            'childs' => \common\models\UiTable::find()->where(['parent' => $child->id,'visibility'=>'true'])->orderBy('position')->all()
        ]);
    }
    ?>
</div>