<style>
    .btn.btn-icon.btn-sm .fa {
        font-size: 20px;
    }
</style>
<div class="content">
    <div class="row" id="filter">
        <?php echo validation_errors(); ?>
        <div class="form-group col-sm-12 col-xs-12">
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
        <?php echo form_open('floor_insert'); ?>
        <div class="form-group col-sm-12 col-xs-12">
            <label>Entry Floor Name : </label>
            <input type="input" name="floor_name" required></input>
            <button style="margin:0px; padding:7px" type="submit" class="btn btn-success"> Submit</button>
        </div>
        <?php echo form_close() ?>
    </div>
    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <label>All Floor Name  </label>
            <?php foreach ($allFloor as $value) { ?>
                <tr>
                    <th>
                        <?php echo $value->floor_name; ?>
                    </th>
                    <td class="text-right">

                        <a href="<?php echo base_url().'floor_edit/'.$value->id; ?>" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url().'floor_delete/'.$value->id; ?>" class="btn btn-danger btn-link btn-icon btn-sm remove"><i class="fa fa-times"></i></a>

                    </td>
                </tr>
            <?php } ?>

        </thead>
    </table>
</div>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">