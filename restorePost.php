<?php
if(isset($_GET['post']))
{
    $id=$_GET['post'];
    global $wpdb;
    $table_posts=$wpdb->prefix ."posts";
    $table_checkLogs=$wpdb->prefix ."check_logs";
    $wpdb->update($table_posts,array('post_status'=>"publish"),array("ID"=>$id));
    $wpdb->delete($table_checkLogs,array('id_post'=>$id,'user_action'=>'deleted'));
    $url="admin.php?page=checkLogin";
}
elseif (isset($_GET['comment']))
{
    $id=$_GET['comment'];
    global $wpdb;
    $table_comments=$wpdb->prefix ."comments";
    $table_checkLogs=$wpdb->prefix ."check_logs";
    $wpdb->update($table_comments,array('comment_approved'=>"1"),array("comment_ID"=>$id));
    $wpdb->delete($table_checkLogs,array('id_comment'=>$id,'user_action'=>'deleted'));
    $url="admin.php?page=checkLogin";

}
elseif (isset($_GET['sampComment']))
{
    $id=$_GET['sampComment'];
    global $wpdb;
    $table_comments=$wpdb->prefix ."comments";
    $table_checkLogs=$wpdb->prefix ."check_logs";
    $wpdb->update($table_comments,array('comment_approved'=>"1"),array("comment_ID"=>$id));
    $wpdb->delete($table_checkLogs,array('id_comment'=>$id,'user_action'=>'spam'));
    $url="admin.php?page=checkLogin";
}

header("Location: $url", true, 301);
exit;
?>