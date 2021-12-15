<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="wdth=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap4.6.1/css/bootstrap.css">
    <link rel="stylesheet" href="libs/bootstrap4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--BootStrap MODAL-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Alertify -->
    <script src="libs/alertifyjs/alertify.min.js"></script>
    <script src="libs/alertifyjs/settings.js?{$NO_CACHE}"></script>
    <link rel="stylesheet" href="libs/alertifyjs/css/alertify.min.css" />
    <link rel="stylesheet" href="libs/alertifyjs/css/themes/default.min.css" />
    <!-- Datepicker -->
    <link rel="stylesheet" href="libs/datepicker/jquery-ui.1.12.1.css">
    <script src="libs/datepicker/jquery-ui.1.12.1.js"></script>
    <script src="libs/datepicker/jquery-351.min.js" type="text/javascript"></script>
    <!-- JS -->
    <script type="text/javascript" src="js/funciones.js?=<?php echo date('m-d-Y h:i:s', time());?>"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css?=<?php echo date('m-d-Y h:i:s', time());?>"/>
</head>
<body id="body">
    <div id="display"></div>
    <header class="sticky-top">
        <div class="container-fluid color-canamo">
            <a href="https://api.whatsapp.com/send?phone=5492345447270" target="_blank"><i class="text-light ml-3 bi bi-whatsapp"> 2345-447270</i></a>
            <a href="https://www.instagram.com/canamo_growshop/" target="_blank"><i class="text-light ml-4 bi bi-instagram"> canamo_growshop</i></a>
            <div class="row justify-content-center rounded-lg">
                <img src="img/logo.jpg" onclick="window.open('https://www.instagram.com/canamo_growshop/', '_blank');" class="pointer" height="150px" width="350px">
                <!--<h1 class="p-5" id="textito">CAÑAMO GROW SHOP</h1>-->
            </div>
            <!--<a href="#" id="insert"> INSERTAR DATOS </a>-->
            <div class="row justify-content-center float-right px-5 mb-3">
                <form>
                    <input type="text" class="gris border p-3 rounded-lg border-dark" id="input_buscar" value="">
                    <button type="submit" id="boton_buscar" class="btn btn-secondary p-3 gris border border-dark">Buscar</button>
                    <p class="text-light px-1" id="buscando" style="display:none;">Buscando..</p>
                </form>
            </div>
        </div>
    </header>
    <div class="container-fluid text-center p-4" id="div_carrito" style="display:none;">
        <div>
            <div class="col-md-12 text-light p-2 border border-dark">CARRITO DE COMPRAS   <i class="bi bi-cart-check"></i></div>
        </div>
        <div>
            <div class="col-md-4 ajustes_titulos p-2 ocultar">Cantidad en carrito  <i class="bi bi-cart-check"></i></div>
            <div class="col-md-4 ajustes_titulos p-2 ocultar">Nombre</div>
            <div class="col-md-4 ajustes_titulos p-2 ocultar">Precio</div>
        </div>
        <div id="divCarro">
            <!-- CARRO ARMADO EN JS-->
        </div>
        <div id="divcarro2">
            <input type="hidden" id="destruir" value="">
            <div class="col-md-6 text-light p-2 gris border border-dark">Precio total de compra  <i class="bi bi-cart-check"></i></div>
            <div class="col-md-6 p-2 griss border border-dark" id="totalPrecio" ></div>
        </div>
        <div>
            <div class="btn-danger col-md-6 p-2 border border-dark" id="eliminar_carrito" role="button">Eliminar carrito   <i class="bi bi-cart-x"></i></div>
            <div class="btn-success col-md-6 p-2 border border-dark" id="hacer_compra" role="button">Hacer compra   <i class="bi bi-cart-check"></i></div>
        </div>
    </div>
    <div class="container-fluid" id="div_compra">   
        <div class="row justify-content-center">
            <div class="col-md-12 pt-4 verde">
                <div id="acaBot1" role="button" class="border text-light verde col-md-3 p-2">Accesorios</div>
                <div id="acaBot2" role="button" class="border text-light gris col-md-3 p-2">Productos</div>
                <div id="acaBot3" role="button" class="border text-light gris col-md-3 p-2">Indumentaria</div>
                <div id="acaBot4" role="button" class="border text-light gris col-md-3 p-2">Comidas</div>
            </div>
        </div>
        <div id="loader"></div>
        <div class="row justify-content-center">
            <!-- **********************       ACCESORIOS        *****************************-->
            <div class="col-md-12 verde" id="acaDiv1">

            </div>
            <!-- **********************       PRODUCTOS        *****************************-->
            <div class="col-md-12 verde" id="acaDiv2" style="display:none;">

            </div>
            <!-- **********************       INDUMENTARIA        *****************************-->
            <div class="col-md-12 verde" id="acaDiv3" style="display:none;">

            </div>
            <!-- **********************       COMIDA        *****************************-->
            <div class="col-md-12 verde" id="acaDiv4" style="display:none;">

            </div>
            <div class="col-md-12 verde" id="resultadoBusqueda">
                <!-- ACA RESULTADO DE BUSQUEDA -->
            </div>
        </div>
    </div>
    <br><br>
    <div class="container-fluid color-canamo">
        <div class="row justify-content-center rounded-lg">
            <img src="img/logo.jpg" onclick="window.open('https://www.instagram.com/canamo_growshop/', '_blank');" class="pointer" height="20%" width="20%">
        </div>
        <a href="https://www.instagram.com/canamo_growshop/" target="_blank"><i class="text-light ml-4 bi bi-instagram"> canamo_growshop</i></a>
        <a href="https://api.whatsapp.com/send?phone=5492345447270" target="_blank"><i class="text-light ml-3 bi bi-whatsapp"> 2345-447270</i></a>
    </div>
    <!-- ////////////////////// MODAL ///////////////////////////////-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body color-canamo">
                    <div id="loader2"></div>
                    <div class="container" id="modalVista">
                        <div class="row">
                            <div class="col-md-5">
                                <button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="text-center text-light" id="nombreModal"></h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div id="div_img"align="center">
                                    <img id="imgModal" class="rounded-circle mx-auto d-block pointer" height="80%" width="60%">
                                    <input class="form-check-input position-static mx-auto" type="radio"checked="checked">
                                    <input class="form-check-input position-static mx-auto" type="radio" disabled>
                                    <input class="form-check-input position-static mx-auto" type="radio" disabled>
                                </div>
                                <div id="div_img2" style="display:none;"align="center">
                                    <img id="imgModal2" class="rounded-circle mx-auto d-block pointer" height="80%" width="60%">
                                    <input class="form-check-input position-static mx-auto" type="radio" disabled>
                                    <input class="form-check-input position-static mx-auto" type="radio"checked="checked">
                                    <input class="form-check-input position-static mx-auto" type="radio" disabled>
                                </div>
                                <div id="div_img3" style="display:none;" align="center">
                                    <img id="imgModal3" class="rounded-circle mx-auto d-block pointer" height="80%" width="60%">
                                    <input class="form-check-input position-static mx-auto" type="radio" disabled>
                                    <input class="form-check-input position-static mx-auto" type="radio" disabled>
                                    <input class="form-check-input position-static mx-auto" type="radio"checked="checked">
                                </div>
                                <h4 class="text-center text-light" id="precioModal"></h4>
                            </div>
                        </div>
                        <input type="hidden" id="idCarro" value="">
                        <div class="row">
                            <div class="modal-footer col-md-5">
                                <input type="button" class="btn btn-default" id="ag_carro" data-dismiss="modal" value="Agregar al carro">
                                <input type="submit" class="btn btn-success" id="comprar_modal" data-dismiss="modal" value="Comprar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!---///////////////// FIN MODAL ///////////////////////////////////-->

</body>
</html>