<div class="modal show" tabindex="-1" role="dialog">
<div class="modal-backdrop-cervezeria">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title">
Cervezeria la Preferida
 <i class='glyphicon glyphicon-glass'></i>

</h4>
</div>
<div class="modal-body">

 <img src="images/negocio.jpeg" class="img-responsive img-thumbnail" >
</div>
<div class="modal-footer">
  
        
            <div>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#historia" aria-controls="historia" role="tab" data-toggle="tab">Historia </a>
                </li>

                <li role="presentation"><a href="#vision" aria-controls="mision" role="tab" data-toggle="tab">Vision </a></li>
                <li role="presentation"><a href="#mision" aria-controls="vision" role="tab" data-toggle="tab">Mision</a></li>
               
              </ul>
             
<!--  LLama con ajax a la historia, vision y mison... el cual se encuentra en include -->


              <div class="tab-content">
              <div role="tabpanel" class="tab-pane active text-justify" id="historia">
                <script> $("#historia").load('ajax/historia.html'); </script>
              </div>
              <div role="tabpanel" class="tab-pane text-justify" id="mision"> 
                <script> $("#mision").load('ajax/mision.html'); </script>
              </div>


              <div role="tabpanel" class="tab-pane text-justify" id="vision">
                <script> $("#vision").load('ajax/vision.html'); </script>
              </div>

              </div>
              </div>
  
<button type="button" class="btn btn-danger cerrar" data-dismiss="modal"  >
	Cerrar

</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


