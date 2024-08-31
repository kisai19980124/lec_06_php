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
                            ドローンデモ会 参加アンケート
                        </h1>
                        <p>
                        この度はドローンデモ会にご関心をお寄せいただき、ありがとうございます。
                        <br>本アンケートは、皆様のご意見やご要望を把握し、より充実したイベントを開催するためにご協力をお願いしております。<br>アンケートのご回答にかかる時間は約5分です。
                        </p>
                        <p>1. ご氏名をを教えてください*</p>
                        <md-filled-text-field label="ご氏名" required name="name"></md-filled-text-field>
                        
                        <p>2. ご連絡先メールアドレスを教えてください。*</p>
                        <md-filled-text-field label="メールアドレス" required name="email" placeholder="email@domain.com" pattern="[\w-]+"></md-filled-text-field>
                        <p>3. ご住所を教えてください。*</p>
                        <md-filled-text-field label="郵便番号" required prefix-text="〒" name="postcode" maxlength="7" supporting-text="ハイフン (-)なしの7桁の郵便番号をご入力ください。"></md-filled-text-field>
                        <br>
                        <md-filled-text-field label="ご住所" required name="address" type="textarea" style="width=400px;resize: none;" rows="3" cols="50"></md-filled-text-field>
                        <p>4. 現在の職業を教えてください。*</p>
                        <md-filled-select label="職業" required name="occupation">
                            <md-select-option value="経営者">
                                <div slot="headline">経営者</div>
                            </md-select-option>
                            <md-select-option value="会社員">
                                <div slot="headline">会社員</div>
                            </md-select-option>
                            <md-select-option value="パート・アルバイト">
                                <div slot="headline">パート・アルバイト</div>
                            </md-select-option>
                            <md-select-option value="公務員">
                                <div slot="headline">公務員</div>
                            </md-select-option>
                            <md-select-option value="教職員">
                                <div slot="headline">教職員</div>
                            </md-select-option>
                            <md-select-option value="自営業・自由業">
                                <div slot="headline">自営業・自由業</div>
                            </md-select-option>
                            <md-select-option value="定年退職">
                                <div slot="headline">定年退職</div>
                            </md-select-option>
                            <md-select-option value="その他">
                                <div slot="headline">その他</div>
                            </md-select-option>
                        </md-filled-select>

                        <p>5. ドローンの操作経験はありますか？*</p>
                        <p><md-radio id="no" name="exp" value="ない" required></md-radio>
                        <label for="no">ない</label></p>
                        <p><md-radio id="little" name="exp" value="少しある" required></md-radio>
                        <label for="little">少しある</label></p>
                        <p><md-radio id="lot" name="exp" value="かなりある" required></md-radio>
                        <label for="lot">かなりある</label></p>

                        <p>6. デモ会に参加する目的を教えてください。（複数選択可）</p>
                        <p><md-checkbox id="sousa" touch-target="wrapper" name="purpose[]" value="ドローンの操作を学びたい"></md-checkbox>
                        <label for="sousa">ドローンの操作を学びたい</label></p>
                        <p><md-checkbox id="gijutsu" touch-target="wrapper" name="purpose[]" value="最新の技術を体験したい"></md-checkbox>
                        <label for="gijutsu">最新の技術を体験したい</label></p>
                        <p><md-checkbox id="kouryu" touch-target="wrapper" name="purpose[]" value="同業者との交流を深めたい"></md-checkbox>
                        <label for="kouryu">同業者との交流を深めたい</label></p>
                        <p><md-checkbox id="others" touch-target="wrapper" name="purpose[]" value="その他"></md-checkbox>
                        <label for="others">その他</label></p>

                        <p>7. どのような分野でドローンを活用していますか？または、活用したいと考えていますか？</p>
                        <p><md-checkbox id="建設業" touch-target="wrapper" name="field[]" value="建設業"></md-checkbox>
                        <label for="建設業">建設業</label></p>
                        <p><md-checkbox id="農業" touch-target="wrapper" name="field[]" value="農業"></md-checkbox>
                        <label for="農業">農業</label></p>
                        <p><md-checkbox id="映像制作" touch-target="wrapper" name="field[]" value="映像制作"></md-checkbox>
                        <label for="映像制作">映像制作</label></p>
                        <p><md-checkbox id="調査・点検" touch-target="wrapper" name="field[]" value="調査・点検"></md-checkbox>
                        <label for="調査・点検">調査・点検</label></p>
                        <p><md-checkbox id="趣味" touch-target="wrapper" name="field[]" value="趣味"></md-checkbox>
                        <label for="趣味">趣味</label></p>

                        <p>8. デモ会で特に興味があるプログラムを教えてください。（複数選択可）</p>
                        <p><md-checkbox id="操作体験コーナー" touch-target="wrapper" name="interest[]" value="操作体験コーナー"></md-checkbox>
                        <label for="操作体験コーナー">操作体験コーナー</label></p>
                        <p><md-checkbox id="技術説明セミナー" touch-target="wrapper" name="interest[]" value="技術説明セミナー"></md-checkbox>
                        <label for="技術説明セミナー">技術説明セミナー</label></p>
                        <p><md-checkbox id="最新機種の展示" touch-target="wrapper" name="interest[]" value="最新機種の展示"></md-checkbox>
                        <label for="最新機種の展示">最新機種の展示</label></p>
                        <p><md-checkbox id="質疑応答・ディスカッション" touch-target="wrapper" name="interest[]" value="質疑応答・ディスカッション"></md-checkbox>
                        <label for="質疑応答・ディスカッション">質疑応答・ディスカッション</label></p>

                        <p>9. ドローンに関する今後のイベントやセミナーの情報を受け取りたいですか？*</p>
                        <p><md-radio id="受け取る" name="info" value="受け取る" required></md-radio>
                        <label for="受け取る">受け取る</label></p>
                        <p><md-radio id="受け取らない" name="info" value="受け取らない" required></md-radio>
                        <label for="受け取らない">受け取らない</label></p>
                        <p>10. 何かご意見やご要望があれば教えてください。</p>
                        <md-filled-text-field label="ご意見・ご要望"  name="comments" type="textarea" style="resize: none;" rows="6" cols="100"></md-filled-text-field>
                        <p>
                            
                            <md-filled-tonal-button form="survey" value="save" type="submit">                                
                            送信
                            <svg slot="icon" viewBox="0 0 48 48"><path d="M6 40V8l38 16Zm3-4.65L36.2 24 9 12.5v8.4L21.1 24 9 27Zm0 0V12.5 27Z"/></svg>
                            </md-filled-tonal-button>
                            <md-text-button value="reset" type="reset">リセット</md-text-button>
                        </p>
                        <br>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
</body>
</html>