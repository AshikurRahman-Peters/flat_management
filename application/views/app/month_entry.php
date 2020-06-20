<style>
    .btn.btn-icon.btn-sm .fa {
        font-size: 20px;
    }
</style>
<div class="content">
    <?php echo validation_errors();
    ?>
    <div class="form-group col-sm-12 col-xs-12">
        <?php echo $this->session->flashdata('msg');
        ?>
    </div>
    <?php echo form_open('insert_month');
    ?>
    <label>Enter Month here</label>
    <input type="text" name="month_name" required>
    <input type="submit">
    <?php echo form_close()
    ?>
    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <th>Month Name</th>
        </thead>
        <tbody>
            <?php foreach ($get_all_month as $value) { ?>
                <tr>
                    <td>
                        <?php echo $value->month_name; ?>
                    </td>
                    <td> <a href="<?php echo base_url().'delete_month/'.$value->id; ?>"  class="btn btn-danger btn-link btn-icon btn-sm"><i class="fa fa-times"></i></a></td>
                </tr>
                
            <?php } ?>
        </tbody>
    </table>
</div>