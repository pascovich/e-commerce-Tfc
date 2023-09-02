    <div class="col-md-3">
            <div class="sidebar-nav-fixed affix">
                <div class="well">
                    <ul class="nav ">
                        <li class="nav-header"></li>
                        <!-- <li class="active"><a href="#">Link</a> -->
                        <li class="dropdown-toggle">
                          <?php if($_SESSION['TYPE']=='Administrator'){ 
                            ?>
                            <a href="<?php echo web_root; ?>admin/modules/setting/index.php"><span class="glyphicon glyphicon-cog"></span>Parametre</a>
                         <?php
                          }?>         
                        </li>
                        <li><a href="#">Link</a>
                        </li>
                        <li><a href="#">Link</a>
                        </li>
                        <li class="nav-header">Sidebar</li>
                        <li><a href="#">Link</a>
                        </li>
                        <li><a href="#">Link</a>
                        </li>
                        <li><a href="#">Link</a>
                        </li>
                         
                       
                    </ul>
                </div>
                <!--/.well -->
            </div>
            <!--/sidebar-nav-fixed -->
        </div>