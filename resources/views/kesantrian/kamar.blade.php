@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">
                                <span>Tambah Kamar</span>
                            </button>
                            <h6>Kamar table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="data_kamar" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-midle text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Nomer</th>
                                            <th
                                                class="align-midle text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Nama Kamar</th>
                                            <th
                                                class="align-midle text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="align-midle text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--tambah Modal -->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Tambah data kamar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form id="formTambah" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Kamar:</label>
                                        <input type="text" class="form-control" id="nama_kamar" name="nama_kamar">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-primary">Tambah Kamar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
                    aria-hidden="true" data-id_kamar="">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit data kamar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form id="formedit">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Kamar:</label>
                                        <input type="text" class="form-control" id="nama_kamar" name="nama_kamar">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-primary">Edit Kamar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            var table = $('#data_kamar').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get-kamar') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'id_kamar',
                        name: 'id_kamar'
                    },
                    {
                        data: 'nama_kamar',
                        name: 'nama_kamar'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                language: {
                    buttons: {
                        colvis: 'Pilih Kolom'
                    }
                },
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'print',
                        messageTop: 'This print was produced using the Print button for DataTables',
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend(
                                    '<img src="img/logo.png" style="position:absolute; top:0; left:0; opacity:50;" />'
                                );

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        download: 'open',
                        autoFilter: true,
                        sheetName: 'Exported data',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        tittle: 'Data Kelas',
                        download: 'open',
                        exportOptions: {
                            columns: ':visible'
                        } //,
                        //customize: function ( doc ) {
                        //    doc.content.splice( 1, 0, {
                        //        margin: [ 0, 0, 0, 12 ],
                        //        alignment: 'center',
                        //        image: 'img/logo.png'
                        //    } );
                        //}
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore'],
                        columnText: function(dt, idx, title) {
                            return (idx + 1) + ': ' + title;
                        }
                    }
                ]
            });
            $('#formTambah').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('kamar.store') }}',
                    data: $('#formTambah').serialize(),
                    success: function(response) {
                        console.log(response);
                        $('#tambahModal').modal('hide');
                        $('#data_kamar').DataTable().ajax.reload();
                    },
                    error: function(error) {
                        console.log(error.responseJSON.errors);
                        // Handle validation errors
                    },
                });
            });
            $('#data_kamar').on('click', '.edit', function() {
                var id = $(this).data('id');
                $.get('/items/' + id + '/edit', function(data) {
                    $('#editModal').modal('show');
                    $('#nama_kamar').val(data.data.nama_kamar);
                });
            });
        });
    </script>
@endsection
