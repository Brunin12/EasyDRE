<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/site/apple-touch-icon.png') ?>">
  <link rel="icon" type="image/ico" href="<?= base_url('assets/site/favicon.ico') ?>">
  <?php if (isset($page['titulo'])): ?>
    <title>
      Easy DRE | <?= $page['titulo'] ?>
    </title>
  <?php else: ?>
    <title>Easy DRE | Gerenciamento</title>
  <?php endif; ?>
  <?= isset($page['css']) ? $page['css'] : '' ?>
  
  <!-- Bootstrap Icons CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/admin/css/soft-ui-dashboard.css?v=1.0.7'); ?>" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <!-- <script defer data-site="<?= base_url(); ?>" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <style>
    body,
    input,
    button,
    textarea {
      font-family: 'Open Sans', sans-serif !important;
    }

    #sidenav-main {
    position: fixed;       /* já tá */
    top: 0;
    left: 0;
    height: 100vh;         /* altura total da tela */
    overflow-y: auto;      /* permite scroll se o conteúdo passar */
    overflow-x: hidden;    /* previne scroll horizontal */
    padding-bottom: 1rem;  /* espaço para o footer */
    }

    .sidenav-footer {
    position: sticky;
    bottom: 0;
}


  </style>
</head>