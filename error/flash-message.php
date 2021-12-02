
<?php if (isset($_SESSION['brand_error'])): ?>
    <div class='alert alert-danger'>

        <?php
        echo $_SESSION['brand_error'];
        unset($_SESSION['brand_error']);
        ?>

    </div>
<?php endif ?>


<?php if (isset($_SESSION['brand_success'])): ?>

    <div class="alert alert-success">
        <?php
        echo $_SESSION['brand_success'];
        unset($_SESSION['brand_success']);
        ?>

    </div>

<?php endif ?>



<?php if (isset($_SESSION['cat_error'])): ?>
    <div class='alert alert-danger'>

        <?php
        echo $_SESSION['cat_error'];
        unset($_SESSION['cat_error']);
        ?>

    </div>
<?php endif ?>


<?php if (isset($_SESSION['cat_success'])): ?>

    <div class="alert alert-success">
        <?php
        echo $_SESSION['cat_success'];
        unset($_SESSION['cat_success']);
        ?>

    </div>

<?php endif ?>








<?php if (isset($_SESSION['upload_error'])): ?>
    <div class='alert alert-danger'>

        <?php
        echo $_SESSION['upload_error'];
        unset($_SESSION['upload_error']);
        ?>

    </div>
<?php endif ?>


<?php if (isset($_SESSION['upload_success'])): ?>

    <div class="alert alert-success">
        <?php
        echo $_SESSION['upload_success'];
        unset($_SESSION['upload_success']);
        ?>

    </div>

<?php endif ?>




<?php if (isset($_SESSION['del-prod-error'])): ?>
    <div class='alert alert-danger'>

        <?php
        echo $_SESSION['del-prod-error'];
        unset($_SESSION['del-prod-error']);
        ?>

    </div>
<?php endif ?>


<?php if (isset($_SESSION['del-prod-success'])): ?>

    <div class="alert alert-success">
        <?php
        echo $_SESSION['del-prod-success'];
        unset($_SESSION['del-prod-success']);
        ?>

    </div>

<?php endif ?>


