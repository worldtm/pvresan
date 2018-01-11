<?php

//Set Your InforMation
$ToKeN = "token";
$MyChannel = "@WorldTm";
$Dev = 140313934;
$phone = '+989330114289';
$namea = 'DR.AMIR #ωøяł∂™ #mr™🇪';

error_reporting(0);
define('API_KEY',$ToKeN);
//●●●●●●●●●●●●●●●●●●●
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown'
]);
}
function Forward($chat_id,$from_id,$massege_id)
{
bot('ForwardMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>$from_id,
'message_id'=>$massege_id
]);
}
function SendAction($chat_id, $action){
 bot('sendchataction',[
 'chat_id'=>$chat_id,
'action'=>$action
 ]);
 }
 function SendPhoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption
 ]);
 }
 function SendDocument($chat_id ,$Document ,$caption){
bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>$Document,
'caption'=>$caption
]);
}
function SendSticker($chat_id, $sticker){
 bot('SendSticker',[
 'chat_id'=>$chat_id,
 'sticker'=>$sticker
 ]);
 }
 function SendVoice($chat_id, $voice){
 bot('SendVoice',[
 'chat_id'=>$chat_id,
 'voice'=>$voice
 ]);
 }
 function SendVideo($chat_id, $video, $caption){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'video'=>$video,
 'caption'=>$caption
 ]);
 }
 function save($filename,$TXTdata){
 $myfile = fopen($filename, "w") or die("Unable to open file!");
 fwrite($myfile, "$TXTdata");
 fclose($myfile);
 }
 function remdir($dir){
    exec("rm -rf ".$dir);
  }
//●●●●●●●●●●●●●●●●●●●
$update = json_decode(file_get_contents('php://input'));
$msg = $update->message;
$fWd = $update->forward_from->message->from->username;
$text = $msg->text;
$chat_id = $msg->chat->id;
$chatid = $update->callback_query->message->chat->id;
$from_id = $msg->from->id;
$fromid = $update->callback_query->message->from->id;
$message_id = $msg->message_id;
$messageid = $update->callback_query->message->message_id;
$forward_from = $update->message->forward_from;
$forward_chat = $update->message->forward_from_chat;
$data = $update->callback_query->data;
$caption = $update->message->caption;
$banlist = file_get_contents('data/banlist.txt');
$step = file_get_contents("data/$from_id/step.txt");
$start = file_get_contents('data/start.txt');
$done = file_get_contents('data/done.txt');
$off_on = file_get_contents("data/bot.txt");
$button = file_get_contents("data/button.txt");
$id = file_get_contents('data/id.txt');
$lockch = file_get_contents('data/lockch.txt');
$profile = file_get_contents('data/profile.txt');
$first_name = $msg->from->first_name;
$last_name = $msg->from->last_name;
$username = $msg->from->username;
$userch = $update->message->forward_from_chat->username;
$fwdfrom = $update->message->forward_from->username;
//-------
$sticker_id = $update->message->sticker->file_id;
$voice_id = $update->message->voice->file_id;
$video_id = $update->message->video->file_id;
$voice_id = $update->message->voice->file_id;
$file_id = $update->message->document->file_id;
$music_id = $update->message->audio->file_id;
$photo2_id = $update->message->photo[2]->file_id;
$photo1_id = $update->message->photo[1]->file_id;
$photo0_id = $update->message->photo[0]->file_id;
//-------
$photo = $update->message->photo;
$video = $update->message->video;
$sticker = $update->message->sticker;
$file = $update->message->document;
$music = $update->message->audio;
$voice = $update->message->voice;
$forward = $update->message->forward_from;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$ToKeN/getChatMember?chat_id=$MyChannel&user_id=".$from_id));
$tch = $truechannel->result->status;
$datetime = json_decode(file_get_contents("http://api.mostafa-am.ir/date-time/"));
$time = $datetime->time_fa;
$date = $datetime->date_fa;
$date_time = json_decode(file_get_contents("http://Api.Mahdi-Elvis.tk/date-time"));
$ENdate = $date_time->ENdate; // تاریخ شمسی
$ENtime = $date_time->ENtime; // زمان به وقت ایران
$FAdate = $date_time->FAdate; // تاریخ شمسی ( اعداد فارسی )
$FAtime = $date_time->FAtime; // زمان به وقت ایران ( اعداد فارسی ) 
$tc = $update->message->chat->type;
$rt = $update->message->reply_to_message->forward_from->id;
$rtn = $update->message->reply_to_message->forward_from->first_name;
$rtu = $update->message->reply_to_message->forward_from->username;
$rtid = $update->message->reply_to_message->from->id;
$from_chat_id = $forward_from_chat->id;
mkdir("data/$from_id");
//●●●●●●●●●●●●●●●●●●●
  if(strpos($banlist ,"$from_id") !== false  ) {
  SendMessage($from_id,"🚨 شما در لیست بلاک شده‌ها قرار دارید!\n🚧 پیام شما به من ارسال نخواهد شد.");
  return;
 }
 if(strpos($off_on,"false") !== false && $from_id != $Dev){
     SendMessage($from_id,"ربات به دستور ادمین تا اطلاع ثانوی _خاموش_ می باشد 😄

لطفا در زمانی دیگر مجددا پیام خود را ارسال کنید 🌹");
 return false;
}
//---------------AnTi Flood
$timing = date("Y-m-d-h-i-sa");
$timing = str_replace("am","",$timing);

$metti_khan = file_get_contents("flood/$timing-$from_id.txt");
$timing_spam = $metti_khan+1;
file_put_contents("flood/$timing-$from_id.txt","$timing_spam");

$metti_khan2 = file_get_contents("flood/$timing-$from_id.txt");
if($metti_khan2 >= 3){
SendMessage($chat_id, "شما به علت ارسال پیغام مکرر از ربات محروم شدید!");
$myfile2 = fopen("data/banlist.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
return false;
}
//---------------End AnTi Flood
 if($tch != 'creator' && $tch != 'administrator' && $tch != 'member'){
     if ($lockch == "فعال ✔️"){
SendAction($chat_id, 'typing');
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🍃  برای استفاده از این ربات لازم است ابتدا وارد کانال زیر شده و روی *Join* بزنید.
🆔 $MyChannel
🌀 سپس مجدد دستور /start را ارسال کنید تا بتوانید از ربات استفاده کنید.️",
'parse_mode'=>'MarkDown',
'hide_keyboard'=>true,
]);
return false;
}
 }
 
