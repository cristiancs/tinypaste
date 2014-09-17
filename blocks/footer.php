 <div id="footer">
          <div id="footer_bar">
          <div id="footer_pad">
             <div class="left" id="user_links">· 
              <?php if(!$_SESSION['id']) { ?>
<b><a href="<?php echo configval(2)."/"; ?>login">Login</a></b> ·<b><a href="<?php echo configval(2)."/"; ?>registrar">Registrar</a></b> ·             </div>
<?php }
else{  ?>
<b><a href="<?php echo configval(2)."/"; ?>admin">Administrar Pastes</a></b> ·<b>Bienvenido <?php echo $_SESSION['username'] ?></b> · <a href="<?php echo configval(2)."/"; ?>myaccount">Mi cuenta</a> · <a href="<?php echo configval(2)."/"; ?>logout.php">Salir</a> ·  </div>
<?php } ?>
             <div class="right" id="copyright">© <?php echo date(Y) ?> - <?php echo configval(3); ?></div>
             <div class="right" id="footer_links">
                <a target="_Blank" href="<?php echo configval(5); ?>"><?php echo configval(4); ?></a> ·
                             </div>
             <div class="clear"></div>
                 
          </div>
          </div>
       </div>