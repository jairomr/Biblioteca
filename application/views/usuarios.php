<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{titulo}<?php if(isset($titulo_base)){echo " | ".$titulo_base;}?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {css}
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
{mainHeader}
{mainSidebar}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {titulo}
        <?php if(isset($subtitulo)){echo "<small>$subtitulo</small>";}?>
      </h1>
      <?php echo breadcrumb();?>
    </section>
   {conteudo}
  </div>
  <!-- /.content-wrapper -->

  {footer}
  {controlSidebar}
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
{js}
</body>
</html>
