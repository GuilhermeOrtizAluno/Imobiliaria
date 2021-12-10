<?php include('layout/header.php'); ?>

<main>
    <?= $v->section("content") ?>
    <?php include("layout/error.php"); ?>
</main>

<?php include("layout/footer.php"); ?>