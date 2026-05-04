<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>
<!-- Redirect to nirf1 which has the actual content -->
<script>window.location.href = '<?= base_url("Home/nirf1") ?>';</script>
<?= $this->endSection() ?>
