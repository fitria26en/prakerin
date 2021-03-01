<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TrackingCovid </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <!-- Fonts -->
        <!-- Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400i|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        
        <!-- CSS -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        

        <link rel="stylesheet" href="{{asset('infinity/css/themefisher-fonts.css')}}">
        <link rel="stylesheet" href="{{asset('infinity/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('infinity/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('infinity/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('infinity/css/style.css')}}">
        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="{{asset('infinity/css/responsive.css')}}">
    </head>
    
    <body id="body">

    	<div id="preloader">
    		<div class="book">
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		</div>
    	</div>

	    <!-- 
	    Header start
	    ==================== -->
        
	    <section class="hero-area bg-1">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-7">
	                    <div class="block">
	                        <h1 class="wow fadeInDown" data-wow-delay="0.3s" data-wow-duration=".2s">Kawal Corona</h1>
	                        <div class="wow fadeInDown" data-wow-delay="0.7s" data-wow-duration=".7s">
	                        	<a class="btn btn-home" href="#about" role="button">Get More Info</a>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-5 wow zoomIn">
	                    <div class="block">
	                        <div class="counter text-center">
	                            <ul id="countdown_dashboard">
	                                <li>
	                                    <div class="dash days_dash">
                                        @csrf
                                        <div><h2 > {{$positif}} </h2></div>
	                                        <span class="dash_title">Positive</span>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="dash hours_dash">
                                        <div><h2 > {{$sembuh}} </h2></div>
	                                        <span class="dash_title">Sembuh</span>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="dash minutes_dash">
                                        <div><h2 > {{$meninggal}} </h2></div>
	                                        <span class="dash_title">Meninggal</span>
	                                    </div>
	                                </li>
	                                <!-- <li>
	                                    <div class="dash seconds_dash">
                                        <div><p>positif: {{$positif}} 
                                            sembuh:{{$sembuh}} 
                                            meninggal:{{$meninggal}} </p></div>
	                                        <span class="dash_title">Indonesia</span>
	                                    </div>
	                                </li> -->
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div><!-- .row close -->
	        </div><!-- .container close -->
	    </section><!-- header close -->



        <!-- 
        About start
        ==================== -->
        
        <section  class="section about bg-gray" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 wow fadeInLeft">
                        <div class="content">
                        	<div class="sub-heading">
                                 </tbody>
                                 </table>
                                 </tbody>
                                 </table>
                          </div>
                   </div>
                   <?php
        $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
        $positif = json_decode($datapositif, TRUE);
        $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
        $sembuh = json_decode($datasembuh, TRUE);
        $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
        $meninggal = json_decode($datameninggal, TRUE);
        $dataid = file_get_contents("https://api.kawalcorona.com/indonesia");
        $id = json_decode($dataid, TRUE);
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);
        
    ?>


          <div class="card-header ">
                    <h3 class="card-title">Data Kasus Corona virus Global</h3>
                    </div>
                     <div class="card-body" >
                         <div style="height:600px;overflow:auto;margin-right:15px;">
                                 <table class="table table-striped"  fixed-header  >
                                 <thead>
                                     <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Negara</th>
                                     <th scope="col">Positif</th>
                                     <th scope="col">Sembuh</th>
                                     <th scope="col">Meninggal</th>
                                     </tr>
                                 </thead>
                                 <tbody>
             
                                 @php
                                     $no = 1;    
                                 @endphp
                                 <?php
                                     for ($i= 0; $i <= 191; $i++){
             
                                     
                                     ?>
                                 <tr>
                                     <td> <?php echo $i+1 ?></td>
                                     <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
                                     <td> <?php echo $dunia[$i]['attributes']['Confirmed'] ?></td>
                                     <td><?php echo $dunia[$i]['attributes']['Recovered']?></td>
                                     <td><?php echo $dunia[$i]['attributes']['Deaths']?></td>
                                 </tr>
                                     <?php 
                                 
                                 } ?>
                                 </tbody>
                                 </table>
                                 </tbody>
                                 </table>
                          </div>
                   </div>
    
        <br><br><br><br><br><br><br>           
          <!--table untuk tampilan provinsi=-->
          <div class="card-header ">
                    <h3 class="card-title">Data Kasus Corona virus Negara</h3>
                    </div>
                     <div class="card-body" >
                         <div style="height:600px;overflow:auto;margin-right:15px;">
                                 <table class="table table-striped"  fixed-header  >
                                 <thead>
                                     <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Provinsi</th>
                                     <th scope="col">Positif</th>
                                     <th scope="col">Sembuh</th>
                                     <th scope="col">Meninggal</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                        <tr>
                         @php $no = 1; @endphp
                     @foreach ($provinsi as $data)
                        <tr>
                           <td >{{ $no++ }}</td>
                           <td><b>{{$data->nama_provinsi}}<br>
                           <td>{{ $data->Positif }} </td>
                           <td>{{ $data->Sembuh }} </td>
                           <td>{{ $data->Meninggal }} </td>
                 
                        </tr>
                        @endforeach
                        </tbody>
                                 </table>
                                 </tbody>
                                 </table>
                          </div>
                   </div>
                   
    


                            
                        </div>
                    </div>
                  
                
            </div>
        </section><!-- #about close -->
        <!-- 
        About start
        ==================== -->
      

        <!-- 
        Service start
        ==================== -->
        <section id="service" class="service section">
            <div class="container">
                <div class="row">
                    <div class="heading wow fadeInUp">
                        <h2>Apa Itu Virus Covid19(Korona)?</h2>
                        <p>Mengenali Apa Itu Korona Dan Bagaimana menanggulangi wabah Virus ini</p>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft">
                        <div class="block">
                            <i class="tf-strategy"></i>   
                            <h3>Apa Itu Virus Corona?</h3>
                            <p>Virus Corona merupakan zoonosis, artinya ditularkan antara hewan dan manusia
                            menurut penyelidikan yang telah dilakukan, SARS-CoV ditularkan dari kucing luwak atau yang lebih
                            dikenal dengan musang ke manusia dan MERS-CoV dari unta ke manusia. Namun beberapa Virus Coronajuga dikenal pada hewan hean yang sebelunya
                            belum pernah menginfeksi manusia.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="block">
                            <i class="tf-circle-compass"></i>
                        	<h3>Ciri-Ciri Terinfeksi Virus Corona </h3>
                            <p>Gejala infeksi virus Corona sendiri cukup sulit dilihat pada awalnya. Hal ini dikarenakan
                            tidak semua orang yang sudah terinfeksi akan langsung memperlihatkan gejala gejala awal dari virus
                            Corona. Dibutuhkan @hingga 14 hari sampai orang yang sudah terinfeksi tersebut mengeluarkan tanda atau ciri-ciri virus Corona</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="block">
                            <i class="tf-anchor2"></i>
                            <h3>Cara Mencegah Virus Corona</h3>
                            <p>Menjaga kesehatan dan kebersihan dengan cara:<br>
                            Mencuci tangan secara teratur menggunakan sabun <br>
                            Menutup mulut dan hidung ketika batuk atau bersin<br>
                            Memasak daging atau telur hingga matang<br>
                            Hindari kontak langsung dengan siapapun yang menunjukan gejala virus corona</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.9s">
                        <div class="block">
                            <i class="tf-globe"></i>
                            
                            <h3>Gejala Virus Corona Pada Hari Ke Hari</h3>
                            <p>Hari 1:Pasien mengalami gejala berupa demam <br>Hari 5:pasien mengalami gejala berupa kesulitan bernafas
                            <br>Hari 7:Pasien mengalami gejala berupa kondisi yang semakin memburuk <br>
                            Hari 8:Pasien dengan kasus yang parah akan mengalami gejala berupa gangguan pernafasan akut.
                            <br>Hari 10:pasien mengalami gejala sakit perut dan kehilangan nafsu makan hanya sebagian kecil yang mati
                            <br>Hari 17:Rata-rata orang yang sudah sembuh dari gejala virus Corona akan diperbolehkan pulang dari rumah sakit
                            setelah dua setengah minggu.</p>
                        </div>
                    </div>
                    <<div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="block">
                            <i class="tf-circle-compass"></i>
                            <h3>Ciri-Ciri Terinfeksi Corona Dengan Tingkat Yang Lebih Tinggi</h3>
                            <p>1.Sulit bernafas atau nafas pendek <br> 2.Nyeri atau sakit pada bagian dada<br>
                            3.Pusing atau tidak mampu berdiri dan menggerakan tubuh <br> 4.Bibir atau wajah tampak membiru</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="block">
                            <i class="tf-anchor2"></i>
                        
                        	<h3>Ciri-Ciri Terinfeksi Virus Corona Dengan Tingkat Yang Lebih Rendah</h3>
                            <p>1.demam <br> 2.batuk <br> 3.sesak nafas</p>
                        </div>
                    </div>
                
                </div>
            </div><!-- .container close -->
        </section><!-- #service close -->


        <!-- 
        Contact start
        ==================== -->
       
        <section clas="wow fadeInUp">
        	<div class="map-wrapper">
        	</div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <p>Copyright &copy; <a href="http://www.Themefisher.com">Fitri Andriani</a>| Smk Assalaam Bandung.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Js -->
        <script src="{{asset('infinity/js/vendor/jquery-2.1.1.min.js')}}"></script>
        <script src="{{asset('infinity/https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js')}}" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
        <script src="{{asset('infinity/https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js')}}" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
        <script src="{{asset('infinity/js/vendor/modernizr-2.6.2.min.js')}}"></script>
        <script src="{{asset('infinity/js/jquery.lwtCountdown-1.0.js')}}"></script>
        <script src="{{asset('infinity/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('infinity/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('infinity/js/jquery.form.js')}}"></script>
        <script src="{{asset('infinity/js/jquery.nav.js')}}"></script>
        <script src="{{asset('infinity/js/wow.min.js')}}"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script> -->
        <script src="{{asset('infinity/js/main.js')}}"></script>
        
    </body>
</html>
