
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
$(document).ready(function () {
    datarekap();
});

function datarekap(){
    var tablebody = "";
    $.ajax({
        type: "GET",
        url: "/admin/data-rekap",
        dataType: "json",
        success: function (response) {
            var nomor = 0 ; 
            var total_pm = 0 ; 
            var total_pg = 0 ;
            // console.log(response);
            $.each(response.rekap, function (index, element) { 
                 total_pm += element.pemasukan       
                 total_pg += element.pengeluaran 
                 if(element.jenis == 'masuk'){
                    tablebody += `<tr>
                                                <td>` + (nomor += 1) + `</td>
                                                <td>` + formatDate(element.tanggal) + `</td>
                                                <td>` + element.keterangan + `</td>
                                                <td>` + convertToRupiah(element.pemasukan) + `</td>
                                                <td > - </td>
                                            </tr>`
                 }else if(element.jenis == 'keluar'){
                        tablebody += `<tr>
                                                <td>` + (nomor += 1) + `</td>
                                                <td>` + formatDate(element.tanggal) + `</td>
                                                <td>` + element.keterangan + `</td>
                                                <td> - </td>
                                                <td >`+ convertToRupiah(element.pengeluaran) +`</td>
                                            </tr>`
                 }          
                            
                    });
                    // $("#pemasukan").text(convertToRupiah(total_pm));
                    $('')
                    var tbody = $("#tablebody");
                    $("#rekap").DataTable().destroy();
                    tbody.html(tablebody);
                        $("#rekap").DataTable({
                            "responsive": true, "lengthChange": true, "autoWidth": false,
                            "buttons": ["colvis"]
                        }).buttons().container().appendTo('#rekap_wrapper .col-md-6:eq(0)');
                       $("#rekap").DataTable().draw(); 
           
        }
    });
}