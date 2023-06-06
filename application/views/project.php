<div>
    <form action="<?php echo base_url('project/getProject') ?>" method="post">
        <div class="form-group">
            <label for="UserEmail">Email: </label>
            <input type="email" name="UserEmail" id="UserEmail" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Reference No.</label>
            <input type="text" name="ReferenceNo" id="ReferenceNo">
        </div>
        <button class="btn">Get Project</button>
    </form>
</div>