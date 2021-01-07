<?php @include('master/header.php'); ?>
<?php
if (!isset($_GET['mid']))
    header("location:/guestbook/index.php");

$mid = $_GET['mid'];
$cn = mysqli_connect(Host, UN, PW, DBname);

$cn2 = mysqli_connect(Host, UN, PW, DBname);

$qry = mysqli_query($cn, "select to_id from messages where id=$mid");
$arr = mysqli_fetch_array($qry);
if($user_id!=$arr[0])
{
    $_SESSION["error"] = "Unauthorized action";
    header("location:inbox.php");
    die;
}


$qry = mysqli_query($cn, "call message_history('$mid')");
$qry2=mysqli_query($cn2,"select u.id,u.fullname from messages m join users u on(u.id=m.from_id) where m.id=$mid");
$arr2=mysqli_fetch_array($qry2);
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<main class="flex-shrink-0">
    <div class="container">
        <div class="py-5">
        <ul class="list-group">
                <?php
                while ($arr = mysqli_fetch_array($qry)) {
                ?>
                    <li class="list-group-item  justify-content-between align-items-center">
                        <span class="badge bg-primary" >
                            <?= $arr[6] ?>
                        </span>
                        <span style="float: right;">
                            <small class="p-2 diff"><?= $arr[4] ?></small>
                        </span><br>
                        <p style="word-wrap: break-word;"><?= $arr[1] ?></p>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <form method="post" action="process/send_proc.php">
            <div class="col-md-7 col-lg-8 ">
                <?php @include('view_error.php'); ?>
                <h4 class="mb-3">Compose message</h4>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">To:</label>
                    <input hidden name="inputTo" value="<?= $arr2[0] ?>">
                    <input hidden name="mid" value="<?= $mid ?>">
                    <input type="text" class="form-control" value="<?= $arr2[1] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" name="inputMessage" rows="3" maxlength="255"  required></textarea>
                </div>
                <div class="mb-3">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Send</button>
                </div>
            </div>
        </form>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="js/diffForHuman.js"></script>

<script>
    $(document).ready(function() {
        $('.single-select').select2();
    });
</script>

<?php @include('master/footer.php'); ?>