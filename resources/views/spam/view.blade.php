@extends('template.main')
@section('title','Spam')
@section('content')
<style>
      .background-load {
            background-color: #4d3131;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999999999999999;
            opacity: 0.6;
            vertical-align: ;
        }

        #loader {
            position: absolute;
            left: 55%;
            top: 50%;
            z-index: 999999999999999999;
            width: 200px;
            height: 50px;
            margin: -75px 0 0 -75px;
            border: 10px solid #1901ec;
            border-radius: 50%;
            border-top: 10px solid #e40808;
            width: 150px;
            height: 150px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">SPAM</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Tabel SPAM</h3>
                    <div class="float-right text-right">
                        <button class="btn add-new btn-primary mb-3 mb-md-0 waves-effect waves-light" id="btn-create"><i class="fa fa-plus"></i>
                            Tambah</button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="table-spam" class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Spam</th>
                                <th>Koordinat</th>
                                <th>Lokasi</th>
                                <th>Kondisi Eksisting</th>
                                <th>Permasalahan</th>
                                <th>Tindak Lanjut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    <!-- /.col -->
    </div>
</div>


<div class="modal fade" id="modal-spam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="saveForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-3">
                    @csrf
                    <div class="row">              
                        <div class="col-md-6 form-group mb-3">
                            <input type="hidden" name="id" id="id">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value=""
                                required">
    
                            <small class="help-block text-danger tanggal"></small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="lokasi">Lokasi</label>
                            <textarea class="form-control" name="lokasi" id="lokasi" rows="3"
                                placeholder="Masukkan Lokasi"></textarea>
                            <small class="help-block text-danger lokasi"></small>
                        </div>
                         <div class="col-md-6 form-group mb-3">
                            <label for="spam">Spam</label>
                           <input type="text" class="form-control" name="spam" id="spam" placeholder="Masukkan Spam" value=""
                                required">
                            <small class="help-block text-danger spam"></small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="koordinat">Koordinat</label>
                            <input type="text" class="form-control" name="koordinat" id="koordinat"
                                placeholder="Masukkan Koordinat">
                            <small class="help-block text-danger koordinat"></small>
                        </div>
                         <div class="col-md-6 form-group mb-3">
                            <label for="kondisi_existing">Kondisi Eksisting</label>
                            <input type="text" class="form-control" name="kondisi_existing" id="kondisi_existing"
                                placeholder="Masukkan Kondisi Existing">
                            <small class="help-block text-danger kondisi_existing"></small>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="file_existing">File Eksisting</label>
                            <input type="file" class="form-control" name="file_existing" id="file_existing">
                            <small class="help-block text-danger file_existing"></small>
                        </div>
                         <div class="col-md-6 form-group mb-3">
                            <label for="permasalahan">Permasalahan</label>
                            <input type="text" class="form-control" name="permasalahan" id="permasalahan"
                                placeholder="Masukkan Permasalahan">
                            <small class="help-block text-danger permasalahan"></small>
                        </div>
                         <div class="col-md-6 form-group mb-3">
                            <label for="file_permasalahan">File Permasalahan</label>
                            <input type="file" class="form-control" name="file_permasalahan" id="file_permasalahan">
                            <small class="help-block text-danger file_permasalahan"></small>
                        </div>
                         <div class="col-md-6 form-group mb-3">
                            <label for="tindak_lanjut">Tindak Lanjut</label>
                            <textarea class="form-control" name="tindak_lanjut" id="tindak_lanjut"
                                placeholder="Masukkan Tindak Lanjut"></textarea>
                            <small class="help-block text-danger tindak_lanjut"></small>
                        </div>
                         <div class="col-md-6 form-group mb-3">
                            <label for="file_tindak_lanjut">File Tindak Lanjut</label>
                            <input type="file" class="form-control" name="file_tindak_lanjut" id="file_tindak_lanjut">
                            <small class="help-block text-danger file_tindak_lanjut"></small>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="file_spam">File Spam</label>
                            <input type="file" class="form-control" name="file_spam" id="file_spam">
                            <small class="help-block text-danger file_spam"></small>
                            <small class="help-block  mt-3 ">upload file mx 20 mb</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Tutup</button>
                    <button type="submit" id="save" class="btn btn-primary">Save Spam</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-detail-spam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail SPAM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3">
               <table border="1" class="table table-bordered">
                    <tr>
                        <th style="width: 40%;">FILE EKSISTING</th>
                        <td style="width: 60%;" id="file_existing-detail"></td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">FILE PERMASALAHAN</th>
                        <td style="width: 60%;" id="file_permasalahan-detail"></td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">FILE TINDAK LANJUT</th>
                        <td style="width: 60%;" id="file_tindak_lanjut-detail"></td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">FILE SPAM</th>
                        <td style="width: 60%;" id="file_spam-detail"></td>
                    </tr>
               </table> 
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        function loading()
        {
            $('#loader').show();
            $('.div-loading').addClass('background-load');
        }
        function matikanLoading()
        {
            $('#loader').hide();
            $('.div-loading').removeClass('background-load');
        }
        function hapusvalidasi(key) {
            let pesan = $('#' + key);
            let text = $('.' + key);
            pesan.removeClass('is-invalid');
            text.text(null);
        }
        function addValidasi(key,textVal) {
            let pesan = $('#' + key);
            let text = $('.' + key);
            pesan.addClass('is-invalid');
            text.text(textVal);
        }
        $(document).ready(function() {
            $('#table-spam').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url("spam/table") }}',
                    type: 'GET'
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'spam', name: 'spam' },
                    { data: 'koordinat', name: 'koordinat' },
                    { data: 'lokasi', name: 'lokasi' },
                    { data: 'kondisi_existing', name: 'kondisi_existing' },
                    { data: 'permasalahan', name: 'permasalahan' },
                    { data: 'tindak_lanjut', name: 'tindak_lanjut' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[1, 'desc']],
                responsive: true,
            });

            $("#btn-create").click(function () {
                $("#id").val("");
                $("#lokasi").val("");
                $("#koordinat").val("");
                $("#kondisi_existing").val("");
                $("#permasalahan").val("");
                $("#tindak_lanjut").val("");
                $("#file_tindak_lanjut").val("");
                $("#file_spam").val("");
                $("#file_permasalahan").val("");
                $("#file_existing").val("");
                $("#tanggal").val("");
                $("#spam").val("");
                $("#save").text("Save Spam")
                $(".modal-title").text("Modal Tambah Spam");
                $("#modal-spam").modal("show");
            })  

            $("#saveForm").submit(function(e){
                e.preventDefault();
                let form=$(this)[0];
                let formData=new FormData(form);
                $.ajax({
                    url : "{{url('spam/create')}}",
                    method:'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data :formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:'JSON',
                    beforeSend: function () {
                        loading();
                    },
                    success:function(data) {
                        matikanLoading();
                        if ($.isEmptyObject(data.errors)) {
                            $.each(data.success,function(key){
                                hapusvalidasi(key);
                            });
                                Swal.fire({
                                    title: "Pesan!",
                                    text: data.message,
                                    icon: "success",
                                    customClass: {
                                        confirmButton: 'btn btn-primary waves-effect waves-light'
                                    },
                                    buttonsStyling: false
                                });
                                form.reset();
                                $("#modal-spam").modal('hide');
                                $('#table-spam').DataTable().ajax.reload();
                        }
                        else{
                            $.each(data.errors, function (key, value) {
                                hapusvalidasi(key);
                                addValidasi(key,value);
                            });
                            Swal.fire({
                                    title: "Pesan!",
                                    text: "mohon isi form dengan benar",
                                    icon: "error",
                            });
                        }
                    }
                });
            })

            $('body').on('click', '.btn-edit', function () {
                let id = $(this).data('id');
                let tanggal = $(this).data('tanggal');
                let lokasi = $(this).data('lokasi');
                let koordinat = $(this).data('koordinat');
                let kondisi_existing = $(this).data('kondisi_existing');
                let permasalahan = $(this).data('permasalahan');
                let spam = $(this).data('spam');
                let tindak_lanjut = $(this).data('tindak_lanjut');
                Swal.fire({
                        title: "Yakin?",
                        text: "anda yakin ingin mengedit data ini??",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        customClass: {
                            confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                            cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    })
                    .then((willEdit) => {
                        if (willEdit.value) {
                            $("#id").val(id);
                            $("#tanggal").val(tanggal);
                            $("#spam").val(spam);
                            $("#lokasi").val(lokasi);
                            $("#koordinat").val(koordinat);
                            $("#kondisi_existing").val(kondisi_existing);
                            $("#permasalahan").val(permasalahan);
                            $("#tindak_lanjut").val(tindak_lanjut);
                            $("#save").text("Edit Spam");
                            $(".modal-title").text("Modal Edit Spam");
                            $("#modal-spam").modal("show");
                        } else {
                            Swal.fire("Anda membatalkan edit data"); 
                        }
                    });
            });

            $('body').on('click', '.btn-delete', function () {
                let hapus = $(this).data('id');
                Swal.fire({
                        title: "Yakin?",
                        text: "anda yakin ingin menghapus data ini??",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        customClass: {
                            confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                            cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    })
                    .then((willDelete) => {
                        if (willDelete.value) {
                            let url = `{{url('spam/delete')}}/` + hapus;
                            fetch(url).then(res => res.json()).then(_ => {
                                Swal.fire({
                                    title: "Pesan!",
                                    text: "Anda Telah Berhasil menghapus data spam!",
                                    icon: "success",
                                        customClass: {
                                        confirmButton: 'btn btn-primary waves-effect waves-light'
                                    },
                                    buttonsStyling: false
                                });
                                $("#table-spam").DataTable().ajax.reload();
                            })
                        } else {
                            Swal.fire("Anda membatalkan hapus data");
                        }
                    });
            });

            $('body').on('click','.btn-detail',function(){
                let id = $(this).data('id');
                let url = `{{url('spam/detail')}}/` + id;
                fetch(url).then(res => res.json()).then(data => {
                    console.log(data)
                    if(data.success) {
                        if(data.success.file_existing) {
                            $('#file_existing-detail').html(`<a href="`+data.success.file_existing+`" class="btn btn-success" target="_blank">Lihat File</a>`);
                        } else {
                            $('#file_existing-detail').html(`-`);
                        }
                        if(data.success.file_permasalahan) {
                            $('#file_permasalahan-detail').html(`<a href="`+data.success.file_permasalahan+`" class="btn btn-success" target="_blank">Lihat File</a>`);
                        } else {
                            $('#file_permasalahan-detail').html(`-`);
                        }
                        if(data.success.file_tindak_lanjut) {
                            $('#file_tindak_lanjut-detail').html(`<a href="`+data.success.file_tindak_lanjut+`" class="btn btn-success" target="_blank">Lihat File</a>`);
                        } else {
                            $('#file_tindak_lanjut-detail').html(`-`);
                        }
                        if(data.success.file_spam) {
                            $('#file_spam-detail').html(`<a href="`+data.success.file_spam+`" class="btn btn-success" target="_blank">Lihat File</a>`);
                        } else {
                            $('#file_spam-detail').html(`-`);
                        }
                        $('#modal-detail-spam').modal('show');
                    }
                })
            });
        });
    </script>
@endsection