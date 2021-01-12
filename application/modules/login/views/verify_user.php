<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify User</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container border p-4 bg-white" style="margin-top:100px;">
        <!-- Main Section -->

        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <h3>กรุณายืนยันตัวตนเพื่อเข้าใช้งานโปรแกรม</h3><br>
                <button class="btn btn-primary btn-lg" style="font-size:25px;" data-toggle="modal" data-target="#verify_user_modal">
                    Verify User
                </button>
                <br><br>
                <a href="<?= base_url('login/logout') ?>"><button class="btn btn-danger btn-lg">ยกเลิก</button></a>

            </div>
        </div>
    </div>




    <!-- Verify user -->
    <div class="modal fade" id="verify_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันข้อมูลผู้ใช้โปรแกรม Sales Opportunity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Header -->

                <!-- Body -->
                <form action="<?= base_url('login/save_verify_user/') ?>" name="" id="" method="post">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <img src="<?= linkImg(getUser()->file_img) ?>" alt="..." class="img-thumbnail">
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6 form-group">
                                <label for="">Username</label>
                                <input readonly type="text" name="username" id="username" class="form-control" value="<?= getUser()->username ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Employee code</label>
                                <input readonly type="text" name="ecode" id="ecode" class="form-control" value="<?= getUser()->ecode ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Fristname</label>
                                <input readonly type="text" name="Fname" id="Fname" class="form-control" value="<?= getUser()->Fname ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Lastname</label>
                                <input readonly type="text" name="Lname" id="Lname" class="form-control" value="<?= getUser()->Lname ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Deptname</label>
                                <select name="Dept" id="Dept" class="form-control">
                                    <option value="<?= getUser()->DeptCode ?>"><?= getUser()->Dept ?></option>
                                    <?= getDeptname() ?>
                                </select>
                                <input hidden type="text" name="Deptname" id="Deptname" class="form-control" value="<?= getUser()->Dept ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Position</label>
                                <select name="posi" id="posi" class="form-control">
                                    <option value="<?= getUser()->posi ?>"><?= convertPosi(getUser()->posi) ?></option>
                                    <?=getPosi()?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">E-mail</label>
                                <input readonly type="text" name="memberemail" id="memberemail" class="form-control" value="<?=getUser()->memberemail?>">
                            </div>
                        </div>












                    </div>
                    <!-- Body -->

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="ยืนยัน" name="btnSaveVerify" class="btn btn-primary">
                    </div>
                    <!-- Footer -->
                </form>



            </div>
        </div>
    </div>
    <!-- Verify user -->

    <script>
        $(document).ready(function() {
            $('#Dept').change(function(){
                console.log($('#Dept option:selected').val());
                let deptcode = $('#Dept option:selected').text();

                $('#Deptname').val(deptcode);
            });
        });
    </script>