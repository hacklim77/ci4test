<?= $this->extend('admin/admin_layout/page') ?>
<?= $this->section('content') ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halo, <?= session()->get('username') ?>!</li>
                <li class="breadcrumb-item active"><?= session()->get('email') ?>!</li>
                <li class="breadcrumb-item active"><?= userLogin()->username ?>!</li>
            </ol>
    </div>
<?= $this->endSection() ?>