<?include_once 'header.php';?>
    <div class="container marketing admin-block">
        <?if(isset($errors)):?>
            <?foreach ($errors as $error):?>
                <div class="alert alert-danger" role="alert">
                    <?=$error;?>
                </div>
            <?endforeach;?>
        <?endif;?>
        <form role="form" class="form-inline" method="POST" action="\register">
            <div class="form-group">
                <label for="name">Имя</label>
                <input name="login" type="text" class="form-control" placeholder="Login"/>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input name="email" type="email" class="form-control" placeholder="E-mail"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password"/>
            </div>
            <div class="form-group">
                <input name="submit" type="submit" class="btn btn-info" value="Зарегистрироваться" />
            </div>
        </form>
    </div>