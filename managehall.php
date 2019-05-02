<?php
    include_once "scripts/checklogin.php";
    include_once "include/header.php";
    include_once "scripts/DB.php";

    if (!check("admin")) {
        header('Location: logout.php');
        exit();
    }

    $stmt = DB::query("SELECT * FROM halls");

    $halls = $stmt->fetchAll(PDO::FETCH_OBJ);

    include_once "msg/managehall.php";
?>
<div class="container" style="margin-top: 30px; margin-bottom: 60px;">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Price for Day(Est.)</th>
                <th>Size(in Sq.Ft.)</th>
                <th>Action</th>
            </tr>
            <?php foreach ($halls as $hall): ?>
            <tr>
                <td>
                    <img style="height: 150px" src="storage/<?= $hall->photo1; ?>"
                        alt="photo">
                </td>
                <td><?= $hall->name; ?>
                </td>
                <td><?= $hall->contact; ?>
                </td>
                <td>
                    <?= $hall->adder1; ?>,<br>
                    <?= $hall->adder2 ?>,<br>
                    <?= $hall->city; ?>
                </td>
                <td><?= $hall->price; ?>
                </td>
                <td><?= $hall->size; ?>
                </td>
                <td>
                    <form action="deletehall.php" method="post">
                        <input type="hidden" name="id" value="<?= $hall->id ;?>">
                        <button type="submit" name="remove" class="btn btn-danger btn-block">Remove</a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include_once "include/footer.php";
