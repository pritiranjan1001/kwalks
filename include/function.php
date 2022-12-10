<?php
session_start();
function loggedin()
{
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}
function getuser($id, $field)
{
    $query = mysql_query("SELECT $field FROM users WHERE id='$id'");
    $run = mysql_fetch_array($query);
    return $run[$field];
}
function getusername($id)
{
    $query = mysql_query("SELECT concat(fname,' ',lname) as field FROM user_data WHERE user_id='$id'");
    $run = mysql_fetch_array($query);
    return $run['field'];
}
function getpagename($id)
{
    $query = mysql_query("SELECT  username FROM puser WHERE id='$id'");
    $run = mysql_fetch_array($query);
    return $run['username'];
}

function frnd($my)
{
    $frnd_query = mysql_query("SELECT user_one,user_two FROM frnds WHERE(user_one='$my' OR user_two='$my')");
    $user[0] = $my;
    $i = 1;
    while ($run_frnd = mysql_fetch_array($frnd_query)) {
        $user_one = $run_frnd['user_one'];
        $user_two = $run_frnd['user_two'];
        if ($user_one == $my) {
            $user[$i] = $user_two;
        } else {
            $user[$i] = $user_one;
        }
        $i++;
    }
    $frnd_query = mysql_query("SELECT user_two FROM follow WHERE(user_one='$my')");
    while ($run_frnd = mysql_fetch_array($frnd_query)) {
        $user_two = $run_frnd['user_two'];
        $user[$i] = $user_two;
        $i++;
    }
    return $user;
}

function isfrnd($frndid)
{
    $my_id = $_SESSION['user_id'];
    $query34 = mysql_query("SELECT COUNT(*) as num  FROM frnds WHERE((user_one='$my_id' AND user_two='$frndid') OR (user_one='$frndid' AND user_two='$my_id'))");
    $frnd_query = mysql_query("SELECT COUNT(*) as num2 FROM follow WHERE(user_one='$my_id' AND user_two='$frndid')");
    $r = mysql_fetch_array($query34);
    $r1 = mysql_fetch_array($frnd_query);
    if ($r['num'] == 0 && $r1['num2'] == 0) {
        return 0;
    } else {
        return 1;
    }
}
