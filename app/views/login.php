<?include_once 'header.php';?>
<div class="container marketing admin-block">
    <?if(isset($errors)):?>
        <?foreach ($errors as $error):?>
            <div class="alert alert-danger" role="alert">
                <?=$error;?>
            </div>
        <?endforeach;?>
    <?endif;?>
    <form role="form" class="form-inline" method="POST" >
        <div class="form-group">
            <label for="name">Имя</label>
            <input name="login" type="text" class="form-control" placeholder="Login"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password"/>
        </div>
        <div class="form-group">
            <input name="submit" type="submit" class="btn btn-info" value="Войти" />
        </div>
    </form>
</div>