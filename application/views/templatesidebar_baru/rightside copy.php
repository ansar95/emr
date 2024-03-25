


        
<!-- START: Main Menu-->
<div class="sidebar">
            <div class="site-width">

                <!-- START: Menu-->
                <ul id="side-menu" class="sidebar-menu">
                    <li class="">
                        <ul>
                            <!-- <li><a href="index.html"><i class="icon-rocket"></i> Dashboard</a></li> -->
                            <!-- <li><a href="index-account.html"><i class="icon-layers"></i> Account</a></li> -->
							<?php
								if(isset($menusamping)){
									$this->load->view('templatesidebar/menu/'.$menusamping);
								}
			?>

                        </ul>
                    </li>
                </ul>
                <!-- END: Menu-->
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- END: Main Menu-->
