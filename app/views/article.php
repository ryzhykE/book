<?include_once 'header.php';?>
    <div class="container">
        <div class="row">
            <section class="section">
                <div class="row">
                    <h3><a href="/">Main page</a></h3>
                    <div class="intro-container">
                        <a href="#" class="image"><img src="/img/<?= $article->img;?>" width="300" height="300"></a>
                        <div class="introTxt">
                            <h1><?echo $article->title;?></h1>
                            <p class="lead"><?echo $article->text; ?></p>
                        </div>
                    </div>
                </div>
                <? if(!empty($article->author)): ?>
                    <p> Автор : <? echo $article->author->login;?> </p>
                <? endif; ?>
            </section>

    </div>
    </div>
</body>
</html>