if ($text == "/start" && $from_id == $Dev) {
	save("data/$Dev/step.txt","none");
SendAction($chat_id, 'typing');
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام قربان 😃🌹

به ربات خودتون خوش اومدید!
جهت راهنمایی /help را ارسال کنید.

🕰 ساعت » $time
📆 تاریخ » $FAdate",
]);
}
//●●●●●●●●●●●●●●●●●●●

  elseif ($text == "/start" && $button !="bbutton") {
      save("data/$chat_id/step.txt","none");
      $user = file_get_contents('data/users.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('data/users.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('data/users.txt',$add_user);
    }
	$user = file_get_contents('data/username.txt');
    $members = explode("\n",$user);
    if (!in_array("@".$username,$members)){
      $add_user = file_get_contents('data/username.txt');
      $add_user .= "@".$username."\n";
     file_put_contents('data/username.txt',$add_user);
    }
SendAction($chat_id, 'typing');
   bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" $start ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'resize_keyboard' => true,
'keyboard'=>[
	[['text'=>"🎫 پروفایل"]],
	[['text'=>" ارسال شماره شما 📞",'request_contact' => true],['text'=>"⚓️ ارسال مکان شما",'request_location' => true]],
            ]
        ])
]);
}
elseif ($text == "/start") {
      save("data/$chat_id/step.txt","none");
      $user = file_get_contents('data/users.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('data/users.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('data/users.txt',$add_user);
    }
	$user = file_get_contents('data/username.txt');
    $members = explode("\n",$user);
    if (!in_array("@".$username,$members)){
      $add_user = file_get_contents('data/username.txt');
      $add_user .= "@".$username."\n";
     file_put_contents('data/username.txt',$add_user);
    }
SendAction($chat_id, 'typing');
   bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" $start ",
'parse_mode'=>'MarkDown',
]);
}
elseif($rt != "" && $from_id == $Dev){
if($text !='/ban' and $text !='/unban' and $text !='/share' and $text !='/info'){
  SendAction($rt, 'typing');
  SendSticker($rt, $sticker_id);
  SendVoice($rt, $voice_id);
  SendVideo($rt, $video_id, $caption);
  SendDocument($rt, $file_id, $caption);
  bot('sendphoto',['chat_id'=>$rt,'photo'=>$photo0_id,'caption'=>$caption]);
  SendAction($chat_id, 'typing');
  
bot('sendMessage',[
'chat_id'=>$rt,
 'text'=>$text,
'parse_mode'=>'MarkDown',
]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"*📪 پیام مورد نظر ارسال شد*",
'parse_mode'=>'MarkDown',
 ]);
 }
 }
