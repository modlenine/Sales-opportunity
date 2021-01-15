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






<!-- Modal เพิ่มรายการ -->
<div id="addCusProUse" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูล สินค้าที่ลูกค้าใช้อยู่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="">Type</label>
                        <input type="text" name="csv_type" id="csv_type" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Salee Product</label>
                        <input type="text" name="csv_saleeproduct" id="csv_saleeproduct" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Q'ty (mt/year)</label>
                        <input type="text" name="csv_qty1" id="csv_qty1" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Competition Products</label>
                        <input type="text" name="csv_competition" id="csv_competition" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Q'ty (mt/year)</label>
                        <input type="text" name="csv_qty2" id="csv_qty2" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Remark</label>
                        <input type="text" name="csv_remark" id="csv_remark" class="form-control">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" name="btnAddCusUse" id="btnAddCusUse" class="btn btn-primary">เพิ่มข้อมูล</button>
            </div>

        </div>
    </div>
</div>