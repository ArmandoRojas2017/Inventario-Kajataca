<div class="modal show" tabindex="-1" role="dialog">
<div class="modal-backdrop-cervezeria">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title text-center">
  <?= $_GET['titulo'] ?>
 <i class='glyphicon glyphicon-question-sign'></i>

</h4>
</div>
<div class="modal-body">


            <div>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a id=btn1 href="#historia" aria-controls="historia" role="tab" data-toggle="tab">
                    Guia de Ayuda
                  </a>
                </li>

                <li id=btn2 role="presentation"><a href="#vision" aria-controls="mision" role="tab" data-toggle="tab">
                Video de Ayuda
                </a></li>
               
               
              </ul>
                  <div class="tab-content">
                <!-- Guia de ayuda -->
              <div role="tabpanel" class="tab-pane active text-justify" id="historia">
                <script> 

                  $("#historia").load(<?= "'storage/ayuda/". $_GET['guia']."'" ?>);

                 </script>
              </div>
              <!-- fin de guia de ayuda -->


              <!-- Video de ayuda -->
               <div role="tabpanel" class="tab-pane text-justify" id="vision">

               <video controls  src=<?= "'storage/ayuda/". $_GET['video']."'"   ?> class="img-responsive"  ></video>

            
              </div>
              <!-- fin de video de ayuda -->


           

              </div>

</div>
<div class="modal-footer">
  
        
             
<!--  LLama con ajax a la historia, vision y mison... el cual se encuentra en include -->


          
            
  
<button type="button" class="btn btn-danger cerrar" data-dismiss="modal"  >
	Cerrar

</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


