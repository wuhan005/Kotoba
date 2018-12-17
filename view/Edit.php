<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <div class="row">
        <h4 class="mt-4">Edit Kotoba</h4>

        <br/>
        <!-- kotoba table -->
        <table class="table table-hover table-sm">
            <thead>
            <tr>
                <th scope="col" width="80%">Content</th>
                <th scope="col" width="10%">Publish Date</th>
                <th scope="col" width="5%">Operate</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($kotobaData as $key => $value){?>
            <tr>
                <td><?php echo($value['Content']);?></td>
                <td><?php echo($value['PublishDate']);?></td>
                <td><button href="/Manage/Delete?ID=<?php echo($value[0]);?>" type="button" class="btn btn-danger btn-sm">Delete</button></td>
            </tr>

            <?php }?>

            </tbody>
        </table>

    </div>
</div>