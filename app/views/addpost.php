<?include_once 'header.php';?>

<div id="form" class="container form-add" style="">
    <?if(isset($errors)):?>
        <?foreach ($errors as $error):?>
            <div class="alert alert-danger" role="alert">
                <?=$error;?>
            </div>
        <?endforeach;?>
    <?endif;?>
    <label >Add new post</label>

    <form method="post" enctype="multipart/form-data" action="" role="form">
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input id="inp-title" name="title" class="form-control" type="text">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <textarea id="inp-desc" name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Text</label>
            <textarea id="inp-subj" name="text" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
            <label for="exampleFormControlFile1">Select Image</label>
            <input onchange="previewFile()" name="picture" id="files" type="file" preview-target-id="preview_1" accept="" class="form-control-file">
        </div>
        <span id="file-reset" class="btn btn-default">Reset file Input</span>
        <div style="margin-top:20px;">
            <input id="submit" name="submit" class="btn btn-success" onclick="send();" type="submit" value="Add post">
            <span id="preview-butt" class="btn btn-primary">Preview</span>

        </div>
        <a class="add-home" href="/">Home</a>
    </form>
</div>

<div id="preview" class="container">
    <div class="card">
        <div class="icon_wrapper"><div id="preview_1"><img id="prev-img" src="" height="200" alt="Image preview..."></div></div>
        <div class="card-body">
            <h4 id="prev-title" class="card-title">Title: </h4>
            <p id="prev-desc" class="card-text">Text:</p>
            <p id="prev-subj" class="card-text"><b>Subject: </b></p>
        </div>
    </div>
    <div style="float:right;margin-top: 14px;">
        <button id="show-form" class="btn btn-default">Back to form</button>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/js/preview.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
