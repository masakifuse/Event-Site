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
  echo 'お名前が入力されていません。<br/><br/>';
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
  echo 'フリガナが入力されていません。<br /><br />';
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
    echo 'メールアドレスを正確に入力してください。<br/><br />';
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
    echo '住所を入力してください。<br /><br />';
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
    echo '電話番号を入力してください。<br /><br />';
    $okflg = false;
  }
  echo '電話番号<br />';
  echo $tel;
  echo '<br /><br />';

  if($money=='')
  {
    echo '金額を半角数字で入力してください。<br /><br />';
    $okflg = false;
  }
  if($money<50000)
  if(preg_match('/^[0-9]+$/D', $money))
  {

    echo '(半角数字入力）金額は５００００万円以上で依頼願います。';
  }
  else
  {
    
    echo "金額:{$money}";
    echo '<br /><br />';
  }
  if($op=='')
  {
    echo '現在のお客様状況がチェックされていません。<br /><br />';
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
  echo '<input type="hidden" name="currentPosition" value="'.$currentPosition.'">';
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