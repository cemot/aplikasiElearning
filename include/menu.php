		
      <?php               
        $main=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y'");

        while($r=mysql_fetch_array($main)){
	         echo "<li><a href='$r[link]'>$r[nama_menu]</a>
                    <ul>";
	         $sub=mysql_query("SELECT * FROM submenu, mainmenu  
                            WHERE submenu.id_main=mainmenu.id_main 
                            AND submenu.id_main=$r[id_main] AND submenu.id_submain=0 AND submenu.aktif='Y'");
	         while($w=mysql_fetch_array($sub)){
              echo "<li><a href='$w[link_sub]'>&#187; $w[nama_sub]</a>";
       			  $sub2 = mysql_query("SELECT * FROM submenu WHERE id_submain=$w[id_sub] AND id_submain!=0");
              $jml2=mysql_num_rows($sub2);
        if ($jml2 > 0){
			  echo "<ul>";
			  while($s=mysql_fetch_array($sub2)){
			  	echo "<li><a href='$s[link_sub]'>&#187; $s[nama_sub]</a></li>";
			  }
			  echo "</ul>";
			  }
			  echo "</li>";
	         }
	       echo "</ul>
            </li>";
        }        
      ?><?php
include "system/connect.php";
$menu = mysql_query("SELECT * FROM mainmenu WHERE aktif='Y'");
while($m=mysql_fetch_array($menu)){
	echo "<li><a href='$m[menu_link]'>$m[menu_nama]</a>
		  <ul class='sub-menu'>";
$sub=mysql_query("SELECT * FOM submenu, mainmenu 
				WHERE submenu.menu_id=mainmenu.menu_id
				 AND submenu.menu_id=$m[menu_id] AND submenu.submenu_id=0 AND submenu.aktif='Y'");
while($n=mysql_fetch_array($sub)){
	echo "<li><a href='$n[sub_link]'>$n[sub_nama]</a>";
		$sub2=mysql_query("SELECT * FROM submenu WHERE submenu_id=$n[sub_id] AND submenu_id!=0");
		$hasil=mysql_num_rows($sub2);
if($hasil > 0) {
	echo " <ul class='sub-menu'>";
while($o=mysql_fetch_array($sub2)){
	echo"<li><a href='$o[sub_link]'>$o[sub_nama]</a></li>";
}
echo"</ul>";
}
echo "</li>";	
}
echo"</ul></li>";
}
?>   