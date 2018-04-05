<?include_once 'header.php';?>
<div class="container marketing admin-block">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <? foreach($posts as $post):?>
            <tr>
                <td><?=$post->id;?></td>
                <td><?=$post->title;?></td>
                <td><a href="/admin/deletepost/<? echo $post->id?>">delete</a>/
                    <a href="/admin/updatepost/<? echo $post->id?>">update</a></td>
            </tr>
        <?endforeach;?>
        </tbody>
    </table>
    <a href="/admin/addpost">Add new post</a>
</div>
