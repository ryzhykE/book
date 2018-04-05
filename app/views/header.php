<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
    <title><?php echo $title;?></title>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div id="navbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['loget_user'])):?>
                    <li><a href="#"><p>Hello <?=$_SESSION['loget_user']->login;?></p></a></li>
                    <li> <a href="/login/logout">Logout</a></li>
                    <li> <a href="/admin/">Admin</a></li>
                <?php else:?>
                    <li><a href="/login/">Login</a></li>
                    <li> <a href="/register/">Register</a></li>
                <?endif;?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>