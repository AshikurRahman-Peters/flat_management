<div class="content">
    <div class="row">
        <div class="col-md-6">
            <?php echo validation_errors(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo form_open('userUpdate'); ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="user_name" class="form-control" value="<?= $selectonerow->user_name; ?>">
                <input type="hidden" name="id" class="form-control" value="<?= $selectonerow->id; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $selectonerow->email; ?>">
                <input type="hidden" name="id" class="form-control" value="<?= $selectonerow->id; ?>">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" name="password" class="form-control">
                <input type="hidden" name="id" class="form-control" value="<?= $selectonerow->id; ?>">
            </div>
            <input type="submit" name="submit" value="Update" class="btn btn-primary">
            <?php echo form_close() ?>
        </div>
    </div>


    <div class="row ">
        <div class="col-md-10">
            <br>
            <table class="table table-strupted">
                <thead>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>

                    <?php if ($alluser) {
                        $j = 1;
                        foreach ($alluser as $value) {
                    ?>
                            <tr>
                                <td><?php echo $j++;
                                    ?></td>
                                <td><?php echo  $value->user_name;
                                    ?></td>
                                <td><?php echo  $value->email;
                                    ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url() . 'userEdit/' . $value->id;
                                                ?>" class="btn btn-info">Edit</a>
                                    <a href="<?php echo base_url() . 'userDelete/' . $value->id;
                                                ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this category')">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <tr>
                            <td colspan='3' class="text-center">No Recoud found</td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .btn{
    border-width: 2px;
    font-weight: 600;
    font-size: 11px;
    line-height: 1.35em;
    text-transform: uppercase;
    border: none;
    margin: 10px 1px;
    border-radius: 3px;
    padding: 7px 4px;
    }
</style>