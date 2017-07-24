<br>
   <div class="controlTabs">
            <div class="row">
                <div class="col s12">

                    <ul id="tabsn" class="tabs tabsTa centrartab blue darken-1 ">
                        
                           

                       
                        <div class="centrarlip">
                            <?php
 
							$class="";
							$class1="";
							$menu1="";
							$menu2="";
							$cont=0;
							$script2="
							
							$('#menuOculto').click(function(){
								";
							$script="";
							for($i=0;$i<=$_SESSION['SOFT_MODULO_NUM'];$i++)
							{
								
								if($_SESSION['SOFT_MODULO_REF'][$i]==$_SESSION['SOFT_NAV'])
								{
									$class="blue darken-4";
									if($_SESSION['SOFT_MODULO_TIPO'][$i]==1)
									{
										$class1="blue darken-4";
									}
								}
								else
								{
									$class="";
								}
								
								if($_SESSION['SOFT_MODULO_TIPO'][$i]==1)
								{
									$cont++;
									$menu2.='<li class="centrarli"><a id="'.$_SESSION['SOFT_MODULO_REF'][$i].'" href="#" class="blue darken-1 btn white-text tamatabsa '.$class.'"><i class="material-icons left"><img class="iconotab" src="'.$_SESSION['SOFT_MODULO_DIR'][$i].'" /></i>'.$_SESSION['SOFT_MODULO'][$i].'</a></li>';
									$script.='$(\'#'.$_SESSION['SOFT_MODULO_REF'][$i].'\').toggle();
									';
								}
								else
								{
								
								$menu1.='<li class="centrarli"><a id="'.$_SESSION['SOFT_MODULO_REF'][$i].'" href="#" class="blue darken-1 btn white-text tamatabsa '.$class.'"><i class="material-icons left"><img class="iconotab" src="'.$_SESSION['SOFT_MODULO_DIR'][$i].'" /></i>'.$_SESSION['SOFT_MODULO'][$i].'</a></li>';
								}
							}
						echo $menu1;
						if($cont>1)
						{
							?>
                     <li class="centrarli">
                   <a  id="menuOculto" class="blue darken-1 btn  white-text tamatabsa <?php echo $class1; ?>" href="#!" onClick="if($('.subM').css('display')=='none'){$('.subM').css('display','block')}else{$('.subM').css('display','none')};<?php //echo $script;?>"><i class="material-icons left"><img class="iconotab" src="../app/img/plus.png" /></i>Mas</a>
                   </li>
                  <div class="subM  ">
                            <?php
							echo $menu2;
							?>
                            </div>
                            <?php
							//echo "<script>".$script."});/script>";
						}
						  ?>
                          
                          
                            <!-- <div class="indicator blue" style="z-index:1"></div>  -->
                        </div>
                    
                    </ul>
                    
                </div>

            </div>
        </div> 