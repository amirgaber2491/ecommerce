<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="deleteAllModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">{{ trans('admin.ask_delete_item')  }} <span id="record_count"></span> </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.no') }}</button>
                <button type="button" id="saveDelete" class="btn btn-danger">{{ trans('admin.yes') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="preventDefaultModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-danger">
                    <h1 class="modal-title" id="exampleModalLabel">{{ trans('admin.please_check_some_records')  }}</h1>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            </div>
        </div>
    </div>
</div>
