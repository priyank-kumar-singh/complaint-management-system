<div class="main-content">
    <span style="padding-left:4%; padding-top:2%;  color:red">
        <?php if ($errormsg) {
            echo htmlentities($errormsg);
        } ?></span>
    <span style="padding-left:4%; padding-top:2%;  color:green">
        <?php if ($msg) {
            echo htmlentities($msg);
        } ?></span>
    <div class="main-content-headers-2" style="padding: 0;">
        Lodge Complaint
    </div>
    <br>
    <br>
    <form class="form-complaint" name="complaint" method="post">
        <div class="row">
            <div class="col">
                <div class="col">
                    <select name="category" class="form-select" required>
                        <option value="" hidden selected disabled>Category</option>
                        <option value="C1">Category 1</option>
                        <option value="C2">Category 2</option>
                        <option value="C3">Category 3</option>
                    </select>
                </div>
                <br>
                <div class="col">
                    <select name="type" class="form-select" required>
                        <option value="" hidden selected disabled>Type</option>
                        <option value="General">General Query</option>
                    </select>
                </div>
                <br>
                <div class="col">
                    <button class="btn btn-theme" name="submit" type="submit"><i class="fa fa-lock"></i> Lodge</button>
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <textarea name="details" rows=5 class="form-control" maxlength="500" placeholder="Details (word limit: 500)" required></textarea>
                </div>
            </div>
        </div>

    </form>
</div>
