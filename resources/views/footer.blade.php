<footer class="main-footer">
    <strong> &copy; Inter Giros </strong> - <?php echo date("Y-m-d");?>, Todos los Derechos Reservados.
</footer>
<style type="text/css">
 
	.numerico {
	  font-weight:bold;
	  color:#4bed15;
	  background-color: black;
	  font-family:'sans-serif', 'Helvetica','Verdana','Monaco',sans-serif;
	}
</style>


<div class="control-sidebar-bg"></div>


<!--MODAL PARA LA CONSULTA DE LA CEDULA-->
    <div class="modal fade" id="cedula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Consulta de documento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
	           <?php echo Form::open(array('action' => 'FacturaexpressController@cedula_consulta')) ?>
		            <div class="box-body text-cente col-sm-12" style="font-size: 30pt;">
			              <label for="documento">Documento del cliente:</label>
			              <input autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"  type="text" id="documento" name="documento"  class="form-contro text-center numerico col-sm-12" required="required"></input>
			              <input type="submit" class="btn btn-success col-sm-12" value="Buscar">
			              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="continuidad" value="0">
		            </div>
		        </form>
		    </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>           
    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
        })
    </script>
<!--FIN MODAL PARA LA CONSULTA DE LA CEDULA-->
