<?php
    include("func.php");
    $file = fopen("data/result.csv","r");
    $options_occupation = ["経営者","会社員","パート・アルバイト","公務員","教職員","自営業・自由業","定年退職","その他"];
    $options_exp = ["ない","少しある","かなりある"];
    $options_info = ["受け取る","受け取らない"];
    $options_purpose = ["ドローンの操作を学びたい","最新の技術を体験したい","同業者との交流を深めたい","その他"];
    $options_field = ["建設業","農業","映像制作","調査・点検","趣味"];
    $options_interest = ["操作体験コーナー","技術説明セミナー","最新機種の展示","質疑応答・ディスカッション"];
    $data = [];
    if ($file) {
        while (($row = fgetcsv($file,1000,",")) !== false) {
            $data[] = $row;
        }
        fclose($file);
    }

    $count_occupation = countOptions($options_occupation,array_column($data, 4));
    $count_exp = countOptions($options_exp,array_column($data, 5));
    $count_info = countOptions($options_info,array_column($data, 6));
    $count_purpose = countOptions($options_purpose,array_column($data,8));
    $count_field = countOptions($options_field, array_column($data,9));
    $count_interest = countOptions($options_interest,array_column($data,10));

    $colors = ["#F44336","#2196F3","#009688","#FFEB3B","#FF5722","#795548","#673AB7","#00BCD4","#FF9800","#8BC34A"]

    
    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="importmap">
      {
        "imports": {
          "@material/web/": "https://esm.run/@material/web/"
        }
      }
    </script>
    <script type="module">
      import '@material/web/all.js';
      import {styles as typescaleStyles} from '@material/web/typography/md-typescale-styles.js';
  
      document.adoptedStyleSheets.push(typescaleStyles.styleSheet);
    </script>
    <title>アンケート</title>
</head>
<body>
    <div class="window">
        <div class="banner" style="box-sizing: border-box;">
            <div class="banner_name" style="flex-grow:1;">
                <h1 class="poppins-medium">
                        
                        G's Anquête 
                </h1>
            </div>

            <div class="banner_button">
                <md-icon-button href="./write.php" target="_self">
                <md-icon>edit_note</md-icon>
                </md-icon-button>
            </div>
        </div>

        <div class="content">
            <div class="div-material-out" style="flex-grow:3;">
                <div class="div-material" style="flex-direction: column;">
                    <h1 class="md-typescale-headline-medium">
                       ドローンデモ会 参加アンケート アンケート結果
                    </h1>
                    <p>3. ご住所を教えてください。*</p>
                    <div id="chartdiv"></div>
                    <p>4. 現在の職業を教えてください。*</p>
                    <div class="canvas-container">
                        <canvas id="OccupationChart"></canvas>
                    </div>
                    
                    <p>5. ドローンの操作経験はありますか？*</p>
                    <div class="canvas-container">
                    <canvas id="ExperienceChart"></canvas>
                    </div>
                    <p>6. デモ会に参加する目的を教えてください。（複数選択可）</p>
                    
                    <div class="canvas-container">
                    <canvas id="PurposeChart"></canvas>
                    </div>
                    <p>7. どのような分野でドローンを活用していますか？または、活用したいと考えていますか？</p>
                    <div class="canvas-container">
                    <canvas id="FieldChart"></canvas>
                    </div>
                    <p>8. デモ会で特に興味があるプログラムを教えてください。（複数選択可）</p>
                    <div class="canvas-container">
                    <canvas id="InterestChart"></canvas>
                    </div>
                    <p>9. ドローンに関する今後のイベントやセミナーの情報を受け取りたいですか？*</p>
                    <div class="canvas-container">
                    <canvas id="InfoChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script>
    function PieChart(chartid,options,counts) {
        var ctx = document.getElementById(chartid);
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: options,
            datasets: [{
                backgroundColor: <?php echo json_encode($colors); ?>,
                data: counts
            }]
            },
            options: {
            title: {
                display: true,
                text: ''
            }
            }
        });
    };
    function BarChart(chartid,options,counts) {
        var ctx = document.getElementById(chartid);
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: options,
            datasets: [
                {
                label: '',
                data: counts,
                backgroundColor: <?php echo json_encode($colors); ?>
                },
            ]
            },
            options: {
                legend: {
                    display: false
                },
            title: {
                display: true,
                text: ''
            },
            scales: {
                yAxes: [{
                ticks: {
                    //suggestedMax: 100,
                    //suggestedMin: 0,
                    //stepSize: 10,
                    callback: function(value, index, values){
                    return  value
                    }
                }
                }]
            },
            }
        });
    }
    PieChart("OccupationChart",<?php echo json_encode($options_occupation); ?>,<?php echo json_encode($count_occupation); ?>);
    PieChart("ExperienceChart",<?php echo json_encode($options_exp); ?>,<?php echo json_encode($count_exp); ?>);
    BarChart("PurposeChart",<?php echo json_encode($options_purpose); ?>,<?php echo json_encode($count_purpose); ?>);
    BarChart("FieldChart",<?php echo json_encode($options_field); ?>,<?php echo json_encode($count_field); ?>);
    BarChart("InterestChart",<?php echo json_encode($options_interest); ?>,<?php echo json_encode($count_interest); ?>);
    PieChart("InfoChart",<?php echo json_encode($options_info); ?>,<?php echo json_encode($count_info); ?>);
</script>

</html>