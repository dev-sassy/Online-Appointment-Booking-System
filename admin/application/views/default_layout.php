<!DOCTYPE HTML>
<html lang="en">
    <?php
    $data[''] = '';
    $this->load->view('head', $data);
    ?>
    <body class="sticky-header">
        <section>
            <!-- left side start-->
            <?php
            $this->load->view('nav');
            ?>
            <!-- left side end-->

            <!-- main content start-->
            <div class="main-content" >
                <!-- header section start-->
                <?php
                $this->load->view('header');
                ?>	
                <!-- header section end-->	

                <!-- page heading start-->
                <div class="page-heading">
                    <h3>
                        Dashboard
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active"> My Dashboard </li>
                    </ul>
                </div>
                <!-- page heading end-->
                <?php if ($this->session->flashdata('successMsg') != '') { ?>
                    <div class="alert alert-success" id="add_succ" >
                        <?php echo '<h6>' . $this->session->flashdata('successMsg') . '</h6>'; ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error_message') != '') { ?>
                    <div class="alert alert-success" id="error_message" >
                        <?php echo '<h6>' . $this->session->flashdata('error_message') . '</h6>'; ?>
                    </div>
                <?php } ?>

                <!--body wrapper start-->
                <div class="wrapper">
                    <?php echo $content; ?>
                </div>
                <!--body wrapper end-->
                <!--footer section start-->
                <footer>
                    <?php echo date('Y') . " &copy; Sassy infotech"; ?>
                </footer>
                <!--footer section end-->

            </div>
            <!-- main content end-->
        </section>
        <?php
        $this->load->view('footer');
        ?>
        <?php
        if (isset($js)) {
            foreach ($js as $val) {
                echo '<script type="text/javascript" src="' . base_url() . 'assets/js/' . $val . '.js"></script>';
            }
        }
        if (isset($externaljs)) {
            foreach ($externaljs as $val) {
                echo '<script type="text/javascript" src="' . $val . '"></script>';
            }
        }
        ?>
    </body>
    <script>
        setTimeout(function () {
            $('#add_succ').fadeOut('slow');
        }, 1000);
        setTimeout(function () {
            $('#error_message').fadeOut('slow');
        }, 1000);
    </script>
</html>

