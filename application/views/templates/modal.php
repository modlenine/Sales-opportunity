<div id="addComment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveComment">
                <div class="modal-body">
                    <input hidden type="text" name="trn_msid" id="trn_msid">
                    <input hidden type="text" name="trn_procode" id="trn_procode">
                    <textarea name="trn_followdetail" id="trn_followdetail" class="form-control" col="100" rows="5"></textarea>
                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" name="btnSaveComment" id="btnSaveComment" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
            </form>
        </div>
    </div>
</div>