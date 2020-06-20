<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<div class="content">

    <?php if (!empty($selectOneRow)) { ?>
        <?php echo validation_errors();
        ?>
        <?php echo $this->session->flashdata('msg');
        ?>

        <?php echo form_open_multipart('house_info_update');
        ?>
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="<?php echo $selectOneRow->id; ?>">
                <div class="form-group">
                    <label for="title">House Name</label>
                    <input type="text" name="house_name" class="form-control" value="<?php echo $selectOneRow->house_name; ?>">
                </div>
                <div class="form-group">
                    <label for="description">House Description</label>
                    <textarea name="house_description" id="content" class="form-control"><?php echo $selectOneRow->house_description;
                                                                                            ?></textarea>
                </div>
                <input type="submit" name="submit" value="Update" class="btn btn-primary">
            </div>
            <div class="col-md-6 col-sm-6">
                <div>
                    <div class="form-group">
                        <label for="title">Road Number</label>
                        <input type="text" name="road_number" class="form-control" value="<?php echo $selectOneRow->road_number;
                                                                                            ?>">
                    </div>
                    <div class="form-group">
                        <label for="title">Village Name</label>
                        <input type="text" name="village_name" class="form-control" value="<?php echo $selectOneRow->village_name;
                                                                                            ?>">
                    </div>
                    <div class="form-group">
                        <label for="title">Word No</label>
                        <input type="text" name="word_no" class="form-control" value="<?php echo $selectOneRow->word_no;
                                                                                        ?>">
                    </div>
                    <div class="form-group">
                        <label for="title">Poster Code</label>
                        <input type="text" name="poster_code" class="form-control" value="<?php echo $selectOneRow->poster_code;
                                                                                            ?>">
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close()
        ?>
    <?php } else { ?>
        <?php echo validation_errors();
        ?>
        <?php echo $this->session->flashdata('msg');
        ?>

        <?php echo form_open_multipart('house_info_insert');
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">House Name</label>
                    <input type="text" name="house_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">House Description</label>
                    <textarea name="house_description" id="content" class="form-control"></textarea>
                </div>
                <input type="submit" name="submit" value="insert" class="btn btn-primary">
            </div>
            <div class="col-md-6 col-sm-6">
                <div>
                    <div class="form-group">
                        <label for="title">Road Number</label>
                        <input type="text" name="road_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Village Name</label>
                        <input type="text" name="village_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Word No</label>
                        <input type="text" name="word_no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Poster Code</label>
                        <input type="text" name="poster_code" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close()
        ?>
</div>
<?php } ?>
<script>
    CKEDITOR.replace('content', {
        height: 200,
    });
</script>