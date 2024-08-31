<?php
include("func.php");

$name = $_POST["name"];
$email = $_POST["email"];
$postcode = $_POST["postcode"];
$address = $_POST["address"];
$occupation = $_POST["occupation"];
$exp = $_POST["exp"];
$info = $_POST["info"];
$comments = $_POST["comments"];
$purpose = "";
$field = "";
$interest = ""; 
if (isset($_POST['purpose']) && is_array($_POST['purpose'])) {
    $purpose = implode("|", $_POST["purpose"]);
}
if (isset($_POST['field']) && is_array($_POST['field'])) {
    $field = implode("|", $_POST["field"]);
}
if (isset($_POST['interest']) && is_array($_POST['interest'])) {
    $interest = implode("|", $_POST["interest"]);
}


$str = $name.",".$email.",".$postcode.",".$address.",".$occupation.",".$exp.",".$info.",".$comments.",".$purpose.",".$field.",".$interest;
$file = fopen("data/result.csv","a");
fwrite($file, $str."\n");
fclose($file);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
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
                <md-icon-button href="./read.php" target="_self">
                <md-icon>analytics</md-icon>
                </md-icon-button>
            </div>
        </div>

        <div class="content">
            <div class="div-material-out" style="flex-grow:3;">
                <div class="div-material">
                    <form action="write_confirm.php" method="post" id="survey">
                        <h1 class="md-typescale-headline-medium">
                        アンケート回答は送信されました。
                        </h1>
                        <p>
                        
                        </p>
                        <p>1. ご氏名をを教えてください*</p>
                        <md-filled-text-field label="ご氏名" required readonly name="name" value = "<?= h($name) ?>" ></md-filled-text-field>
                        
                        <p>2. ご連絡先メールアドレスを教えてください。*</p>
                        <md-filled-text-field label="メールアドレス" required name="email" placeholder="email@domain.com" pattern="[\w\d-]+" readonly value = "<?= h($email) ?>" ></md-filled-text-field>
                        <p>3. ご住所を教えてください。*</p>
                        <md-filled-text-field label="郵便番号" required prefix-text="〒" name="postcode" maxlength="7" supporting-text="ハイフン (-)なしの7桁の郵便番号をご入力ください。" readonly value = "<?= h($postcode) ?>" ></md-filled-text-field>
                        <br>
                        <md-filled-text-field label="ご住所" required name="address" type="textarea" style="width=400px;resize: none;" rows="3" cols="50" readonly value= "<?= h($address) ?>" ></md-filled-text-field>
                        <p>4. 現在の職業を教えてください。*</p>
                        <md-filled-text-field label="" required readonly name="occupation" value = "<?= h($occupation) ?>" ></md-filled-text-field>
                        

                        <p>5. ドローンの操作経験はありますか？*</p>
                        <md-filled-text-field label="" required readonly name="exp" value = "<?= h($exp) ?>" ></md-filled-text-field>

                        <p>6. デモ会に参加する目的を教えてください。（複数選択可）</p>
                        <md-filled-text-field label="" required readonly name="purpose" type="textarea" style="width=400px;resize: none;" rows="3" cols="50" value = "<?= str_replace("|", PHP_EOL,h($purpose) )?>" ></md-filled-text-field>

                        <p>7. どのような分野でドローンを活用していますか？または、活用したいと考えていますか？</p>
                        <md-filled-text-field label="" required readonly name="field" type="textarea" style="width=400px;resize: none;" rows="3" cols="50" value = "<?= str_replace("|", PHP_EOL,h($field) )?>" ></md-filled-text-field>

                        <p>8. デモ会で特に興味があるプログラムを教えてください。（複数選択可）</p>
                        <md-filled-text-field label="" required readonly name="interest" type="textarea" style="width=400px;resize: none;" rows="3" cols="50" value = "<?= str_replace("|", PHP_EOL,h($interest) )?>" ></md-filled-text-field>

                        <p>9. ドローンに関する今後のイベントやセミナーの情報を受け取りたいですか？*</p>
                        <md-filled-text-field label="" required readonly name="info" value = "<?= h($info) ?>" ></md-filled-text-field>

                        <p>10. 何かご意見やご要望があれば教えてください。</p>
                        <md-filled-text-field label="ご意見・ご要望"  name="address" type="textarea" style="resize: none;" rows="6" cols="100" value= "<?= h($comments) ?>" readonly></md-filled-text-field>
                        <br><br>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
<!--
お名前：<?= h($name) ?><br>
<?= h($email) ?><br>
<?= h($postcode) ?><br>
<?= h($address) ?><br>
<?= h($occupation)?><br>
<?= h($exp)?><br>
<?= h($info)?><br>
<?= h($comments)?><br>
<?= h($purpose)?><br>
<?= h($field)?><br>
<?= h($interest)?>
    -->

</body>
</html>