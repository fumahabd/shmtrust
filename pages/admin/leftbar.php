<div class="leftmenu col-2">
    <div class="sidebar px-2">
        <?php if (user()->email) { ?>
        <div class="card mb-3 p-2 rounded-0">
            <div class="user-panel pb-2 text-center">
                <div class="image d-flex align-items-center justify-content-center">
                    <div class="rounded-circle border border-2 border-secondary d-flex align-items-center justify-content-center"
                        style="width:50px;height:50px"> <i class="user-icon icon-bg-grey" style="zoom:1.5"></i></div>
                </div>
                <div class="info ps-2">
                    <a class="text-secondary">
                        <h5 class="text-capitalize fw-bold mb-0">
                            <?php echo user()->name ?>
                        </h5>
                    </a>
                </div>
                <hr>
            </div>
        </div>
        <?php } ?>
        <nav class="">
            <div class="card p-2 gap-2 rounded-0">
                <div>
                    <a class="all-services-btn d-flex align-items-center text-secondary cursor-pointer border border-1 border-secondary p-2 bg-primary-subtle bg-grey-400-hover"
                        id="all-services-btn">
                        <i class="user-icon icon-bg-grey" style="zoom:1.5"></i>
                        <span class="ps-2">Services</span>
                    </a>
                </div>
                <div>
                    <a class="all-products-btn d-flex align-items-center text-secondary cursor-pointer border border-1 border-secondary p-2 bg-success-subtle bg-grey-400-hover"
                        id="all-products-btn">
                        <i class="user-icon icon-bg-grey" style="zoom:1.5"></i>
                        <span class="ps-2">Products</span>
                    </a>
                </div>
                <div>
                    <a class="all-projects-btn d-flex align-items-center text-secondary cursor-pointer border border-1 border-secondary p-2 bg-danger-subtle bg-grey-400-hover"
                        id="all-projects-btn">
                        <i class="user-icon icon-bg-grey" style="zoom:1.5"></i>
                        <span class="ps-2">Projects</span>
                    </a>
                </div>
                <div>
                    <a class="all-career-btn d-flex align-items-center text-secondary cursor-pointer border border-1 border-secondary p-2 bg-warning-subtle bg-grey-400-hover"
                        id="all-career-btn">
                        <i class="user-icon icon-bg-grey" style="zoom:1.5"></i>
                        <span class="ps-2">Careers</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>