else {
	if ($from_id !== $Dev && !in_array($from_id,$banlist)){
		if($text !='/id' and $text !='/creator' and $text !='🎫 پروفایل'){
			if($tc == "private"){
bot("forwardmessage",[
 'chat_id'=>$Dev,
  'from_chat_id'=>$chat_id,
  'message_id'=>$message_id,
 ]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>" $done ",
'parse_mode'=>'MarkDown',
 ]);
}
}}
}
if($forward_from != null){
    bot('SendMessage',[
'chat_id'=>$Dev,
'text'=>"🔺 این پیام از @$fwdfrom \nتوسط▫️ @$username ▪️ فروارد شد.",
]);
}
if($forward_chat != null){
bot('SendMessage',[
'chat_id'=>$Dev,
'text'=>" 🔺 این پیام از کانال @$userch \nتوسط▪️ @$username ▫️ فروارد شده. ",
]);
}
 //////------●●●●●●●●●USERS●●●●●●●●●-----
elseif($text=="/id"){
    SendAction($chat_id, 'typing');
     SendMessage($chat_id,"🌀 `$from_id`\n");
}
  elseif($text=="/creator"){
      SendAction($chat_id, 'typing');
     SendMessage($chat_id,"🔸 این ربات توسط `رامین ربیعی` طراحی و کد نویسی شده است.");
}   
  elseif($text=="🎫 پروفایل"){
if (!file_exists("data/profile.txt")){
      SendAction($chat_id,"typing");
     bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📕 *پروفایل* `خالی` *است!*",
'parse_mode'=>'MarkDown',
 ]);
}else{
  SendAction($chat_id,"typing");
     bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>" $profile ",
'parse_mode'=>'MarkDown',
 ]);
}
}
//////-------●●●●●●●●●ADMIN●●●●●●●●●-----
elseif($text =='/whois'){
	SendAction($chat_id, 'typing');
file_put_contents("data/$from_id/step.txt","Get Chat");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🌀 آیدی عددی کاربر را ارسال کنید",
]);
}
elseif($step == 'Get Chat'){
	SendAction($chat_id, 'typing');
file_put_contents("data/$from_id/step.txt","none");
$GetChat = json_decode(file_get_contents("https://api.telegram.org/bot$ToKeN/getChat?chat_id=$text"));
$ok = $GetChat->ok;
$id = $GetChat->result->id;
$photo = $GetChat->result->photo;
$name = $GetChat->result->first_name;
$username = $GetChat->result->username;
$type = $GetChat->result->type;
if($ok == true){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"💮 First Name : $name
🌀 UseName : @$username
🔘 Type : $type",
]);
}else{
	SendAction($chat_id, 'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️ کاربر عضو ربات نیست!",
]);
}
}
//---------------------------------------------------------------------------------
elseif($text=="/status" && $from_id == $Dev){
	SendAction($chat_id, 'typing');
        $txtt = file_get_contents("data/users.txt");
        $membersidd= explode("\n",$txtt);
        $mmemcount = count($membersidd) -1;
SendMessage($chat_id,"👥 تعداد کاربران ربات: *$mmemcount*");
    }
