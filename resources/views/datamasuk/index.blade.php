@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Masuk</h3>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-group fa-fw"></i> List Data Masuk
                </div>
                <br>
                <div class="panel-body top-operation">
                    <div class="col-lg-5 search-head-outer">
                        <form class="form-inline" role="form" method="GET" action="{{ route('data-masuk-search') }}">
                            <div class="input-group search-head">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="Nomor Kontrol">
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#createModal"><div class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus-circle"></i> Tambah </div></a>
                </div>
                    <div class="panel-body">
                        <div class="table-responsive table-data">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Kontrol</th>
                                        <th>No Kendaraan</th>
                                        <th>No Mesin</th>
                                        <th>No Rangka</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 0; @endphp
                                    @foreach ($datamasuk as $dm)
                                    @php $index += 1 @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $dm->no_kontrol }}</td>
                                        <td>{{ $dm->no_kendaraan }}</td>
                                        <td>{{ $dm->no_mesin }}</td>
                                        <td>{{ $dm->no_rangka }}</td>
                                        <td>{{ $dm->tanggal_masuk }}</td>
                                        <td>{{ $dm->jumlah_biaya }}</td>
                                        <td class="detail-info" href="#">
                                            <a class="detail-info" href="#">
                                                <button
                                                    class="btn btn-primary"
                                                    onclick="editModal('{{ $dm->id }}')"
                                                    data-toggle="modal"
                                                    data-target="#editModal">
                                                    <i class="fa fa-edit fa-fw"></i>
                                                    Edit
                                                </button>
                                            </a>
                                            <a href="#">
                                                <button
                                                    class="btn btn-danger"
                                                    onclick="deleteModal('{{ $dm->id }}')"
                                                    class="btn btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#confirmDelete">
                                                    <i class="fa fa-trash fa-fw"></i>Delete
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right" id="page-control">
                            <ul class="pagination">
                                {{ $datamasuk->links() }}
                            </ul>
                        </div>
                        <!-- Modal Create -->
                        <div class="modal fade" id="createModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form action="{{ route('data-masuk-create') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Tambah Data Masuk</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id-data-masuk" id="id-datamasuk">
                                            <div class="form-group">
                                                <label for="">No Kontrol</label>
                                                <input type="text" class="form-control" name="no_kontrol" required placeholder="No Kontrol">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Kendaraan</label>
                                                <input type="text" class="form-control" name="no_kendaraan" required placeholder="No Kendaraan">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Mesin</label>
                                                <input type="text" class="form-control" name="no_mesin" required placeholder="No Mesin">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Rangka</label>
                                                <input type="text" class="form-control" name="no_rangka" required placeholder="No Rangka">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal Masuk</label>
                                                <input type="date" class="form-control" name="tanggal_masuk" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jumlah Biaya</label>
                                                <input type="text" class="form-control" name="jumlah_biaya" required placeholder="Jumlah Biaya">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form action="{{ route('data-masuk-update') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Data Masuk</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id-data-masuk" id="edit-id-data-masuk">
                                            <div class="form-group">
                                                <label for="">No Kontrol</label>
                                                <input type="text" id="edit-no-kontrol" class="form-control" name="no_kontrol" required placeholder="No Kontrol">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Kendaraan</label>
                                                <input type="text" id="edit-no-kendaraan" class="form-control" name="no_kendaraan" required placeholder="No Kendaraan">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Mesin</label>
                                                <input type="text" id="edit-no-mesin" class="form-control" name="no_mesin" required placeholder="No Mesin">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Rangka</label>
                                                <input type="text" id="edit-no-rangka" class="form-control" name="no_rangka" required placeholder="No Rangka">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal Masuk</label>
                                                <input type="date" id="edit-tgl-masuk" class="form-control" name="tanggal_masuk" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jumlah Biaya</label>
                                                <input type="text" id="edit-jumlah-biaya" class="form-control" name="jumlah_biaya" required placeholder="Jumlah Biaya">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Delete Parmanently</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin akan menghapus data ini ?</p>
                                </div>
                                <div class="modal-footer">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <button type="button" class="btn btn-default" id="btn-close-confirmDelete" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" data-id="$barangs->id" id="confirm">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function editModal(idDataMasuk) {
        $.ajax({
            type: "GET",
            url: "{{ url('datamasuk/') }}"+'/'+idDataMasuk,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response[0]);
                $('#edit-id-data-masuk').val(response[0].id);
                $('#edit-no-kontrol').val(response[0].no_kontrol);
                $('#edit-no-kendaraan').val(response[0].no_kendaraan);
                $('#edit-no-mesin').val(response[0].no_mesin);
                $('#edit-no-rangka').val(response[0].no_rangka);
                $('#edit-tgl-masuk').val(response[0].tanggal_masuk);
                $('#edit-jumlah-biaya').val(response[0].jumlah_biaya);
            }
        });
    }
    function deleteModal(idDataMasuk) {
        $('#confirm').on('click', function () {
            var route = "{{ route('data-masuk-delete') }}";
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "post",
                url: route,
                dataType: "json",
                data: {
                    'id-data-masuk': idDataMasuk,
                    '_token': token
                }
            })
            .done(function(data) {
                if(data.status == "error") return alert("Gagal Menghapus Data !");
                $("#confirmDelete").children().children().children().children()[4].click()
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            })
            .fail(function(e) {
                console.log('error => '+e.responseJSON.message);
            })
        });
    }
</script>
@endsection
