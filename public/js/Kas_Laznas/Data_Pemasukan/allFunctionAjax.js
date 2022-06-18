         //Delete Data 
            $(document).on("click", "#hapus_data_pm", function (e) {
                e.preventDefault();
                var id_hps = $(this).data("id");
                // console.log(id_hps);
                Swal.fire({
                    title: "Ingin Menghapus Data?",
                    text: "Yakin ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus Data",
                }).then((result) => {
                    if (result.isConfirmed) {
                         $.ajax({
                             type: "DELETE",
                             url: "/admin/data-pemasukan/delete/" +id_hps,
                             success: function (response) {
                                 if (response.status == 200) {
                                     Swal.fire(
                                         "Terhaus !",
                                         "Data Berhasil Di Hapus",
                                         "success"
                                     );
                                     datapemasukan();
                                 }
                             },
                         });     
                    }
                });
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });

               
            });
            
  
        // Edit(update) btn proses
        $(document).on('click', '#edit_pemasukan', function(e) {
            e.preventDefault();
            $(this).text("Updating");
            var id_pm = $('#edit_pm_id').val();
            var data= {
                    'keterangan': $('#keterangan_edit').val(),
                    'pemasukan': $('#pemasukan_edit').val(),
                    'tanggal': $('#tanggal_edit').val(),             
            }     
            // console.log(data);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });   
                
            $.ajax({
                type: "PUT",
                url: "/admin/data-pemasukan/update/"+id_pm,
                data: data,
                dataType: "json",
                success: function(response) {
                        // console.log(response);
                        if(response.status == 400){
                            $('#updateform_errList').html("");
                            $('#updateform_errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#updateform_errList').append("<li>" + err_value +
                                    "</li>");
                                // console.log(response.errors);
                            });
                            $('#edit_pemasukan').text("Update");
                        }else if(response.status == 404){
                                $('#fails_message').html("");
                                $('#fails_message').addClass("alert alert-danger");
                                $('#fails_message').text(response.message);
                                $('#edit_pemasukan').text("Update");
                            
                        }else{
                            $('#modal-edit').modal('hide');
                            //  $('#tb_pemasukan').DataTable().ajax.reload();
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Edit Data Berhasil',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#updateform_errList').html("");
                            $('#updateform_errList').removeClass('alert alert-danger');
                            $('#modal-edit').find('input').val("");
                            $('#edit_pemasukan').text("Update");
                            datapemasukan();
                        }
                }
            });

        });


        // Edit Ajax with/open modal
        $(document).on('click', '#edit_data_pm', function(e) {
            e.preventDefault();
            var id_pm = $(this).data('id');
            // console.log(id_pm);
            $('#modal-edit').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/data-pemasukan/edit/" + id_pm,
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#fails_message').html("");
                        $('#fails_message').addClass("alert alert-danger");
                        $('#fails_message').text(response.message);
                    } else {
                        $('#edit_pm_id').val(response.data_edit.id);
                        $('#keterangan_edit').val(response.data_edit.keterangan);
                        $('#pemasukan_edit').val(convertToRupiah(response.data_edit.pemasukan));
                        $('#tanggal_edit').val(formatDate(response.data_edit.tanggal));
                    }
                }
            });
        });


        // Format Tanggal On Read
        

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('/');
        }
        // Format Rupiah on Read
        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
        }





        //GET Data with ajax from json / Refresh data
           
            $(document).ready(function() {
                datapemasukan();
            });
    
        function datapemasukan() {
            var tablebody = "";
            $.ajax({
                type: "GET",
                url: "/admin/data-pemasukan",
                dataType: "json",
                success: function(response) {
                    var total = 0;
                    var nomor = 0 ;
                    // console.log(response.pemasukan);
                    $.each(response.pemasukan, function (index, element) { 
                         total += element.pemasukan                   
                            tablebody += `<tr>
                                                <td>` + (nomor += 1) + `</td>
                                                <td>` + formatDate(element.tanggal) + `</td>
                                                <td>` + element.keterangan + `</td>
                                                <td>` + convertToRupiah(element.pemasukan) + `</td>
                                                <td>` + (element.name)+ `</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" id="edit_data_pm" data-id="` +
                                element.id + `"> 
                                                        <i class="fas fa-edit">Edit</i> </a>
                                                    <a  class="btn btn-danger btn-sm" data-id="`+element.id+`" id="hapus_data_pm"> 
                                                        <i class="fas fa-trash-alt">Hapus</i> </a>
                                                </td>
                                            </tr>`
                    });
                    $("#total").text(convertToRupiah(total));
                    var tbody = $("#tablebody");
                    $("#tb_pemasukan").DataTable().destroy();
                    tbody.html(tablebody);
                    $("#tb_pemasukan").DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "autoWidth": false,
                        "buttons": ["pdf", "print", "colvis"],
                    }).buttons().container().appendTo('#tb_pemasukan_wrapper .col-md-6:eq(0)');
                    $("#tb_pemasukan").DataTable().draw();

                }

            });
        }


//
  // Open Modals Tambah Data
   
        $(document).ready(function() {
            $('#tambah_data').click(function(e) {
                e.preventDefault();
                $('#modal-default').modal('show');
            });
        });
    


 //Tambah Data
   
        $(document).ready(function() {


            $('#simpan_pemasukan').click(function(e) {
                e.preventDefault();
                var data = {
                    'keterangan': $('#add_keterangan').val(),
                    'pemasukan': $('#add_pemasukan').val(),
                    'tanggal': $('#add_tanggal').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/admin/data-pemasukan/add",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $("#saveform_errList").html("");
                            $("#saveform_errList").addClass(
                                "alert alert-danger"
                            );
                            $.each(response.errors, function (key, err_value) {
                                $("#saveform_errList").append(
                                    "<li>" + err_value + "</li>"
                                );
                                // console.log(err_value);
                            });
                        } else {
                            $("#saveform_errList").html("");
                            $("#modal-default").modal("hide");
                            //  $('#tb_pemasukan').DataTable().ajax.reload();
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Data Berhasil Di Tambah",
                                showConfirmButton: false,
                                timer: 1500,
                            });

                            $("#modal-default").find("input").val("");
                            datapemasukan();
                        }
                    },
                });
            });
        });
    




//On Key Up Format Uang
   
        $('#add_pemasukan,#pemasukan_edit').keyup(function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            $('#add_pemasukan,#pemasukan_edit').val(formatRupiah(this.value, 'Rp. '));
            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        });
    




   //Date Picker
    
        $(function() {

            $('#reservationdate,#reservationdate1').datetimepicker({
                format: 'DD/MM/YYYY'
            });
            // $('#reservationdate1').datetimepicker({
            //     format: 'L'
            // });
        });
    