//---------------------------------------------------------------------------------
    elseif($text == "/lastuser" && $from_id == $Dev){
        SendAction($chat_id, 'typing');
        
    $bots = file_get_contents("data/username.txt");
	$exbot = explode("@",$bots);
	$c = count($exbot)-2;
	$botsss = '';
	if($exbot[$c-(-1)] != null){
	$botsss = $botsss."@".$exbot[$c-(-1)];
	}if($exbot[$c] != null){
	$botsss = $botsss."@".$exbot[$c];
	}if($exbot[$c-1] != null){
	$botsss = $botsss."@".$exbot[$c-1];
	}if($exbot[$c-2] != null){
	$botsss = $botsss."@".$exbot[$c-2];
	}if($exbot[$c-3] != null){
	$botsss = $botsss."@".$exbot[$c-3];
	}if($exbot[$c-4] != null){
	$botsss = $botsss."@".$exbot[$c-4];
	}if($exbot[$c-5] != null){
	$botsss = $botsss."@".$exbot[$c-5];
	}if($exbot[$c-6] != null){
	$botsss = $botsss."@".$exbot[$c-6];
	}if($exbot[$c-7] != null){
	$botsss = $botsss."@".$exbot[$c-7];
	}if($exbot[$c-8] != null){
	$botsss = $botsss."@".$exbot[$c-8];
	}if($exbot[$c-9] != null){
	$botsss = $botsss."@".$exbot[$c-9];
	}if($exbot[$c-10] != null){
	$botsss = $botsss."@".$exbot[$c-10];
	}
	
	$botsss = str_replace("\n",' | ',$botsss);
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🅾️ لیست <b>10</b> کاربر اخیر ربات :
$botsss",
'parse_mode'=>'HtML',
 ]);
    }
