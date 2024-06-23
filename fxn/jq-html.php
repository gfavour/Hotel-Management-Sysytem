<style>
#loading{ position:fixed; top:49%;left:49%; padding:5px 5px; border:#ddd solid 0px; background:none; border-radius:3px;display:none; z-index:2000;}
</style>
<div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
	<div class="modal-header"><h4 class="modal-title"><span id="modalhead">Important!</span><a class="close" data-dismiss="modal">&times;</a></h4></div>
      <!-- dialog body -->
      <div class="modal-body">
        <div id="modalcontent">...</div>
      </div>
      <!--<div class="modal-footer"></div>-->
    </div>
  </div>
</div>

<span id="loading"><img src="<?php echo '../fxn/loading.gif'; ?>" /></span>