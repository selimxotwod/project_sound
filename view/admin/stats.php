<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Statistiques</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <div class="left-admin">
        <h1>TABLEAU DE BORD</h1>
        <a href="../?a=home"><h2>Accéder au site</h2></a>
        <ul>
            <a href="?a=list"><li><img src="../assets/img/text-lines.png">COMMENTAIRES</li></a>
            <a href="?a=stats"><li><img src="../assets/img/diagram.png">STATISTIQUES</li></a>
            <div class="mini-bar-stats"></div>
        </ul>
    </div>
    <div class="right-admin">
        <div class="container-admin">

            <?php
            //Calculs
            $pourcSharer = 100 * $dataSharer->count / $data->count;

            $pourcSigneur = 100 * $data->count / $dataAllSeeForm->total_see_form;

            $signePas =  $dataAllSeeForm->total_see_form - $data->count;

            $pasAnim = $countVisitor->total - $dataAllDown->total_down;

            $animSansPetition = $dataAllDown->total_down - $dataAllSeeForm->total_see_form;
            ?>

            <h3>Statistique</h3>

            <h4>ANALYSE</h4>
            <div class="bar"></div>

            <div id="piechart" style="width: 900px; height: 500px;"></div>
            <p><span class="pourc"><?=$pourcSharer?>%</span> des signataires partagent la pétition.</p>

            <h4>PARRAINS</h4>
            <div class="bar"></div>

            <div id="chart_div"></div>
            <div id="top_x_div"></div>

            <div class="clear"></div>

            <h4>SIGNATAIRE</h4>
            <div class="bar"></div>

                <table class="signataire">
                    <tr>
                        <th class="nom">NOM</th>
                        <th class="prenom">PRENOM</th>
                        <th class="mail">MAIL</th>
                    </tr>
                    <?php foreach($dataAll as $pageAll):?>
                        <tr>
                            <td><?=$pageAll->nom?></td>
                            <td><?=$pageAll->prenom?></td>
                            <td><?=$pageAll->mail?></td>
                        </tr>
                    <?php endforeach;?>
                </table>
        </div>
        <script type="text/javascript">

         google.charts.load('current', {'packages':['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);
         google.charts.setOnLoadCallback(drawBasic);
         google.charts.setOnLoadCallback(drawStuff);

          function drawChart() {


            var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Signe la pétition',     <?=$data->count?>],
            ['Ne signe pas la pétition',    <?=$signePas?> ],
            ['Ne visualise pas l\'animation' ,    <?=$pasAnim?>],
            ['Visualise l\'animation sans aller sur la pétition' ,   <?=$animSansPetition?>]
            ]);

            var options = {
                title: 'Sur les <?=$countVisitor->total?>  personnes ayant visité le site',
                colors: ['#080c32','#0D1751' , '#19266C', '#2B3A8E']
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }


         function drawBasic() {

             var data = google.visualization.arrayToDataTable([
                 ['City', 'Nombres de filleuls',],
                 <?php foreach($dataBestParrain as $page):?>
                 ['<?=$page->nom?>', <?=$page->nbr_neveu?>],
                 <?php endforeach;?>
             ]);

             var options = {
                 title: 'Les 3 meilleurs parrain',
                 colors: ['#19266C'],
                 chartArea: {width: '50%'},
                 hAxis: {
                     title: 'Total filleul',
                     minValue: 0
                 },
                 vAxis: {
                     title: 'Meilleurs parrain'
                 }

             };

             var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

             chart.draw(data, options);
         }


         function drawStuff() {
             var data = new google.visualization.arrayToDataTable([
                 ['', 'Nombre de parrains'],
                 ["-5 de filleuls", <?=$dataLessFive->count?> ],
                 ["+5 filleuls", <?=$dataFive->count?> ],
                 ["+10 filleuls", <?=$dataTen->count?> ],
                 ["+15 filleuls", <?=$dataFifteen->count?> ]
             ]);

             var options = {
                 title: 'Parrains',
                 colors: ['#2B3A8E'],
                 width: 300,
                 height: 300,
                 legend: { position: 'none' },
                 axes: {
                     x: {
                         0: { side: 'bottom'}
                     }
                 },
                 bar: { groupWidth: "20%" }
             };

             var chart = new google.charts.Bar(document.getElementById('top_x_div'));
             chart.draw(data, google.charts.Bar.convertOptions(options));
         };


        </script>
    </div>
</body>
</html>