//---------------------------------------------------------------------------------
    elseif($text=="/users" && $from_id == $Dev){
		SendAction($chat_id,"typing");
	  SendMessage($chat_id,"🎲 فایل users.txt در حال آپلود می باشد! ");
	  SendAction($chat_id, 'upload_document');
	  sleep(4);
	  $Users =  new CURLFile('data/users.txt');
        SendDocument($chat_id ,$Users ,'📁 لیست کامل اعضای ربات
      
👈 نمایش تعداد کاربران /status');
SendAction($chat_id, 'upload_document');
sleep(4);
$UserName =  new CURLFile('data/username.txt');
        SendDocument($chat_id ,$UserName ,'📁 لیست آیدی کاربران ربات
      
👈 نمایش تعداد کاربران /lastuser');
}
//---------------------------------------------------------------------------------
    elseif($text=="/backup" && $from_id == $Dev){
		SendAction($chat_id,"typing");
	  SendMessage($chat_id,"🎲 فایل bot.php در حال آپلود می باشد! ");
	  SendAction($chat_id, 'upload_document');
	  sleep(4);
	  $UseRs =  new CURLFile('index.php');
        SendDocument($chat_id ,$UseRs ,'📁 آخرین بکاپ از ربات');
}

//---------------------------------------------------------------------------------
elseif($text=="/help" && $from_id == $Dev){
	SendAction($chat_id, 'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔻 راهنمایی ربات پیام رسان 🔻

● /help
-| ارسال راهنمایی ربات (همین متن)

● /ban `[id | reply]`
-| مسدود شخص از ربات

● /unban `[id | reply]`
-| لغو مسدودیت شخص از ربات

● /banlist
-| نمایش لیست اعضای مسدود

● /cleanbanlist
-| پاکسازی لیست اعضای مسدود شده

● /status
-| نمایش تعداد اعضای کاربران

● /lastuser
-| نمایش آیدی 10 کاربر اخیر

● /users
-| نمایش تمامی اعضا بصورت فایل

● /bot `[on | off]`
-| تغییر وضعیت ربات (روشن - خاموش)

● /lockch `[on | off]`
-| تغییر وضعیت قفل کانال (روشن - خاموش)

● /button `[ok | no]`
-| تغییر وضعیت نمایش دکمه های ربات

● /share `(reply)`
-| اشتراک گذاری شماره شما برای شخص

● /payam
-| ارسال پیام به کاربر توسط آیدی عددی

● /sendtoall
-| ارسال پیام همگانی

● /fwdtoall
-| فروارد همگانی پیام

● /info `(reply)`
-| نمایش اطلاعات شخص

● /setstart `(text)`
-| تنظیم متن شروع ربات

● /setdone `(text)`
-| تنظیم متن پیش فرض

● /setprofile `(text)`
-| تنظیم متن دکمه پروفایل

● /delprofile
-| حذف متن دکمه پروفایل

● /reset
-| ریست تمامی داده های ربات

● /backup
-| دریافت یک نسخه پشتیبان از سورس

Souce By *#RaMiN*
",
'parse_mode'=> 'MaRkDowN',
]);
}
//---------------------------------------------------------------------------------
elseif ($text == "/bot on" && $from_id == $Dev) {
	SendAction($chat_id, 'typing');
file_put_contents("data/bot.txt","ramin");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات با موفقیت روشن شد ☑️",
]);
}
elseif ($text == "/bot off" && $from_id == $Dev) {
	SendAction($chat_id, 'typing');
file_put_contents("data/bot.txt","false");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات با موفقیت خاموش شد 🔘",
]);
}
//---------------------------------------------------------------------------------
elseif ($text == "/button no" && $from_id == $Dev) {
	SendAction($chat_id, 'typing');
file_put_contents("data/button.txt","bbutton");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حالت بدون دکمه فعال شد ✔️",
]);
}
elseif ($text == "/button ok" && $from_id == $Dev) {
	SendAction($chat_id, 'typing');
file_put_contents("data/button.txt","Ramin");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تمامی دکمه ها فعال شدند ✔️",
]);
}
//---------------------------------------------------------------------------------
elseif ($text == "/lockch on" && $from_id == $Dev) {
	SendAction($chat_id, 'typing');
file_put_contents("data/lockch.txt","فعال ✔️");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✔️ قفل عضویت کانال برای ربات فعال شد
📕 از این پس اعضا برای استفاده از ربات، باید در کانال $MyChannel عضو شوند.",
]);
}
elseif ($text == "/lockch off" && $from_id == $Dev) {
	SendAction($chat_id, 'typing');
file_put_contents("data/lockch.txt","غیرفعال ✖️");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✖️ قفل عضویت کانال برای ربات غیرفعال شد
📕 از این پس اعضا می توانند بدون عضو  بودن در کانال از ربات استفاده کنند.",
]);
}
//---------------------------------------------------------------------------------
elseif($text == '/sendtoall' && $from_id == $Dev){
	SendAction($chat_id, 'typing');
file_put_contents("data/$from_id/step.txt","stoall");
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود را ارسال کنید 🌀",
]);
}
if($step == "stoall" && $text !='/start'){
save("data/$from_id/step.txt","none");
sendMessage($chat_id,"پیام درحال ارسال به همه است ▪️▫️▪️");
$all_member = fopen("data/users.txt", 'r');
while( !feof( $all_member)) {
$usEr = fgets( $all_member);
bot('SendMessage',[
'chat_id'=>$usEr,
'text'=>$text,
'parse_mode'=>'MarkDown'
]);
}
SendMessage($chat_id,"پیام با موفقیت به تمامی کاربران ربات ارسال شد ▫️✔️");
}
//---------------------------------------------------------------------------------
elseif($text == "/fwdtoall" && $from_id == $Dev){
    file_put_contents("data/$from_id/step.txt","ftoall");
	SendAction($chat_id, 'typing');
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود را فروارد کنید 🌀",
]);
}
elseif($step == "ftoall" && $text !='/start'){
    file_put_contents("data/$from_id/step.txt","no");
	SendAction($chat_id, 'typing');
	bot('SendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام درحال فروارد است ▪️▫️▪️\n",
  ]);
$forp = fopen( "data/users.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar,$chat_id,$message_id); 
  } 
   SendMessage($chat_id,"پیام با موفقیت به تمامی کاربران ربات فروارد شد ▫️✔️");
}
//---------------------------------------------------------------------------------
elseif($text == "/payam" && $from_id == $Dev){
    file_put_contents("data/$from_id/step.txt","id");
 SendAction($chat_id, 'typing');
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"💮 آیدی عددی کاربر را ارسال کنید :",
  ]);
}
elseif($step == "id" && $text !='/start'){
file_put_contents("data/id.txt",$text);
    file_put_contents("data/$from_id/step.txt","smg");
 SendAction($chat_id, 'typing');
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"🎫 پیام خود را ارسال کنید :",
  ]);
  }
