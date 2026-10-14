<?php
$data = ["id" => "", "title" => "", "text" => "", "icon" => "", "image"=>"", "bg_color"=>"", "sl"=>"", "status"=>""];
if ($mode === 'edit') {
    $data = $service;
}
?>
<div>
    <div class="loader-wrapper d-none">
        <div class="bar-loader"></div>
    </div>
    <div class="w-100 g-0 d-flex justify-content-between align-items-center p-3">
        <div class="">
            <h5 class="modal-title"><?php echo $mode === 'edit' ? 'Edit Service' : 'Add New Service' ?></h5>
        </div>
        <div class="position-relative">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    </div>
</div>
<hr>
<div class="modal-body">
    <div class="row g-0 d-flex">
        <div class="col-12">
            <label for="title" class="form-label mb-0">
                <strong>Title </strong><span class="limit text-success fs-8px"></span></label>
            <div class="input-group">
                <input type="text" name="title" class="form-control rounded-0" id="title" placeholder="give some title"
                    value="<?php echo $data['title']; ?>" required>
            </div>
        </div>
        <div class="col-12 mt-1">
            <label for="textbody" class="form-label mb-0 mt-1"><strong>Text </strong><span
                    class="limit text-success fs-8px"></span></label>
            <div class="input-group">
                <textarea name="text" id="text" class="form-control"><?php echo $data['text']; ?></textarea>
            </div>
        </div>
        <div class="col-12 py-2">
            <strong>Icon Image (svg)</strong>
            <div class="previewBox py-2" id="previewBox">
                <?php if (!empty($data['icon'])) { ?>
                <div class="previewImg position-relative">
                    <img src="../<?php echo $data['icon'] ?>" class="previousImg"><span class="previewcrossbtn">✖</span>
                </div>
                <?php } ?>
            </div>
            <div class="d-flex" style="width:80px">
                <div class="input-group">
                    <label for="choosepostimage" id="customImgInput" title="Choose Icon Image"><i
                            class="image-icon icon-bg-grey"></i></label>
                    <input type="file" name="icon" id="choosepostimage" accept="image/svg+xml">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer px-0 pb-0">
        <div class="col-12 d-flex justify-content-end align-items-center gap-2">
            <?php
            if (user()->email) { ?>
            <button type="submit" class="btn btn-primary"
                id="<?php echo $mode == 'edit' ? 'service-update-btn' : 'service-save-btn' ?>"
                name="<?php echo $mode == 'edit' ? 'service-update-btn' : 'service-save-btn' ?>"
                data-id="<?php echo $data['id'] ?>"><?php echo $mode == 'edit' ? 'Update' : 'Save' ?></button>
            <?php } ?>
        </div>
    </div>
</div>