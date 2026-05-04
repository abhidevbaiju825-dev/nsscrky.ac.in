<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- This page is now handled by aqar.php which renders dynamically from the database -->
<script>window.location.href = '<?= base_url("Home/aqar") ?>';</script>
<?= $this->endSection() ?>
