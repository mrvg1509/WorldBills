<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>World Bills</title>
<link rel="icon" href="images/fac2.ico">
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container">
  <h2 class="title">
    <h2>World Bills</h2>
    <?php include('menu.php');?>
    <table id="data-table" class="table table-condensed table-striped">
      <thead>
        <tr>
          <th width="7%">Fac. No.</th>
          <th width="15%">Fecha Creación</th>
          <th width="35%">Cliente</th>
          <th width="15%">Total</th>
          <th width="3%"></th>
          <th width="3%"></th>
          <th width="3%"></th>
        </tr>
      </thead>


      <?php		

$invoiceList = $invoice->getInvoiceList();
foreach($invoiceList as $invoiceDetails){
    $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
    echo '
      <tr>
        <td>'.$invoiceDetails["order_id"].'</td>
        <td>'.$invoiceDate.'</td>
        <td>'.$invoiceDetails["order_receiver_name"].'</td>
        <td>'.$invoiceDetails["order_total_after_tax"].'</td>
     
      
        <td><a href="#" id="'.$invoiceDetails["order_id"].'" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
      </tr>
    ';
}       
?>
    </table>
</div>

<li class="sidebar-dropdown">

  <a href="cerrar.php">
    <span><img src="images/salir.png"></span>
  </a>
</li>
Regresar Al Login
<?php include('footer.php');?>