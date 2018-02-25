<div id="top-nav">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Navbar toggle button -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                        aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Sidebar toggle button -->
                <button type="button" class="sidebar-toggle">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand text-size-24" href="#"><i class="fa fa-star-o"></i> Profil Perusahaan</a>
            </div>
        </div>
    </nav>
</div>
<div id="content">
    <div class="panel panel-info">
        <div class="panel-body">
            <?php foreach ($profil as $prof)?>
            <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <span class="text-size-22"><i class="fa fa-clone space-right-10"></i>Profil Perusahaan</span>
                                <p class="break-top-10 text-size-16">
                                    <?=$prof->profil?>
                                </p>
                            </div>
                            <a
                                href="javascript:;"
                                data-profil="<?=$prof->profil?>"
                                data-toggle="modal" data-target="#edit-data">
                                <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-success">Update Data Perusahaan</button>
                            </a>
                        </div>
                    </div>
            </div>
<?php  ?>
        </div>
    </div>
</div>

<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/jquery/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#profil').attr("value",div.data('profil'));
        });
    });
</script>

<div class="modal fade" id="edit-data" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">
                    <center>
                        Edit Profil Perusahaan
                    </center>
                </h3>
            </div>
            <div class="modal-body">
                <form action="<?=site_url('Member/profil_usaha')?>" role="form" class="form-horizontal" method="post">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Profil</label>
                            <div class="col-md-9">
                                <input name="profil" class="form-control" type="text" id="profil">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="submit" class="btn btn-info btn-block"><br>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

