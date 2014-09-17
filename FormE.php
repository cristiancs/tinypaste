 <form action="<? echo configval(2);?>/editar/<? echo $_GET['key']; ?>" method="post">
      <div id="homeToolbar">
        <div class="b728x90">
                <?php echo configval(6) ?>
              </div>
         <div class="left">
            <div class="paste_option" id="pasteTitle" original-title="Indica un titulo para tu paste">
               <div class="bold left font14" style="padding-top: 2px;"><span>Titulo:&nbsp;&nbsp;</span></div>
               <div class="paste_optd">
                  <input class="rounded" type="text" id="paste_title" name="titulo2" value="<?echo $row['titulo'];?>">
               </div>
               <div class="clear"></div>
            </div>
         </div>
         <div class="left">
           <img src="<?php echo configval(2)."/"; ?>images/rte-bold.png" class="cursor" onclick="rteSimple(&quot;b&quot;);" alt="BOLD">
           <img src="<?php echo configval(2)."/"; ?>images/rte-italic.png" '="" class="cursor" onclick="rteSimple(&quot;i&quot;);" alt="ITALIC">
           <img src="<?php echo configval(2)."/"; ?>images/rte-underlined.png" '="" class="cursor" onclick="rteSimple(&quot;u&quot;);" alt="UNDERLINE">
           <img src="<?php echo configval(2)."/"; ?>images/rte-strike.png" '="" class="cursor" onclick="rteSimple(&quot;s&quot;);" alt="STRIKE">
 <img src="<?php echo configval(2)."/"; ?>images/rte-link-button.png" class="cursor" onclick="rteLink();" alt="LINK" title="Insertar link">
 <img src="<?php echo configval(2)."/"; ?>images/rte-image-button.png" class="cursor" onclick="rteImage();" alt="IMG" title="Insertar Imagen"> 
      
           <div class="rte-menu" onclick="rteMenu('colors', this);" title="Change Color">Colors &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo configval(2)."/"; ?>images/icon_open.gif" alt="V"></div>
           <div class="rte-menu-span hide" id="rte-menu-colors" style="text-align: center;">
              <table cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="rte-menu-color" id="color-#000000"><div style="background-color: rgb(0, 0, 0);"> </div></td><td class="rte-menu-color" id="color-#A0522D"><div style="background-color: rgb(160, 82, 45);"> </div></td><td class="rte-menu-color" id="color-#556B2F"><div style="background-color: rgb(85, 107, 47);"> </div></td><td class="rte-menu-color" id="color-#006400"><div style="background-color: rgb(0, 100, 0);"> </div></td><td class="rte-menu-color" id="color-#483D8B"><div style="background-color: rgb(72, 61, 139);"> </div></td><td class="rte-menu-color" id="color-#000080"><div style="background-color: rgb(0, 0, 128);"> </div></td><td class="rte-menu-color" id="color-#4B0082"><div style="background-color: rgb(75, 0, 130);"> </div></td><td class="rte-menu-color" id="color-#2F4F4F"><div style="background-color: rgb(47, 79, 79);"> </div></td></tr><tr><td class="rte-menu-color" id="color-#8B0000"><div style="background-color: rgb(139, 0, 0);"> </div></td><td class="rte-menu-color" id="color-#FF8C00"><div style="background-color: rgb(255, 140, 0);"> </div></td><td class="rte-menu-color" id="color-#808000"><div style="background-color: rgb(128, 128, 0);"> </div></td><td class="rte-menu-color" id="color-#008000"><div style="background-color: rgb(0, 128, 0);"> </div></td><td class="rte-menu-color" id="color-#008080"><div style="background-color: rgb(0, 128, 128);"> </div></td><td class="rte-menu-color" id="color-#0000FF"><div style="background-color: rgb(0, 0, 255);"> </div></td><td class="rte-menu-color" id="color-#708090"><div style="background-color: rgb(112, 128, 144);"> </div></td><td class="rte-menu-color" id="color-#696969"><div style="background-color: rgb(105, 105, 105);"> </div></td></tr><tr><td class="rte-menu-color" id="color-#FF0000"><div style="background-color: rgb(255, 0, 0);"> </div></td><td class="rte-menu-color" id="color-#F4A460"><div style="background-color: rgb(244, 164, 96);"> </div></td><td class="rte-menu-color" id="color-#9ACD32"><div style="background-color: rgb(154, 205, 50);"> </div></td><td class="rte-menu-color" id="color-#2E8B57"><div style="background-color: rgb(46, 139, 87);"> </div></td><td class="rte-menu-color" id="color-#48D1CC"><div style="background-color: rgb(72, 209, 204);"> </div></td><td class="rte-menu-color" id="color-#4169E1"><div style="background-color: rgb(65, 105, 225);"> </div></td><td class="rte-menu-color" id="color-#800080"><div style="background-color: rgb(128, 0, 128);"> </div></td><td class="rte-menu-color" id="color-#808080"><div style="background-color: rgb(128, 128, 128);"> </div></td></tr><tr><td class="rte-menu-color" id="color-#FF00FF"><div style="background-color: rgb(255, 0, 255);"> </div></td><td class="rte-menu-color" id="color-#FFA500"><div style="background-color: rgb(255, 165, 0);"> </div></td><td class="rte-menu-color" id="color-#FFFF00"><div style="background-color: rgb(255, 255, 0);"> </div></td><td class="rte-menu-color" id="color-#00FF00"><div style="background-color: rgb(0, 255, 0);"> </div></td><td class="rte-menu-color" id="color-#00FFFF"><div style="background-color: rgb(0, 255, 255);"> </div></td><td class="rte-menu-color" id="color-#00BFFF"><div style="background-color: rgb(0, 191, 255);"> </div></td><td class="rte-menu-color" id="color-#9932CC"><div style="background-color: rgb(153, 50, 204);"> </div></td><td class="rte-menu-color" id="color-#C0C0C0"><div style="background-color: rgb(192, 192, 192);"> </div></td></tr><tr><td class="rte-menu-color" id="color-#FFC0CB"><div style="background-color: rgb(255, 192, 203);"> </div></td><td class="rte-menu-color" id="color-#F5DEB3"><div style="background-color: rgb(245, 222, 179);"> </div></td><td class="rte-menu-color" id="color-#FFFACD"><div style="background-color: rgb(255, 250, 205);"> </div></td><td class="rte-menu-color" id="color-#98FB98"><div style="background-color: rgb(152, 251, 152);"> </div></td><td class="rte-menu-color" id="color-#AFEEEE"><div style="background-color: rgb(175, 238, 238);"> </div></td><td class="rte-menu-color" id="color-#ADD8E6"><div style="background-color: rgb(173, 216, 230);"> </div></td><td class="rte-menu-color" id="color-#DDA0DD"><div style="background-color: rgb(221, 160, 221);"> </div></td><td class="rte-menu-color" id="color-#FFFFFF"><div style="background-color: rgb(255, 255, 255);"> </div></td></tr></tbody></table>
              
           </div>
           
           <div class="rte-menu" onclick="rteMenu('sizes', this);" title="Change Font Size">Sizes &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo configval(2)."/"; ?>images/icon_open.gif" alt="V"></div>
           <div class="rte-menu-span hide" id="rte-menu-sizes" style="text-align: center;">
              <div class="rte-menu-item" onclick="rteSize('1');"><font size="1">1</font></div>
              <div class="rte-menu-item" onclick="rteSize('2');"><font size="2">2</font></div>
              <div class="rte-menu-item" onclick="rteSize('3');"><font size="3">3</font></div>
              <div class="rte-menu-item" onclick="rteSize('4');"><font size="4">4</font></div>
              <div class="rte-menu-item" onclick="rteSize('5');"><font size="5">5</font></div>
              <div class="rte-menu-item" onclick="rteSize('6');"><font size="6">6</font></div>
              <div class="rte-menu-item" onclick="rteSize('7');"><font size="7">7</font></div>
           </div>
         </div>
         
         <div class="right">
           <img class="cursor" alt="Preview Paste" src="<?php echo configval(2)."/"; ?>images/preview.png" id="preview">
         </div>
         <div class="clear"></div>
      </div>
      
      <div id="_pastebox">
         <textarea cols="112" rows="15" class="pastebox rounded" name="paste" id="input_text"><? echo $row['paste']; ?></textarea>
      </div>
      
      <div class="padTop10"></div>
            <div class="paste_option " id="passwordOpt" original-title="Protege tu Paste con un Password para fisgones">
               <div class="paste_opt"><span>Contrase&ntilde;a<span></div>
               <div class="paste_optd"><input type="text" class="rounded" id="paste_password" name="pass" value="<? echo $row['password']; ?>"></div>
               <div class="clear"></div>
            </div>
      <div id="paste_toolbar_bottom">
         <div class="right"><input class="btn btn-primary" onclick="return tpOnSubmit();" type="submit" value="Submit" alt="Submit"></div>
         <div class="clear"></div>
      </div>
         
      <div class="clear"></div>
      
   </form>