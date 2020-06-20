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
        <?php echo form_open('floor_update'); ?>
        <div class="form-group col-sm-12 col-xs-12">
            <label>Entry Floor Name : </label>
            <input type="hidden" name="id" value="<?php echo $selectOneRow->id; ?>" >
            <input type="text" name="floor_name" class="form-control" value="<?php echo $selectOneRow->floor_name?>" >
            <button style="margin:0px; padding:7px" type="submit" class="btn btn-success"> Submit</button>
        </div>
        <?php echo form_close() ?>
    </div>

</div>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">