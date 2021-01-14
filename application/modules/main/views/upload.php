<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{title}</title>
</head>

<body>

  <div class="app-main__inner">
    <!-- Subcontent section -->
    <div class="row bg-white p-3">

      <form action="<?=base_url('douploadfile.html')?>" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
          <input type="file" name="file1" id="file1" class="form-control">
        </div>
        <div class="col-md-6">
          <button class="btn btn-primary" name="upload" id="upload">Upload</button>
        </div>
      </form>

    </div>

  </div><!-- Subcontent section -->
</body>

</html>