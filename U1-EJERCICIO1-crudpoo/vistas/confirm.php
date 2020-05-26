<!--view de la confirmacion de eliminar, uso de un labael para la leyenda de eliminacion con un boton para la confirmacion-->

<?php if(isset($_GET['id'])){?>
	<section class="container">
	    <div class="row">
		    <form method="post" action="index.php?m=confirmarDelete&id=<?php echo "0";?>">
		    	 <!--estudiantes-->
		        <div class="col-md-6 col-md-offset-3">
		            <label>¿Deseas eliminar este registro?</label>
		            <input type="hidden" name="txt_id" value="<?php echo $data['id']; ?>">
		            <input type="submit" name="" value="eliminar" class="form-control btn btn-danger">
		        </div>
		    </form>
	    </div>
	</section>
<?php } ?>

<!--confirmar eliminar carrera-->
<?php if(isset($_GET['id_carrera'])){?>
	<section class="container">
	    <div class="row">
	    	 <form method="post" action="index.php?m=confirmarDeleteCarrera&id_carrera=<?php echo "0";?>">
		        <!--carrera-->
		        <div class="col-md-6 col-md-offset-3">
		            <label>¿Deseas eliminar este registro?</label>
		            <input type="hidden" name="txt_idCarrera" value="<?php echo $data['id_carrera']; ?>">
		            <input type="submit" name="" value="eliminar" class="form-control btn btn-danger">
		        </div>
		    </form>
	    </div>
	</section>
<?php } ?>


<?php if(isset($_GET['id_uni'])){?>
<!--confirmar eliminar universidad-->
	<section class="container">
	    <div class="row">
	    	<form method="post" action="index.php?m=confirmarDeleteUniversidad&id_uni=<?php echo "0";?>">
		         <!--universidad-->
		        <div class="col-md-6 col-md-offset-3">
		            <label>¿Deseas eliminar este registro?</label>
		            <input type="hidden" name="txt_idUniversidad" value="<?php echo $data['id_uni']; ?>">
		            <input type="submit" name="" value="eliminar" class="form-control btn btn-danger">
		        </div>
		    </form>
	    </div>
	</section>
<?php } ?>