elseif($step == "smg" && $text !='/start'){
    file_put_contents("data/$from_id/step.txt","none");
    if($text != null){
    SendMessage($id, "$text");
SendMessage($chat_id , "🎫 متن پیام شما :
*$text*

با موفقیت به کاربر *$id* ارسال شد▫️✔️");
    } else{
 SendAction($chat_id, 'typing');
  SendSticker($id, $sticker_id);
  SendVoice($id, $voice_id);
  SendVideo($id, $video_id, $caption);
  SendDocument($id, $file_id, $caption);
  bot('sendphoto',['chat_id'=>$id,'photo'=>$photo0_id,'caption'=>$caption]);
  SendMessage($chat_id , "پیغام شما با موفقیت به کاربر *$id* ارسال شد▫️✔️");
save("data/id.txt","none");
  }}
//---------------------------------------------------------------------------------
elseif($text=="/reset" && $from_id == $Dev){
	SendAction($chat_id, 'typing');
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️ آیا از ریست کامل ربات خود مطمئن هستید؟

☢ این عمل باعث از دست رفتن تمامی داده های ربات شما از جمله :
_● پاکسازی لیست اعضا
● پاکسازی لیست مسدود
● از بین رفتن پیام شروع و پیام پیش فرض تنظیم شده\n_
می شود!\n",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"بله من مطمئن هستم 😶⭕️",'callback_data'=>"resetok"]
              ],
              [
              ['text'=>"انصراف  🔙",'callback_data'=>"resetno"]
              ]
              ]
        ])
]);
}
elseif($data == 'resetok'){
	unlink("data/users.txt");
	unlink("data/start.txt");
	unlink("data/id.txt");
	unlink("data/bot.txt");
	unlink("data/done.txt");
	unlink("data/banlist.txt");
	unlink("data/profile.txt");
	unlink("data/lockch.txt");
	unlink("data/username.txt");
	SendMessage($chatid,"🔆 ربات با موفقیت ریست شد 🔆");
	}
elseif($data == "resetno") {
  bot('editMessagetext',[
    'chat_id'=>$chatid,
 'message_id'=>$messageid,
    'text'=>"شما از ریست کردن ربات خود منصرف شدید 😄",
]);
sleep(8);
bot('DeleteMessage',[
'chat_id' => $chatid,
'message_id' => $messageid
]);
SendAction($chat_id, 'typing');
sleep(2);
SendMessage($chatid,"😐");
}
elseif ($text == "/delprofile" && $from_id == $Dev) {
	SendAction($chat_id, 'typing');
  unlink("data/profile.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه _پروفایل_ حذف شد 🗑",
'parse_mode'=>'MarkDown',
]);
}
//---------------------------------------------------------------------------------
elseif(strpos($text , '/setstart')!== false && $from_id == $Dev){
	SendAction($chat_id, 'typing');
    $starttxt = str_replace('/setstart',"",$text);
    if ($starttxt != ""){
         save("data/start.txt","$starttxt");
		SendMessage($chat_id,"متن شروع ربات تغییر یافت ✅\n⏺ متن جدید : \n$starttxt");
  }
}
elseif(strpos($text , '/setdone')!== false && $from_id == $Dev){
   SendAction($chat_id, 'typing');
   $donetxt = str_replace('/setdone',"",$text);
    if ($donetxt != ""){
         save("data/done.txt","$donetxt");
		SendMessage($chat_id,"متن پیش فرض ربات تغییر یافت ✅\n⏺ متن جدید : \n$donetxt");
  }
}
elseif(strpos($text , '/setprofile')!== false && $from_id == $Dev){
	SendAction($chat_id, 'typing');
    $proftxt = str_replace('/setprofile',"",$text);
    if ($proftxt != ""){
         save("data/profile.txt","$proftxt");
		SendMessage($chat_id,"مطلب دکمه پروفایل ربات تغییر یافت ✅\n⏺ متن جدید : \n$proftxt");
  }
}
//---- Ban By (Reply)
if($rt && $text == "/ban" && $from_id == $Dev){
	SendAction($chat_id, 'typing');
  $baN = file_get_contents('data/banlist.txt');
    $bann = explode("\n",$baN);
    if (!in_array($rt,$bann)){
      $add_user = file_get_contents('data/banlist.txt');
      $add_user .= $rt."\n";
     file_put_contents('data/banlist.txt',$add_user);
     SendMessage($chat_id,"☑️ کاربر *$rt* به لیست مسدود ربات اضافه شد.");
 SendMessage($rt,"🚷 شما از ربات بلاک شدید.\n🌀دیگر پیام شما به من ارسال نمی شود!");
    }
}
//---- Ban By (id)
elseif ( strpos($text , '/ban') !== false  ) {
$te = explode(" ",$text);
if ($te['1'] != "") {
	SendAction($chat_id, 'typing');
	
  $baN = file_get_contents('data/banlist.txt');
    $bann = explode("\n",$baN);
    if (!in_array($te['1'],$bann)){
      $add_user = file_get_contents('data/banlist.txt');
      $add_user .= $te['1']."\n";
     file_put_contents('data/banlist.txt',$add_user);
     SendMessage($chat_id,"☑️ کاربر *". $te['1'] ."* به لیست مسدود ربات اضافه شد.");
 SendMessage($te['1'],"🚷 شما از ربات بلاک شدید.\n🌀دیگر پیام شما به من ارسال نمی شود!");
   }
}
}
//---- UnBan By (Reply)
elseif($rt != null && $text == '/unban' && $from_id == $Dev){
	SendAction($chat_id, 'typing');
 $rep = str_replace("$reply\n",'',$baN);
 save("data/banlist.txt",$rep);
 SendAction($chat_id,"typing");
 SendMessage($chat_id,"✅ کاربر *$rt* از لیست مسدود حذف شد.");
 SendMessage($rt,"✅ شما از ربات آنبلاک شدید.\n🌀 اکنون پیام شما به من ارسال خواهد شد.");
 }
