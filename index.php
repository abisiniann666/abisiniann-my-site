<?php 
require_once('functions.php');
//データベースにログインする　および　テーブルの内容を　$rowsにいれている
   define('DB_DATABASE','LAA1113885-abisiniann');
   define('DB_USERNAME','LAA1113885');
   define('DB_PASSWORD','06te0066');
   define('PDO_DSN','mysql:host=mysql140.phy.lolipop.lan;dbname='. DB_DATABASE.';charset=utf8');

   try{
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   }catch(PDOExeption $e){
       echo $e->getMessage();
       exit;
   }

   

   //昔は　$inputWord = isset($_POST['todo-item']) ?  $_POST['todo-item'] :'';
   //なごみさんのお手製ファンクション
   $inputWord = safe($_POST, 'todo-item', '');

   
   //$inputWord = $_POST['todo-item'];


   //追加ボタンを押した際　サーバーに入力を保存する
   if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['add-btn']))
   {
    $stmt = $db-> prepare("insert into (comment) values(?)");
    $stmt->execute([$inputWord]);
   }



   // 削除ボタンを押した際　　　
   $id_namber = isset($_POST['check']) ? $_POST['check'] : '' ;      
   if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['delete-btn'])){

    $stmt =$db->prepare("delete from users where id= :id ");
    $stmt->execute([
     ':id' => $id_namber
     ]);
   }



   $stmt = $db->prepare("select * from users ");
   $stmt ->execute();
   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
?>










<?php require_once('header.php') ?>

<body>
    <div class="bg">
        <a href="http://abymaker.main.jp/todo/index.php"><img class="logo" src="logo_design.png"></a>
    </div>
    <div class="header">
        <div class="header_container">
            <div>
                <h1>MY SITE</h1>
            </div>
            <p>グラフィック</p>
        </div>
    </div>

    <a href="register.php" class="register_btn">作品を投稿</a>

    <div class="block_icon">
        <svg width="40" height="40">
            <circle cx="20" cy="20" r="20" fill="rgb(150,150,150)" />
            <circle cx="20" cy="20" r="19" fill="rgb(250,250,250)" />
            <rect class="rect" x="10" y="10" width="6" height="6" fill="black" />
            <rect class="rect" x="17" y="10" width="6" height="6" fill="black" />
            <rect class="rect" x="24" y="10" width="6" height="6" fill="black" />
            <rect class="rect" x="10" y="17" width="6" height="6" fill="black" />
            <rect class="rect" x="17" y="17" width="6" height="6" fill="black" />
            <rect class="rect" x="24" y="17" width="6" height="6" fill="black" />
            <rect class="rect" x="10" y="24" width="6" height="6" fill="black" />
            <rect class="rect" x="17" y="24" width="6" height="6" fill="black" />
            <rect class="rect" x="24" y="24" width="6" height="6" fill="black" />
        </svg>
    </div>



    <!-- タブボタン -->
    <div class="menu_tab">
        <a href="picture.php" class="tab_key tab_graphics_key">イラストライブラリ</a>
        <a href="" class="tab_key">制作中ボタン</a>
        <a href="" class="tab_key">制作中ボタン</a>
    </div>



    <!-- 左の項目ー -->

    <div class="contents">
        <div class="wrapper left_wrapper">

            <div class="menu_item">
                <div class="users_icon"> No image</div>
                <p class="users_name">ユーザー名</p>
            </div>

            <div class="menu_item">
                <ul>
                    <li>訪問者</li>
                    <li>いいね</li>
                    <li>登録者</li>
                    <li>閲覧履歴</li>
                </ul>
            </div>

        </div>





        <div class="wrapper center_wrapper">
            <h3>ギャラリー</h3>
            <!-- イラスト表示                        -->

            <?php


setlocale(LC_ALL, 'ja_JP.UTF-8'); //　←‐日本語表記ができるようにする関数
$i = 0;
echo "<ul>" ;
foreach(glob("images_folder/*") as $image){
   if($i >= 9){
   break;
   }
  
  echo "<li class='picture_list'>";
  echo "<div class='picture_item'>";
  echo     "<img class='image_gallery' src='$image'>";
  echo "</div>";
  echo     "<div class='image_name'>";
  echo basename($image) ."追加<br>";
  echo     "</div>";
  echo  "</li>";
        $i++;
}
echo "</ul>" ;
echo "<div class='display_more'><a href=''> &gt;&gt; さらに表示する</a></div>";

?>


            <!-- <ul class="picture_list">
                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>

                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>

                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>

                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>

                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>

                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>

                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>

                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>

                <li class="picture_item">
                    <div class="picture_smple">画像</div>
                    <p>題名</p>
                </li>
            </ul> -->






            <!--                        イラスト表示 -->
        </div>

        <div class="wrapper right_wrapper">
            <h3>ランキング</h2>

        </div>





        <div class="wrapper todo-wrapper">
            <div class="input-todo">

                <form action="index.php" method="post">
                    <input type="text" class="input-container" name="todo-item">
                    <input type="submit" name="add-btn" value="追加">
                </form>
            </div>

            <?php echo "<p> <span>new ワード</span> $inputWord<p>" ;


      // 表示されるワード
      foreach ($rows as $row){         
        echo '<form action="index.php" method="post">';
        
        //　$todo_idにはidナンバーが入る
        $todo_id = $row['id'];
        echo $todo_id.',';
        echo '<input type="hidden" name="check" value="' . $todo_id . '">';

        //　サーバーに記憶されたコメント　と　削除ボタン
        echo  $row['comment'].'<input type="submit" name="delete-btn" value="削除">';
        echo '<br>';
        echo '</form>';
      }
     
   
      ?>

        </div>
    </div>




















    <script type="text/javascript" src="index.js"></script>



    <?php require_once('footer.php') ?>