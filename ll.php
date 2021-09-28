<?php

ob_start();

$API_KEY = "Token";

define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{return json_decode($res);}}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$name = $message->from->first_name;
$ramisyria = 280911803; //ايديك
$rami = explode("\n",file_get_contents("rambo.txt"));
$rambo = count($rami)-1;
$syr = file_get_contents("syr.txt");
if ($update && !in_array($chat_id, $rami)) {
    file_put_contents("rambo.txt", $chat_id."\n",FILE_APPEND);
  }
$from_id = $message->from->id;
$ch = "rambo_syr"; // معرف قناتك بدون @ ;
$ch2 = "rambo_syr1";
$from_id = $message->from->id;
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
👨‍💻¦ لا تستطيع استخدام البوت ؛🍂
📬¦ عليڪك الاشتراڪك في القناه الاولى ؛ 🕸
📡¦ القناهہ الاولى •⊱ @$ch ⊰•️
–––––––––––––––
- عند الاشتراڪك ارسل { /start } ...
",]);return false;}
$from_id = $message->from->id;
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$ch1&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
👨‍💻¦ لا تستطيع استخدام البوت ؛🍂
📬¦ عليڪك الاشتراڪك في القناه الثانيه ؛ 🕸
📮¦ القناهہ الثانيهہ •⊱ @$ch2 ⊰•️
–––––––––––––––
- عند الاشتراڪك ارسل { /start } ...
",]);return false;}

if($text == "م" and $chat_id == $ramisyria){
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"❖￤عدد مشتركين بوتك سيدي المطور هو { $rambo } مشترك ؛ 👥"
    ]);
}
if($text == "نشر" and $chat_id == $ramisyria){
 file_put_contents("syr.txt", "rambo");
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"❖￤ارسل رسالتك الان سيدي المطور وسيتم ارسالها الى { $rambo } مشترك ؛ 📬"
    ]);
}
if($text != "نشر" and $syr == "rambo" and $chat_id == $ramisyria){
  for ($i=0; $i < count($rami); $i++) { 
    bot('sendMessage',[
      'chat_id'=>$rami[$i],
      'text'=>$text,
    ]);
  }
  unlink("syr.txt");
}
if ($text == '/start') {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" 👋┇ أهلاً وسهلاً بك يا ؛ [$name](tg://user?id=$chat_id) 
💠┇فـي بوت معاني الأسماء 🖤😍
🏆┇ البوت الأول في التلڪرام 🤭🇮🇶
🖲┇ يمڪنڪك من خلال البوت معرفهہ معنى اسمڪك 🤓🙊 ...
🔖┇ قم بإرسال الاسم وانتظر قليلا ✨💗✔",
'disable_web_page_preview'=>'true',
'parse_mode'=>'Markdown',
'reply_markup'=>json_encode([
                'inline_keyboard'=>[
[['text'=>'• اضغط هنا وتابع جديدنا ؛ 🐾🐼','url'=>"https://t.me/th3victory"]],
[['text'=>'• الـمـطور','url'=>"https://t.me/nnnnh"]],
[['text'=>'نبٰذآتِ ﭑلتِلڪږآ۾ •༒☬','url'=>"https://t.me/hosamtpn"]],
]])
]);}
$ramisyr1 = json_decode(file_get_contents("https://admin.ibuser.xyz/m3na/?name=".urlencode($text)))->ramisyr;
$ramisyr = str_replace('[لا تنسى متابعة قناة المطور @th3victory 👨🏻‍💻💜 ]', '', $ramisyr1); /* لاتغير شيapi */
if($text !="/start" or $text !="نشر" or $text != "المشتركين"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"$ramisyr",
]);
}

$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$sudo = 280911803; //ايديك
$t =$message->chat->title; 
$user = $message->from->username; 
if($text == "/start") {
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"",
'reply_to_message_id'=>$message->message_id,
]);
bot('sendMessage',[
'chat_id'=>$sudo,
'text'=>"
دخـل شـخـص للـبـوت 💗🎗
• الاسم ┊ $name ،
• المعرف┊@$username ،
• الايدي ┊ $from_id ،",
]);}

if($text && $from_id != $admin){
bot('forwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}

if ($text and $message->reply_to_message && $text!="/info" && $text!="/ban" && $text!="/unban" && $text!="/forward") {
  bot('sendMessage',[
'chat_id'=>$message->reply_to_message->forward_from->id,
    'text'=>$text,
    ]);
}

