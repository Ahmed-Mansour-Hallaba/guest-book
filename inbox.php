<?php @include('master/header.php'); ?>
<?php
$cn = mysqli_connect(Host, UN, PW, DBname);
$qry = mysqli_query($cn, "select m.id,content,fullname,created_at from messages m join users u on (m.from_id=u.id) where to_id=$user_id");
?>
<main class="flex-shrink-0">

    <div class="container">
        <div class="py-5">
            <ul class="list-group">
                <?php
                while ($arr = mysqli_fetch_array($qry)) {
                ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        From:<?= $arr[2] ?> <?= $arr[1] ?>
                        <span> <a style="float: right;" class="btn btn-primary btn-small" href="reply.php?mid=<?=$arr[0]?>">Reply</a><small class="p-2"><?= $arr[3] ?></small></span></li>
                <?php } ?>
            </ul>
        </div>
    </div>

</main>

<?php @include('master/footer.php'); ?>