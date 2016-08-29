
    <div class="row">
        <div class="col-md-12 ">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo $action . " " . $Module; ?>
                </header>

                <div class="panel-body">
                    <form id="cmsEditForm" role="form" class="cmxform form-horizontal adminex-form" method="post" action="<?= base_url() . 'cms/addEdit'; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="page_id" id="page_id" value="<?php echo @$page_id; ?>">
                        <div class="form-group clearfix">
                            <div class="col-md-12 col-sm-12">
                                <label for="exampleInputEmail1">Page Title  : </label>
                                <input type="text" class="form-control required" name="page_title" id="page_title" placeholder="Page Title" value="<?php echo @$page_title; ?>" maxlength="50"/>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <div class="col-md-6 col-sm-6">
                                <label for="page_metakeyword">Page Meta Keywords : </label>
                                <textarea class="form-control" name="page_metakeyword" id="page_metakeyword" rows="6"><?php echo @$page_metakeyword; ?></textarea>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label for="page_metadesc">Page Meta Description : </label>
                                <textarea class="form-control" name="page_metadesc" id="page_metadesc" rows="6"><?php echo @$page_metadesc; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <div class="col-md-12 col-sm-12">
                                <label for="exampleInputEmail1">Page Content : </label>
                                <textarea class="form-control ckeditor" name="page_content" id="page_content" rows="6"><?php echo @$page_content; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 pd0 col-sm-12">
                            <input value="save" type="submit" id="submit" name="submit" class="btn btn-primary"/>
                            <a class="btn btn-default" href="<?php echo base_url('cms'); ?>"> Cancel</a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

