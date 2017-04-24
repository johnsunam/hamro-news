<div class="col-md-12" style="padding: 0px;">
    <?php
    foreach ($childs as $child) {
        echo $this->render($child->div, [
            'childs' => \common\models\UiTable::find()->where(['parent' => $child->id])->orderBy('position')->all()
        ]);
    }
    ?>
</div>