<?include_once 'header.php';?>

<div class="container marketing post-block">
    <? if(!empty($post)):?>
        <? foreach($post as $item):?>
            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading"><?=$item->title;?></h2>
                    <p class="lead"><?=$item->description;?></p>
                    <p><a href="/main/article/<? echo $item->id?>"" class="pull-right">Reaad more...</a></p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block img-size" src="img/<?=$item->img;?>" alt="Generic placeholder image">
                </div>
            </div>
         <? endforeach;?>
    <? else :?>
        <p>No post</p>
    <? endif; ?>


<hr class="featurette-divider">
    <footer>
        <div class="col-sm-9 padding-right">
            <?php echo $pagination->get(); ?>
        </div>
    </footer>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
