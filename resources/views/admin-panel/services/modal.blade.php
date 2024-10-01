<div class="modal fade" id="createPageModal" tabindex="-1" role="dialog" aria-labelledby="createPageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPageModalLabel">Add New Page</h5>
                <button type="button" onclick="hideModal()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pageForm">
                    @csrf
                    <input type="hidden" name="page_id" value="0" id="page_id">
                    <label for="page">Page</label>
                    <input type="text" class="form-control" name="page" id="page" placeholder="About Us" required>
                    <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="hideModal()">Close</button>
                <button type="submit" id="formSubmitBtn" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
