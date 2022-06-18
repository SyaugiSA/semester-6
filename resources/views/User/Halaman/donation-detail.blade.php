@extends('User.web')


@section('head')
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/FeLaznas/multiStep.css') }}">
    <script src="{{ asset('js/FeLaznas/multiStep.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <section>
        
            
       
        <div class="container">
            @foreach ($data as $d )
                
          
            <div class="foto-donasi">

                <img src="{{ '/storage/'. $d->gambar }}" alt="">
            </div>
            <h2 class="title-detail-donation">{{ $d->judul }} </h2>
            <p>Dibutuhkan @currency($d->jumlah)</p>
            
                
            <p> Terkumpul @currency($d->pemasukan)</p>
          
            <div class="progress-donation-detail">
                <div class="progress-donation-done-detail" data-done-detail="" style="width:{{$d->total}}%; opacity: 1;  " id="text">{{$d->total}} %</div>
            </div>

            <p> {{ $d->deskripsi }}</p>

           
        </div>
        
    </section>


    <section>
        <div class="container">

            <h2 id="heading">Donasi</h2>
            <p>Isi semua form dan ikuti langkahnya</p>

            <form id="msform" action="{{ route('donate.store') }}" method="POST" enctype="multipart/form-data">
                <!-- progressbar -->
                {{-- {{ csrf_field() }} --}}
                @csrf
                <input type="hidden" id="donate" name="donate" value="{{ $d->id }}">
    @endforeach
                <ul id="progressbar">
                    <li class="active" id="account"><strong>Pilih Rek Tujuan</strong></li>

                    <li id="payment"><strong>Upload Bukti Transfer</strong></li>
                    <li id="confirm"><strong>Finish</strong></li>
                </ul>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <br>
                <!-- fieldsets -->
                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Account Information:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 1 - 3</h2>
                            </div>
                        </div>
                        <label class="fieldlabels">Email:</label>
                        <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" disabled />
                        <label class="fieldlabels">Nama Donatur: *</label>
                        <input type="text" id="name_donatur" name="uname" placeholder="Nama Donatur"
                            value="{{ $user->name }}" disabled />
                        <label class="fieldlabels">Jumlah Donasi: *</label>
                        <input type="text" class="@error('jumlah') is-invalid @enderror" id="jumlah_donasi" name="jumlah"
                            placeholder="Jumlah" required />
                        @error('jumlah')
                            <div class=" invalid-feedback">{{ $message }}
                            </div>
                        @enderror
                        <p id="alert_jumlah"></p>

                        <div class="checkbox-card">
                            <input type="checkbox" name="" id="check">
                            <label for="">Sembunyikan nama / hamba allah</label>
                        </div>

                        <label class="fieldlabels mb-2" id="text-selected">Pilih Rekening : lihat nomor rekening tujuan
                            transfer </label> <br>
                        <select name="" id="selectBank">
                            <option>--Pilih Rekening--</option>
                            <option value="Bri" class="fieldlabels">BANK BRI</option>
                            <option value="Bca" class="fieldlabels">BANK BCA</option>
                            <option value="Bni" class="fieldlabels">BANK BNI</option>
                            <option value="Mandiri" class="fieldlabels">BANK MANDIRI</option>
                        </select>

                        <div id="showBri" class="myDiv">
                            <img src="{{ asset('image/Bank Rakyat Indonesia (BRI).png') }}" /><span>0129301923091</span>
                        </div>
                        <div id="showBca" class="myDiv">
                            <img src="{{ asset('image/BCA.png') }}" /><span>00097584638</span>
                        </div>
                        <div id="showBni" class="myDiv">
                            <img src="{{ asset('image/Logo bank BNI.png') }}" /><span>123134444</span>
                        </div>
                        <div id="showMandiri" class="myDiv">
                            <img src="{{ asset('image/Mandiri_logo.png') }}" /><span>2131231</span>
                        </div>
                    </div>
                    <input type="button" name="next" id="next1" class="next action-button" value="Next" />
                </fieldset>

                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Image Upload:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 2 - 3</h2>
                            </div>
                        </div>
                        <label class="fieldlabels">Upload Bukti Transfer</label>
                        <input type="file" id="image" name="pic" accept="image/*" required>

                    </div>
                    <input type="submit" id="btn-submit" name="next" class="next action-button" value="Submit" />
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>
                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Finish:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 3 - 3</h2>
                            </div>
                        </div>
                        <br><br>
                        {{-- <button type="submit">Tes</button> --}}
                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <img src="{{ asset('image/berhasil.png') }}" id="foto-bhs" class="fit-image">
                            </div>
                        </div>
                        <br><br>
                        <div class="row justify-content-center">
                            <div class="col-7 text-center">
                                <h5 class="purple-text text-center">Data sudah diterima</h5>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </section>




    <script>
        $(document).ready(function() {
            var data = $('#name_donatur').val();

            $('input[type="checkbox"]').click(function() {
                if ($(this).is(":checked")) {
                    $('#name_donatur').val("Hamba Allah");
                } else {
                    $('#name_donatur').val(data);
                }
            });



            if ($('#jumlah_donasi').val() == '') {
                $('#next1').prop('disabled', true);
                $('#alert_jumlah').text('Isi Jumlah Donasi').css('color', 'red');

            }

            $('#jumlah_donasi').keyup(function() {

                if ($('#jumlah_donasi').val() == '') {
                    $('#next1').prop('disabled', true);
                    $('#alert_jumlah').text('Isi Jumlah Donasi').css('color', 'red');

                } else {
                    $('#next1').removeAttr('disabled');
                    $('#alert_jumlah').text('');
                }
            });

            $('#text-selected').css('color', 'red');





        });
    </script>



    <script>
        $('#btn-submit').attr('disabled', true);
        $('#image').on('change', function(){
            if($('#image').val() != ''){
                $('#btn-submit').attr('disabled', false);
            }else{
                $('#btn-submit').attr('disabled', true);
            }
     });
         
    </script>



    <script type="text/javascript">
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
        $("#btn-submit").click(function(e) {



            if ($('#jumlah_donasi').val() != '' && $('#donate').val() != '') {


                e.preventDefault();
                var jumlah = $("#jumlah_donasi").val();
                var pic = $("#image")[0];
                var donate = $("#donate").val();
                let formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('jumlah', jumlah);
                formData.append('pic', pic.files[0]);
                formData.append('donate', donate);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('donate.store') }}",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        // alert(data.success);

                    },
                    error: function(e) {
                        console.log(e.responseJSON.message);
                    }

                });


            }

        });
    </script>



    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>

    {{-- <script>
        const progress = document.querySelector('.progress-donation-done-detail');
        let text = progress.getAttribute('data-done-detail');
        document.getElementById("text").innerHTML = text + '%';

        setTimeout(() => {

            progress.style.opacity = 1;
            progress.style.width = progress.getAttribute('data-done-detail') + '%';
        }, 500);
    </script> --}}

    <script src="{{ asset('js/FeLaznas/formatRp.js') }}"></script>
@endsection