//---- UnBan By (id)
 elseif ( strpos($text , '/unban') !== false  ) {
$te = explode(" ",$text);
if ($te['1'] != "") {
	SendAction($chat_id, 'typing');
	$rr = $te['1'];
  $rep = str_replace("$rr\n",'',$baN);
 save("data/banlist.txt",$rep);
 SendAction($chat_id,"typing");
 SendMessage($chat_id,"✅ کاربر *". $te['1'] ."* از لیست مسدود حذف شد.");
 SendMessage($te['1'],"✅ شما از ربات آنبلاک شدید.\n🌀 اکنون پیام شما به من ارسال خواهد شد.");
   }
}
//---- BanList
if ($text == '/banlist' && $from_id == $Dev) {
	SendAction($chat_id, 'typing');
	 $baN = file_get_contents("data/banlist.txt");
        $tdadban= explode("\n",$baN);
        $nban = count($tdadban) -1;
SendMessage($chat_id,"🍃 لیست کاربران مسدود شده :\n$baN\n\n🌀 هم اکنون *$nban* نفر در لیست مسدود ربات می باشند!");
}
//---- CleanBanList
elseif($text == '/cleanbanlist' && $from_id == $Dev){
SendAction($chat_id, 'typing');
 unlink("data/banlist.txt");
 Sendmessage($chat_id,"🗑 لیست افراد مسدود ربات ، _پاکسازی_ شد!");
 }
 elseif($rt != null && $text == '/info' && $from_id == $Dev){
 SendAction($chat_id,"typing");
 SendMessage($chat_id, "ℹ️ مشخصات شخص : \n● Name : $rtn\n● Chat Id : $rt\n● UserName : @$rtu\n\n");
 }
 
 	elseif($rt != null && $text == '/share' && $from_id == $Dev){
     SendAction($chat_id, 'typing');
bot('SendContact',[
	'chat_id'=>$rt,
	'phone_number'=>$phone,
	'first_name'=>$namea
	]);
	SendMessage($chat_id, "💠 شماره شما با موفقیت برای شخص به اشتراک گذاشته شد.");
	}
	elseif ($from_id != $chat_id) {
	SendMessage($chat_id,"من اجازه ورود به گروه را ندارم!
بای 😬👋🏻");
bot('LeaveChat',[
	'chat_id'=>$chat_id
	]);
	}
	///----------END ADMIN
unlink("error_log");
?>
