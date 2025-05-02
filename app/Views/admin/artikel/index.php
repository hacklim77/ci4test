<?= $this->extend('admin/admin_layout/page') ?>
<?= $this->section('content') ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Artikel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><?= $title ?></li>
                <li class="breadcrumb-item active"><?= $subtitle ?></li>
            </ol>
    </div>
<?= $this->endSection() ?>