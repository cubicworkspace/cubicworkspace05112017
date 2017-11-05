
@if (Session::has('success'))
	<div id="confirmationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Confirmation</b></h4>
            </div>
            <div class="modal-body">
                <p>{!! session('success') !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
	    </div>
	</div>
@elseif (Session::has('warning'))
	<div id="confirmationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Confirmation</b></h4>
            </div>
            <div class="modal-body">
                <p>{!! session('warning') !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
	    </div>
	</div>
@elseif (Session::has('error'))
	<div id="confirmationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Confirmation</b></h4>
            </div>
            <div class="modal-body">
                <p>{!! session('error') !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
	    </div>
	</div>
@endif
