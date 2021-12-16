<?php
session_start();
session_regenerate_id(true);
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
  setcookie(session_name(),'',time()-4200,'/');
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ホームページ制作サイト</title>
</head>

<body>
<?php

try {
  require_once('../common/common.php');
  $post = sanitize($_POST);
  $onamae = $post['onamae'];
  $furigana = $post['furigana'];
  $email = $post['email'];
  $address = $post['address'];
  $tel = $post['tel'];
  $money = $post['money'];
  $op = $post['op'];
  $soudan = $post['soudan'];

  echo $onamae . '様<br />';
  echo 'ご依頼ありがとうございました。<br />';
  echo $email . 'にメールを送りましたのでご確認願います。<br />';
  echo '契約書・納品日につきましてはご相談の上決めさせていただきます。<br />';
  echo $address . '<br />';
  echo $tel . '<br />';
  echo "金額：{$money}<br />";
  echo "ご職業：{$op}<br />";
  echo '<br /><br />';

  $user_name = $_POST['onamae'];
  $user_furigana = $_POST['furigana'];
  $user_email = $_POST['email'];
  $user_address = $_POST['address'];
  $user_tel = $_POST['tel'];
  $user_money = $_POST['money'];
  $user_job = $_POST['op'];
  $user_soudan = $_POST['soudan'];

  $user_name = htmlspecialchars($user_name,ENT_QUOTES,'UTF-8');
  $user_furigana = htmlspecialchars($user_furigana,ENT_QUOTES,'UTF-8');
  $user_email = htmlspecialchars($user_email,ENT_QUOTES,'UTF-8');
  $user_address = htmlspecialchars($user_address,ENT_QUOTES,'UTF-8');
  $user_tel = htmlspecialchars($user_tel,ENT_QUOTES,'UTF-8');
  $user_money = htmlspecialchars($user_money,ENT_QUOTES,'UTF-8');
  $user_job = htmlspecialchars($user_job,ENT_QUOTES,'UTF-8');
  $user_soudan = htmlspecialchars($user_soudan,ENT_QUOTES,'UTF-8');

  $dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
  $user = 'root';
  $password = '9601';
  $dbh= new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
  $sql = 'INSERT INTO mst_user(name,furigana,email,address,tel,money,job,soudan) 
  VALUES(?,?,?,?,?,?,?,?)';
  $stmt = $dbh->prepare($sql);
  $data[] = $user_name;
  $data[] = $user_furigana;
  $data[] = $user_email;
  $data[] = $user_address;
  $data[] = $user_tel;
  $data[] = $user_money;
  $data[] = $user_job;
  $data[] = $user_soudan;
  $stmt->execute($data);
  $dbh =null;
  



  $honbun ='';
  $honbun.=$onamae."様 \n\n この度はご注文ありがとうございました。\n";
  $honbun.="\n";
  $honbun.="ご依頼内容\n";
  $honbun.="----------------------\n";
  $honbun.= $soudan;
  $honbun.="\n";
  $honbun.="----------------------\n";
  $honbun.="代金は以下の口座にお振り込みください。\n";
  $honbun.="りそな銀行長吉支店 普通口座6268008\n";
  $honbun.="入金が取れ次第、早期に納品致します。\n";
  $honbun.="\n";
  $honbun.="□□□□□□□□□□□□□□□□□□□□\n";
  $honbun.="~DIV Free fuse~\n";
  $honbun.="\n";
  $honbun.="代表：布施　正貴";
  $honbun.="\n\n";
  $honbun.="大阪市平野区瓜破東\n";
  $honbun.="電話 080-3779-※※※※\n";
  $honbun.="メール masakifuse1021@gmail.com\n";
  $honbun.="□□□□□□□□□□□□□□□□□□□□\n";
  echo'<br />';
  echo nl2br($honbun);
  $title= 'ご注文ありがとうございます。';
  $header = 'From: masakifuse1021@gmail.com';
  $honbun = html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
  mb_language('Japanese');
  mb_internal_encoding('UTF-8');
  mb_send_mail($email,$honbun,$header);
  $title= 'お客様から注文がありました。';
  $header = 'From:'.$email;
  $honbun = html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
  mb_language('Japanese');
  mb_internal_encoding('UTF-8');
  mb_send_mail('masakifuse1021@gmail.com',$title,$honbun,$header);


} catch (Exception $e) {
  echo $e;
  exit();
}

?>
<form method="post" action="index.html">
 <input type="submit" class="btn btn-primary" value="戻る">
</form>
</body>

</html>