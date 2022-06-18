
// Format Tanggal On Read
function formatDate(date) {
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [day, month, year].join("/");
}
// Format Rupiah on Read
function convertToRupiah(angka) {
    var rupiah = "";
    var angkarev = angka.toString().split("").reverse().join("");
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ".";
    return (
        "Rp. " +
        rupiah
            .split("", rupiah.length - 1)
            .reverse()
            .join("")
    );
}

//modal tambah data edit
$(document).ready(function () {
    $("#tambah_data_pengeluaran").click(function (e) {
        e.preventDefault();
        $("#modal-pengeluaran-add").modal("show");
    });
});
//datetime picker
$(function () {
    $("#reservationdate,#reservationdate1").datetimepicker({
        format: "DD/MM/YYYY",
    });
    // $('#reservationdate1').datetimepicker({
    //     format: 'L'
    // });
});
//On Key Up Format Uang   
        $('#add_pengeluaran,#pengeluaran_edit').keyup(function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            $('#add_pengeluaran,#pengeluaran_edit').val(formatRupiah(this.value, 'Rp. '));
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
//Get Data From Database
$(document).ready(function () {
    datapengeluaran();
});
    
   function datapengeluaran() {
            var tablebody = "";
            $.ajax({
                type: "GET",
                url: "/admin/data-pengeluaran",
                dataType: "json",
                success: function(response) {
                    var total = 0;
                    var nomor = 0 ;
                    // console.log(response);
                    $.each(response.pengeluaran, function (index, element) { 
                         total += element.pengeluaran                   
                            tablebody += `<tr>
                                                <td>` + (nomor += 1) + `</td>
                                                <td>` + formatDate(element.tanggal) + `</td>
                                                <td>` + element.keterangan + `</td>
                                                <td>` + convertToRupiah(element.pengeluaran) + `</td>
                                                <td>` + element.name + `</td>
                                                <td >
                                                    <a class="btn btn-primary btn-sm" id="edit_data_pg" data-id="` +
                                element.id + `"> 
                                                        <i class="fas fa-edit">Edit</i> </a>
                                                    <a  class="btn btn-danger btn-sm" data-id="`+element.id+`" id="hapus_data_pg"> 
                                                        <i class="fas fa-trash-alt">Hapus</i> </a>
                                                </td>
                                            </tr>`
                    });
                    $("#total").text(convertToRupiah(total));
                    var tbody = $("#tablebody");
                    $("#tb_pengeluaran").DataTable().destroy();
                    tbody.html(tablebody);
                    $("#tb_pengeluaran").DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "autoWidth": false,
                        "buttons": ["pdf", "print", "colvis"],
                    }).buttons().container().appendTo('#tb_pengeluaran_wrapper .col-md-6:eq(0)');
                    $("#tb_pengeluaran").DataTable().draw();

                }

            });
        }
    

// Tambah data
$(document).ready(function () {
    $("#simpan_pengeluaran").click(function (e) {
        e.preventDefault();
        var data = {
            'keterangan': $("#add_keterangan").val(),
            'pengeluaran': $("#add_pengeluaran").val(),
            'tanggal': $("#add_tanggal").val(),
        };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/admin/data-pengeluaran/add",
            data: data,
            dataType: "json",
            success: function (response) {
                // console.log(data);

                if (response.status == 400) {
                    $("#saveform_errList").html("");
                    $("#saveform_errList").addClass("alert alert-danger");
                    $.each(response.errors, function (key, err_value) {
                        $("#saveform_errList").append(
                            "<li>" + err_value + "</li>"
                        );
                        // console.log(err_value);
                    });
                } else {
                    $("#saveform_errList").html("");
                    $("#modal-pengeluaran-add").modal("hide");
                    //  $('#tb_pemasukan').DataTable().ajax.reload();
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Data Berhasil Di Tambah",
                        showConfirmButton: false,
                        timer: 1500,
                    });

                    $("#modal-pengeluaran-add").find("input").val("");
                    datapengeluaran();

                }   
            },
        });
    });

});

//edit modal show with get data

$(document).on("click", "#edit_data_pg", function (e) {
    e.preventDefault();
    var id_pg = $(this).data('id');
    $('#modal-pengeluaran-edit').modal('show');
   
    $.ajax({
        type: "GET",
        url: "/admin/data-pengeluaran/edit/"+id_pg,
        success: function (response) {
            //  console.log(response); 
            if (response.status == 404) {
                        $('#fails_message').html("");
                        $('#fails_message').addClass("alert alert-danger");
                        $('#fails_message').text(response.message);
            }else{
                    $('#edit_pg_id').val(response.data_edit.id);
                    $('#keterangan_edit').val(response.data_edit.keterangan);
                    $('#pengeluaran_edit').val(convertToRupiah(response.data_edit.pengeluaran));
                    $('#tanggal_edit').val(formatDate(response.data_edit.tanggal));
            }
        }
    });
});


// update data edit

$(document).on("click", "#edit_pengeluaran", function (e) {
    e.preventDefault();
    $(this).text("Updating");
    var id_pg = $('#edit_pg_id').val();
    var data = {
            'keterangan' : $('#keterangan_edit').val(),
            'pengeluaran': $('#pengeluaran_edit').val(),
            'tanggal':  $('#tanggal_edit').val(),
    } 
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
    $.ajax({
        type: "PUT",
        url: "/admin/data-pengeluaran/update/"+ id_pg,
        data: data,
        dataType: "json",
        success: function (response) {
            // console.log(response);
            if(response.status == 400 ){
                 $("#updateform_errList").html("");
                 $("#updateform_errList").addClass("alert alert-danger");
                 $.each(response.errors, function (key, err_value) {
                     $("#updateform_errList").append(
                         "<li>" + err_value + "</li>"
                     );
                     // console.log(response.errors);
                 });
            }else if(response.status == 404 )
            {
                $("#fails_message").html("");
                $("#fails_message").addClass("alert alert-danger");
                $("#fails_message").text(response.message);
                $("#edit_pengeluaran").text("Update");
            }else{
                $("#modal-pengeluaran-edit").modal("hide");
                //  $('#tb_pemasukan').DataTable().ajax.reload();
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Edit Data Berhasil",
                    showConfirmButton: false,
                    timer: 1500,
                });
                $("#updateform_errList").html("");
                $("#updateform_errList").removeClass("alert alert-danger");
                $("#modal-pengeluaran-edit").find("input").val("");
                $("#edit_pengeluaran").text("Update");
                datapengeluaran();
            }

            
        }
    });
});

// delete data

$(document).on("click", "#hapus_data_pg", function (e) {
e.preventDefault();
var id_hps = $(this).data("id");
       $.ajaxSetup({
           headers: {
               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
           },
       });
Swal.fire({
            title: "Menghapus Data ?",
            text: "Yakin ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Hapus Data",
        }).then((result) => {
            if (result.isConfirmed) {
                   $.ajax({
                       type: "DELETE",
                       url: "/admin/data-pengeluaran/delete/" + id_hps,
                       success: function (response) {
                           if (response.status == 200) {
                               Swal.fire(
                                   "Terhaus !",
                                   "Data Berhasil Di Hapus",
                                   "success"
                               );
                               datapengeluaran();
                           }
                       },
                   });
            }
        });
         
});