<div class="page-title">
    <div class="title_left">
        <h3>Data Member</h3>
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
                <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button>
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
        <table class="table table-striped" id="datatable-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Member</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataMember">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Member</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="member_nama" id="member_nama" class="form-control" placeholder="Nama..">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="member_tgl_lahir" id="member_tgl_lahir" class="form-control" placeholder="Tangal">
                            </div>
                            <div class="form-group">
                                <label>No Telpon</label>
                                <input type="text" name="member_notelp" id="member_notelp" class="form-control" placeholder="No Telpon..">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="member_alamat" id="member_alamat" class="form-control" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="member_email" id="member_email" class="form-control" placeholder="Email..">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="member_password" id="member_password" class="form-control" placeholder="Password..">
                                <input type="hidden" id="member_id">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="simpan()" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>


        </div>
    </div>
</div>

<script>
    function tampil() {
        $('#dataMember').modal()
    }

    function simpan() {
        var member_nama = $('#member_nama').val()
        var member_email = $('#member_email').val()
        var member_password = $('#member_password').val()
        var member_alamat = $('#member_alamat').val()
        var member_notelp = $('#member_notelp').val()
        var member_tgl_lahir = $('#member_tgl_lahir').val()
        var member_id = $('#member_id').val()

        axios.post('inc/member/aksi_simpan_member.php', {
            'member_nama': member_nama,
            'member_email': member_email,
            'member_password': member_password,
            'member_alamat': member_alamat,
            'member_notelp': member_notelp,
            'member_tgl_lahir': member_tgl_lahir,
            'member_id': member_id,
        }).then(function(res) {
            kosong()
            $('#dataMember').modal('hide')
            $('#isi').load('inc/member/data_member.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#dataMember').modal('hide')
            $('#isi').load('inc/member/data_member.php');
        })
    }


    function edit(id) {
        axios.post('inc/member/aksi_edit_member.php', {
            'member_id': id
        }).then(function(res) {

            var data = res.data
            $('#member_email').val(data.member_email)
            $('#member_nama').val(data.member_nama)
            $('#member_password').val(data.member_password_repeat)
            $('#member_alamat').val(data.member_alamat)
            $('#member_notelp').val(data.member_notelp)
            $('#member_tgl_lahir').val(data.member_tgl_lahir)
            $('#member_kode').val(data.member_kode)
            $('#member_id').val(data.member_id)
            $('#dataMember').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/member/aksi_hapus_member.php', {
            'member_id': id
        }).then(function(res) {
            var data = res.data
            $('#isi').load('inc/member/data_member.php');
        })
    }

    function kosong() {
        $('#member_email').val('')
        $('#member_nama').val('')
        $('#member_password').val('')
        $('#member_alamat').val('')
        $('#member_tgl_lahir').val('')
        $('#member_notelp').val('')
        $('#member_id').val('')
    }
    $('#isi').load('inc/member/data_member.php');
</script>