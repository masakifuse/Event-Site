<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>イベントサイト</title>
</head>
<body>
  


<?php
  require_once('../common/common.php');
$post=sanitize($_POST);
$onamae=$post['onamae'];
$furigana= $post['furigana'];
$email= $post['email'];
$address= $post['address'];
$tel = $post['tel'];
$money= $post['money'];
$op= $post['op'];
$soudan = $post['soudan'];

$okflg = true;

if($onamae=='')
{
  echo '<font color="red">※お名前が入力されていません。</font><br/><br/>';
  $okflg = false;
}
else
{
  echo 'お名前<br />';
  echo $onamae;
  echo '<br /><br />';
}
if($furigana=='')
{
  echo '<font color="red">※フリガナが入力されていません。</font><br /><br />';
  $okflg = false;
}
else
{
  echo 'フリガナ<br />';
  echo $furigana;
  echo '<br /><br />';
}
if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email)==0)
  {
    echo '<font color="red">※メールアドレスを正確に入力してください。</font><br/><br />';
    $okflg = false;
  }
  else
  {
    echo 'メールアドレス<br />';
    echo $email;
    echo '<br /><br />';
  }

  if($address=='')
  {
    echo '<font color="red">※住所を入力してください。</font><br /><br />';
    $okflg = false;
  }
  else
  {
    echo '住所<br />';
    echo $address;
    echo '<br /><br />';
  }
  if($tel=='')
  {
    echo '<font color="red">※電話番号を入力してください。</font><br /><br />';
    $okflg = false;
  }
  echo '電話番号<br />';
  echo $tel;
  echo '<br /><br />';

  if($money=='')
  {
    echo '<font color="red">※金額を半角数字で入力してください。</font><br /><br />';
    $okflg = false;
  }
  if($money<50000)
  {

    echo '<font color="red">※(半角数字入力）金額は５００００万円以上で依頼願います。</font><br /><br />';
    $okflg = false;
    
  }
  else
  {
    
    echo "金額:{$money}";
    echo '<br /><br />';
  }
  if($op=='')
  {
    echo '<font color="red">※現在のお客様状況がチェックされていません。</font><br /><br />';
  }
  else
  {
    echo 'ご職業<br />';
    echo $op;
    echo '<br /><br />';
  }
  if(isset($_POST['soudan']))
  {
    echo 'ご相談<br />';
    echo $soudan;
    echo '<br /><br />';
  }

  if($okflg==true)
  {
  echo '<form method="post" action="user_form_done.php">';
  echo '<input type="hidden" name="onamae" value="'.$onamae.'">';
  echo '<input type="hidden" name="furigana" value="'.$furigana.'">';
  echo '<input type="hidden" name="email" value="'.$email.'">';
  echo '<input type="hidden" name="address" value="'.$address.'">';
  echo '<input type="hidden" name="tel" value="'.$tel.'">';
  echo '<input type="hidden" name="money" value="'.$money.'">';
  echo '<input type="hidden" name="op" value="'.$op.'">';
  echo '<input type="hidden" name="soudan" value="'.$soudan.'">';
  echo '<input type="button" onclick="history.back()" value="戻る">';
  echo '<input type="submit" value = "OK"><br />';
  echo '</form>';
  }
  else
  {
    echo '<form>';
    echo '<input type ="button" onclick= "history.back()" value="戻る">';
  }
  ?>
</body>
</html>