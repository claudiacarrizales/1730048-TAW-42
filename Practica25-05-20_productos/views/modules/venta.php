<?php
if (!isset($_SESSION['validar']))
{
  header("location: index.php?action=ingresar");
  exit();
}

$users = new MvcController;
$users->update_products();

?>


<div class="container-fluid">
    <!-- Main content -->
    <section class="content">

      <div class="container-fluid" id="imprimir">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-success">
              <div class="card-header row">
                  <h3 class="text-light "><strong> PUNTO DE VENTA</strong></h3>
              </div>
                
              <div class="card-body">
                

                  Cliente: <b>Cliente en general</b>

                <table  class="table table-bordered table-hover mt-3" style="text-align: center;">
                  <thead>
                  <tr >
                    <th>nombre</th>
                    <th>cantidad</th>
                    <th>precio</th>
                    <th >Categoria</th>
                    <th>total</th>
                  </tr>
                  </thead>
                </table>


                <table id="productos" class="table table-bordered table-hover mt-3" style="text-align: center;">
                  <thead>

                  </thead>
                  <tbody>

                  </tbody>
                </table>
                <table id="productos" class="table table-bordered table-hover mt-3" style="text-align: center;">
                  
                  <tbody>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="row">
                   <div class="col-8">
                       <label for="">cantidad de productos: </label> <span id="span_totalproductos"> </span> 
                   </div> 
                  <div class="col-4">
                        <label for="">Subtotal:</label> $ <span id="span_subtotal"> </span> <br>
                        <label for="">IVA (18%):</label> $ <span id="span_iva"> </span>  <br>

                        <label for="">Descuento :</label> - $ <span id="span_descuento"> - </span>  <br>
                        <label for="">Total</label> $ <span id="span_total"> </span> <br>

                        
                  </div>  
                </div>  
                <div class="row">
                      <div class="btn-group col-12">
                        
                        <form method ="post" action="" onsubmit='return realizar_pago()'>

                        <input id="datos_ocultos" name="datos_ocultos" type="hidden" value="">

                        

                        <button   type="submit" class="btn btn-default"> <i class="fa fa-credit-card" aria-hidden="true"></i> Pagar</button>

                        </form>

                        <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-default" class="btn btn-default"> <i class="fa fa-gift" aria-hidden="true"></i> Descuento </button>

                        <button type="button" onclick="cancelarCompra()" class="btn btn-default"> <i class="fa fa-retweet" aria-hidden="true"></i> Cancelar</button>
                      </div>
                </div> 
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div>




      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title"><strong>PRODUCTOS</strong></h3>
          </div>
          <div class="card-body">
            <div id="example2-wrapper" class="dataTables_wrapper dt-botstrap4">
              <div class="row">
                <div class="col-sm-12">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead class="">
                      <tr>
                       
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Agregar a la venta</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                      $respuesta = $users->vistaProductsController_ventas();
                      foreach ($respuesta as $row => $item) { 
                        echo '<tr>
                            
                            <td>'.$item["producto"].'</td>
                            <td>'.$item["precio"].'</td>
                            <td>'.$item["stock"].'</td>
                            <td>'.$item["categoria"].'</td>
                            <td>


                              <button onclick="agregar_prodcuto(\' '. $item["id"] .'\',\' '. $item["producto"]. '\',\' '. $item["stock"].'\',\''. $item["precio"]. '\',\' '. $item["categoria"].'\' )" class="btn btn-success btn-sn btn-icon" >COMPRAR <i class="fas fa-shopping-basket"></i> </button>

                            </td> </tr>' ;
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title"><strong>VENTAS REALIZADAS</strong></h3>
          </div>
          <div class="card-body">
            <div id="example2-wrapper" class="dataTables_wrapper dt-botstrap4">
              <div class="row">
                <div class="col-sm-12">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead class="">
                      <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unidad</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $users->vistaVentasController();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        
        <div class="col-md-12 text-center">
          <ul class="pagination pagination-sm pager" id="historial_page"></ul>
        </div>
      </div>

    </section>

    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar descuento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        Digite la cantidad:
        <input  id="in_descuento" type='number' min='1'>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="agregar_descuento()" class="btn btn-primary">Agregar descuento</button>
        </div>
      </div>
    </div>
  </div>

    <script>
        var productos_a_vender = [];
        var table = document.getElementById("productos");
        var descuento = 0;

        function agregar_prodcuto(id, nombre_producto, stock, precio, categoria ) 
        {

          var posicion = -1;

          for(var i=0; i < productos_a_vender.length; i++)
          {
            if(id == productos_a_vender[i][0]){
              posicion = i;
              break;
            }
          }

          if(posicion == -1){
            var nuevo_producto =  [];
            nuevo_producto[0] = Number(id);
            nuevo_producto[1] = nombre_producto;
            nuevo_producto[2] = 1;
            nuevo_producto[3] = Number(stock);
            nuevo_producto[4] = Number(precio);
            nuevo_producto[5] = categoria;

            productos_a_vender.push(nuevo_producto);
            
            actualizar_tabla();
          }else{
            alert("Ya esta agregado el producto");
          }
          
        
        }


        function actualizar_tabla(){
          
          var row   = table.insertRow(-1);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          
          for(var i=0; i < productos_a_vender.length; i++)
          {

            cell1.innerHTML = productos_a_vender[i][1];
            cell2.innerHTML = "<input onkeydown='return false' onchange='cambiar_cantidad( "+ productos_a_vender[i][0] +", this.value)' style='width:50px;text-align: center;' type='number' min='1' max='"+ Number(productos_a_vender[i][3]) +"' value='"+ productos_a_vender[i][2] +"'>";
            cell3.innerHTML = "$"+ productos_a_vender[i][4];
            cell4.innerHTML = "" + productos_a_vender[i][5];
            cell5.innerHTML = "<span id='total_"+Number(productos_a_vender[i][0])+"'> $" + (productos_a_vender[i][2] * productos_a_vender[i][4]) + " </span>";
          }

          
          var total_productos = 0;
          var total_precio = 0;

          for(var i=0; i < productos_a_vender.length; i++)
          {
             total_productos = total_productos + productos_a_vender[i][2];
             total_precio = total_precio +  (productos_a_vender[i][2] * productos_a_vender[i][4] );
          }

          document.getElementById("span_totalproductos").innerHTML = (total_productos).toFixed(2); 
          document.getElementById("span_subtotal").innerHTML = (total_precio - (total_precio * 0.18)).toFixed(2);
          document.getElementById("span_iva").innerHTML =  (total_precio * 0.18).toFixed(2);
          document.getElementById("span_total").innerHTML = (total_precio - descuento ).toFixed(2);
          

        }


        function cambiar_cantidad(id, nueva_cantidad){

          var total = document.getElementById("total_"+id);

          console.log("id " + id + " nva_cantidad " + nueva_cantidad);

          for(var i=0; i < productos_a_vender.length; i++)
          {
            if(id == productos_a_vender[i][0]){
              
              productos_a_vender[i][2] = Number(nueva_cantidad);
              total.innerHTML = "$ " + (Number(nueva_cantidad*productos_a_vender[i][4] ) );
              break;
            }
          }

          

          var total_productos = 0;
          var total_precio = 0;

          for(var i=0; i < productos_a_vender.length; i++)
          {
             total_productos = total_productos + productos_a_vender[i][2];
             total_precio = total_precio +  (productos_a_vender[i][2] * productos_a_vender[i][4] );
          }

          document.getElementById("span_totalproductos").innerHTML = (total_productos).toFixed(2); 
          document.getElementById("span_subtotal").innerHTML = (total_precio - (total_precio * 0.18)).toFixed(2);
          document.getElementById("span_iva").innerHTML =  (total_precio * 0.18).toFixed(2);
          document.getElementById("span_total").innerHTML = (total_precio - descuento ).toFixed(2);

          //actualizar_tabla();
          

        }

        function cancelarCompra(){


          document.getElementById("span_totalproductos").innerHTML = ""; 
          document.getElementById("span_subtotal").innerHTML = "";
          document.getElementById("span_iva").innerHTML =  "";
          document.getElementById("span_total").innerHTML = "";

          productos_a_vender = [];
          table.innerHTML = "";


        }

        function agregar_descuento(){
          var descuento_input = document.getElementById("in_descuento");

          var total_precio = 0;

          for(var i=0; i < productos_a_vender.length; i++)
          {
             total_precio = total_precio +  (productos_a_vender[i][2] * productos_a_vender[i][4] );
          }

          

          if( Number(descuento_input.value) >  total_precio ){
            alert("El descuento no puede ser mayor al total");
          }else{

            if(Number(descuento_input.value) <=  0){
              alert("El descuento no puede ser negativo o igual a cero");
            }else{
              descuento = Number(descuento_input.value);
              document.getElementById("span_descuento").innerHTML = descuento_input.value;
              document.getElementById("span_total").innerHTML = (total_precio - descuento ).toFixed(2);
              
              $('#exampleModal').modal('hide');
            }
          }
        }


        function realizar_pago(){

          var res = confirm("¿Esta seguro que seas realizar la compra?");

          if(res){
            if( productos_a_vender.length <= 0 ){
              alert("Primero agregue un producto");
              return false;
            }else{
              document.getElementById("datos_ocultos").value = JSON.stringify(productos_a_vender);
            
             return true;
            }
          }else{
            return false;
          } 

        }

        
        function PrintElem(elem){
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write('<html><head><title>' + document.title  + '</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write('<h1>' + document.title  + '</h1>');
            mywindow.document.write(document.getElementById(elem).innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();

            return true;
        }
    </script>                
</div>























































































