<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Update Record</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script_image.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <style type="text/css">
.wrapper{
  width: 500px;
  margin: 0 auto;
  margin-top: 20px;
}
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h2>Update Record</h2>
            </div>
            <p>Please edit the input values and submit to update the record.</p>
            <form action="update_page_logic.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                <span class="help-block"><?php echo $title_err;?></span>
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                <span class="help-block"><?php echo $price_err;?></span>
              </div>
              <div class="form-group">
                <label>Count</label>
                <input type="text" name="count" class="form-control" value="<?php echo $count; ?>">
                <span class="help-block"><?php echo $count_err;?></span>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="description" class="form-control" value="<?php echo $description;?>"></textarea>
                <span class="help-block"><?php echo $description_err;?></span>
              </div>
              <div class="form-group">
                <div class="custom-file" id="customFile" lang="es">
                  <input type="file" class="custom-file-input"  name="input_file[]" id="input-file" aria-describedby="fileHelp" multiple>
                  <label class="custom-file-label" for="input-file">
                    Select file...
                  </label>
                  <?php if (!empty($file_size_err)):?><span class="help-block"></span><?php endif;?>
                </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              <input type="submit" class="btn btn-success" value="Save">
              <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
