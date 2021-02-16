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
    