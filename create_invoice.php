<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName']) {	
	$invoice->saveInvoice($_POST);
	header("Location:invoice_list.php");	
}
?>
<title>World Bills</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="images/fac2.ico">
<?php include('container.php');?>
<div class="container content-invoice">
    <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate>
        <div class="load-animate animated fadeInUp">
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <h2 class="title">World Bills</h2>
                    <?php include('menu.php');?>
                </div>
            </div>
            <input id="currency" type="hidden" value="$">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <h3>Datos De la Cuenta</h3>
                    <?php echo $_SESSION['user']; ?><br>
                    <?php echo $_SESSION['address']; ?><br>
                    <?php echo $_SESSION['mobile']; ?><br>
                    <?php echo $_SESSION['email']; ?><br>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                    <h3>Empresa de Compra</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" name="companyName" id="companyName"
                            placeholder="Nombre de Empresa" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="address" id="address"
                            placeholder="Su dirección"></textarea>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered table-hover" id="invoiceItem">
                        <tr>
                            <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                            <th width="15%">Prod. No</th>
                            <th width="38%">Nombre Producto</th>
                            <th width="15%">Cantidad</th>
                            <th width="15%">Precio</th>
                            <th width="15%">Total</th>
                        </tr>
                        <tr>
                            <td><input class="itemRow" type="checkbox"></td>
                            <td><input type="text" name="productCode[]" id="productCode_1" class="form-control"
                                    autocomplete="off"></td>
                            <td><input type="text" name="productName[]" id="productName_1" class="form-control"
                                    autocomplete="off"></td>
                            <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity"
                                    autocomplete="off"></td>
                            <td><input type="number" name="price[]" id="price_1" class="form-control price"
                                    autocomplete="off"></td>
                            <td><input type="number" name="total[]" id="total_1" class="form-control total"
                                    autocomplete="off"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">


                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">


                    <br>
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control"
                            name="userId">
                        <input data-loading-text="Guardando factura..." type="submit" name="invoice_btn"
                            value="Guardar Factura" class="btn btn-success submit_btn invoice-save-btm">
                    </div>

                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <span class="form-inline">
                        <div class="form-group">
                            <label>Subtotal: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="subTotal" id="subTotal"
                                    placeholder="Subtotal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tasa Impuesto: &nbsp;</label>
                            <div class="input-group">
                                <input value="" type="number" class="form-control" name="taxRate" id="taxRate"
                                    placeholder="Tasa de Impuestos">
                                <div class="input-group-addon">%</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Monto Inpuesto: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount"
                                    placeholder="Monto de Impuesto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="totalAftertax"
                                    id="totalAftertax" placeholder="Total">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cantidad pagada: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid"
                                    placeholder="Cantidad pagada">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cantidad debida: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="amountDue" id="amountDue"
                                    placeholder="Cantidad debida">
                            </div>
                        </div>
                    </span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
</div>
</div>
<?php include('footer.php');?>