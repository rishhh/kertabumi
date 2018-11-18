<!-- Attachment Modal -->
<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-horizontal" method="POST" data-toggle="validator">
        {{ csrf_field() }} {{ method_field('POST') }}
        <div class="card text-white bg-dark mb-0">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"> &times; </span>
            </button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body">
            <!-- id -->
            <input type="hidden" name="id" id="id" required>
            <!-- /id -->
            <!-- description -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="=nama_kain">Nama Kain</label>
              <div class="col-md-6">
                <input type="text" name="nama_kain" class="form-control" autofocus required>
                <span class="help-block with-errors"></span>
              </div>
            </div>
            <!-- /description -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> 
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Attachment Modal -->
