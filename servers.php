<?php
/* SOURCE ENGINE QUERY FUNCTION, requires the server ip:port */
function source_query($ip){
    $cut = explode(":", $ip);
    $HL2_address = $cut[0];
    $HL2_port = $cut[1];

    $HL2_command = "\377\377\377\377TSource Engine Query\0";
    
    $HL2_socket = fsockopen("udp://".$HL2_address, $HL2_port, $errno, $errstr,3);
    fwrite($HL2_socket, $HL2_command); 
    $JunkHead = fread($HL2_socket,4);
    $CheckStatus = socket_get_status($HL2_socket);

    if($CheckStatus["unread_bytes"] == 0)return 0;

    $do = 1;
    $HL2_stats = '';
    while($do){
        $str = fread($HL2_socket,1);
        $HL2_stats.= $str;
        $status = socket_get_status($HL2_socket);
        if($status["unread_bytes"] == 0){
               $do = 0;
        }
    }
    fclose($HL2_socket);

    $x = 0;
    $result = '';
    while ($x <= strlen($HL2_stats)){
        $x++;
        $result.= substr($HL2_stats, $x, 1);    
    }
    
    $result = str_split($result);
    $info['network'] = ord($result[0]);$char = 1;
    while(ord($result[$char]) != "%00"){$info['name'] .= $result[$char];$char++;}$char++;
    while(ord($result[$char]) != "%00"){$info['map'] .= $result[$char];$char++;}$char++;
    while(ord($result[$char]) != "%00"){$info['dir'] .= $result[$char];$char++;}$char++;
    while(ord($result[$char]) != "%00"){$info['description'] .= $result[$char];$char++;}$char++;
    $info['appid'] = ord($result[$char].$result[($char+1)]);$char += 2;        
    $info['players'] = ord($result[$char]);$char++;    
    $info['max'] = ord($result[$char]);$char++;    
    $info['bots'] = ord($result[$char]);$char++;    
    $info['dedicated'] = ord($result[$char]);$char++;    
    $info['os'] = chr(ord($result[$char]));$char++;    
    $info['password'] = ord($result[$char]);$char++;    
    $info['secure'] = ord($result[$char]);$char++;    
    while(ord($result[$char]) != "%00"){$info['version'] .= $result[$char];$char++;}
    
    return $info;
}
$ips = array('94.130.8.161:27030','94.130.8.161:27015','94.130.8.161:27025','94.130.8.161:27035','94.130.8.161:27040','94.130.8.161:27020');
$alt = 0;
foreach ($ips as &$ip) {
    $q = source_query($ip);
    echo "<p class=\"lead\"><a href=\"steam://connect/".$ip."\"";
    echo ">".$q['name']."</a>";
    echo " - ".(intval($q['players']));
    echo "/".$q['max']."</p>";
    echo "<p class=\"map\">current map: ".$q['map']."</p>";
}
?>