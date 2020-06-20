<div class="content">
    <div class="row ">
        <div class="col-md-6">
            <?php echo validation_errors(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo form_open('branchUpdate'); ?>
            <div class="form-group">
                <label for="branch_name">Branch Name</label>
                <input type="text" name="branch_name" class="form-control" value="<?= $selectonerow->branch_name; ?>">
            </div>
            <div class="form-group">
                <label for="branch_title">Branch Title</label>
                <input type="text" name="branch_title" class="form-control" value="<?= $selectonerow->branch_title; ?>">
            </div>
            <div class="form-group">
                <label for="branch_address">Branch Address</label>
                <input type="text" name="branch_address" class="form-control" value="<?= $selectonerow->branch_address; ?>">
            </div>
            <input type="hidden" name="branch_id" class="form-control" value="<?= $selectonerow->branch_id; ?>">
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
                    <th>Branch Name</th>
                    <th>Branch Title</th>
                    <th>Branch Address</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
				
				<?php if($allBranch){
                $j=1;
                foreach ($allBranch as $value) {
                ?>		
					<tr>
						<td><?php echo $j++; 
                            ?></td>
						<td><?php echo  $value->branch_name; 
                            ?></td>
						<td><?php echo  $value->branch_title; 
                            ?></td>
						<td><?php echo  $value->branch_address; 
                            ?></td>
						<td class="text-center">
							<a href="<?php echo base_url().'branchEdit/'.$value->branch_id; 
                                        ?>" class="btn btn-info">Edit</a>
							<a href="<?php echo base_url().'branchDelete/'.$value->branch_id; 
                                        ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this category')">Delete</a>
						</td>
					</tr>	
				<?php } }else{
                ?>
					<tr><td colspan='3' class="text-center">No Recoud found</td></tr>
				<?php } 
                ?>
			</tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>/assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/vue-select.min.js"></script>

<script>
    new Vue({
        el: '#userAccess',
        data() {
            return {
                userId: parseInt('<?php echo $userId; ?>'),
                access: []
            }
        },
        mounted() {
            let accessCheckboxes = document.querySelectorAll('.access');
            accessCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('click', () => {
                    this.makeChecked();
                })
            })
        },
        async created() {
            await axios.post('/get_user_access', {
                userId: this.userId
            }).then(res => {
                let r = res.data;
                if (r != '') {
                    this.access = JSON.parse(r);
                }
            })
            this.makeChecked();
        },
        methods: {
            makeChecked() {
                groups = document.querySelectorAll('.group');
                groups.forEach(group => {
                    let groupHead = group.querySelector('.group-head');
                    let accessCheckboxes = group.querySelectorAll('ul li input').length;
                    let checkedAccessCheckBoxes = group.querySelectorAll('ul li input:checked').length;
                    if (accessCheckboxes == checkedAccessCheckBoxes) {
                        groupHead.checked = true;
                    } else {
                        groupHead.checked = false;
                    }
                })

                let selectAllCheckbox = document.querySelector('#selectAll');
                let totalAccessCheckboxes = document.querySelectorAll('.access').length;
                let totalCheckedAccessCheckBoxes = document.querySelectorAll('.access:checked').length;

                if (totalAccessCheckboxes == totalCheckedAccessCheckBoxes) {
                    selectAllCheckbox.checked = true;
                } else {
                    selectAllCheckbox.checked = false;
                }
            },
            async onClickGroupHeads() {
                let groupHead = event.target;
                let ul = groupHead.parentNode.querySelector('ul');
                let accessCheckboxes = ul.querySelectorAll('li input');

                if (groupHead.checked) {
                    accessCheckboxes.forEach(checkbox => {
                        this.access.push(checkbox.value);
                    })
                } else {
                    accessCheckboxes.forEach(checkbox => {
                        let ind = this.access.findIndex(a => a == checkbox.value);
                        this.access.splice(ind, 1);
                    })
                }
                this.access = this.access.filter((v, i, a) => a.indexOf(v) === i);
                await new Promise(r => setTimeout(r, 200));
                this.makeChecked();
            },
            addUserAccess() {
                let data = {
                    userId: this.userId,
                    access: this.access
                }
                axios.post('/add_user_access', data).then(res => {
                    let r = res.data;
                    alert(r.message);
                })
            }
        }
    })
</script>
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