<div class="page-title">
    <div class="title_left">
        <h3>Data Ukuran</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            //
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <!-- <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button> -->
            </div>
            <div class="col-md-6">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive">
            <thead>
                <tr>
                    <th class="text-center" style="width:40px">No</th>
                    <th>Nama Merk</th>
                    <th>UE</th>
                    <th>UK</th>
                    <th>US</th>
                    <th>CM</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<script>
    $('#isi').load('inc/ukuran2/data_ukuran.php');
</script>