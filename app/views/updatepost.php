<?include_once 'header.php';?>

<div id="form" class="container form-add" style="">
    <?if(isset($errors)):?>
        <?foreach ($errors as $error):?>
            <div class="alert alert-danger" role="alert">
                <?=$error;?>
            </div>
        <?endforeach;?>
    <?endif;?>
    <label >Update post</label>

    <form method="post" enctype="multipart/form-data" action="" role="form">
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input id="inp-title" name="title" class="form-control" type="text" value="<?= $article->title; ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <textarea id="inp-desc" name="description" class="form-control" rows="3"><?= $article->description;?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Text</label>
            <textarea id="inp-subj" name="text" class="form-control" rows="3"><?= $article->text;?></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
            <label for="exampleFormControlFile1">Select Image</label>
            <input  name="picture" id="files" type="file" preview-target-id="preview_1" accept="" class="form-control-file">
            <a href="#" class="image"><img src="/img/<?= $article->img;?>" width="100" height="100"></a>
        </div>
        <div style="margin-top:20px;">
            <input id="submit" name="submit" class="btn btn-success" type="submit" value="Add post">
        </div>
        <a class="add-home" href="/">Home</a>
    </form>
</div>
