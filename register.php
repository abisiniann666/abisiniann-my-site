<?php require_once('header.php') ?>

<body>
<div class="bg">
        <a href="http://abymaker.main.jp/todo/index.php"><img class="logo" src="logo_design.png"></a>
    </div>
    <div class="header">
        <div class="header_container">
            <p>イラスト登録</p>
        </div>
    </div>

    <div class="input_field">
      <form action="register.php" method="post" enctype="multipart/form-data">
          <label for="input_file">
              <div class="file_btn">
                    <svg width="300" height="50" class="file_icon">
                        <rect x="0" y="0" width="300" height="50" rx="5" ry="5" fill="rgb(50,120,250)"></rect>
                    </svg>
      
                     <svg width="30" height="30" class="file_icon">
                        <rect x="6" y="6" width="15" height="20" fill="rgb(50,120,250)"/>
                        <rect x="6" y="6" width="14" height="19" fill="white"/>
                        <rect x="3" y="3" width="15" height="20" fill="rgb(50,120,250)"/>
                        <rect x="3" y="3" width="14" height="19" fill="white"/>
                        <rect x="0" y="0" width="15" height="20" fill="rgb(50,120,250)"/>
                        <rect x="0" y="0" width="14" height="19" fill="white"/>
                       </svg>
               </div>ファイルを選択ボタン
              <input type="file" id="input_file" name="image">
              <input type="submit" name="image_btn" value="画像をアップロード">
          </label>
      </form>

</div>
<p>イラストの題名を入力してください</p>
<input type="text">
<br>


<?php  
//画像ファイルのアップロードーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

//データを一時ファイルに受け取り
if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){

   $new_name = 'images_folder/'.$_FILES['image']['name'];
   if(move_uploaded_file($_FILES['image']['tmp_name'],$new_name)){
       echo '新しい名前は'.$new_name ;
       echo '<br>';
       echo  basename($new_name).'をアップロードしました';
   }


}

//ファイルの確認



//保存ファイルに移動



//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー画像のファイルのアップロード
?>


</body>



<?php require_once('footer.php')?>