<?php @include('master/header.php'); ?>
<?php
$cn = mysqli_connect(Host, UN, PW, DBname);
$qry = mysqli_query($cn, "select m.id,content,fullname,created_at from messages m join users u on (m.from_id=u.id) where to_id=$user_id order by id desc");
?>
<main class="flex-shrink-0">

    <div class="container">
        <div class="py-5">
        <?php include('view_error.php');?>

            <ul class="list-group">
                <?php
                while ($arr = mysqli_fetch_array($qry)) {
                ?>
                    <li class="list-group-item  justify-content-between align-items-center">
                        <span class="badge bg-primary" >
                            <?= $arr[2] ?>
                        </span>
                        <span style="float: right;">
                            <small class="p-2 diff"><?= $arr[3] ?></small>
                            <a class="btn btn-primary btn-small" href="reply.php?mid=<?= $arr[0] ?>">Reply</a>
                        </span><br>
                        <p style="word-wrap: break-word;"><?= $arr[1] ?></p>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php if ($qry->num_rows == 0) { ?>
            <div class="py-2">
                <div class="alert alert-info" role="alert">
                    No messages
                </div>
            </div>
        <?php } ?>
    </div>

</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="js/diffForHuman.js"></script>

<?php @include('master/footer.php'); ?>