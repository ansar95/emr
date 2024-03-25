<div class="content-wrapper">
    <div class="container">
        <section class="content">
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#ffffff">
                <tr>
                    <td colspan="5">
                        <img src="<?php echo base_url(); ?>assets/img/zlogomenudalam.png" width="300px" />
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <h3>BACK OFFICE</h3>
                    </td>
                </tr>
                <?php
                $i = 0;
                echo '<tr>';
                foreach($menu as $row){
                    if ($i % 5 == 0)
                        echo "</tr><tr>";
                    echo "<td width='20%'>";
                    ?>
                    <?php
                    $id = $this->session->userdata("idx");
                    if (ceksess($row->kodemenu, $id) == TRUE && $this->session->userdata('login') == TRUE) {
                        ?>
                        <a href="<?php echo site_url();?>/<?php echo $row->link;?>">
                            <img src="<?php echo base_url(); ?>assets/img/<?php echo $row->img;?>" width="100%" />
                        </a>
                        <?php
                    }
                    echo "</td>";
                    $i++;
                }
                echo '</tr>';
                ?>
            </table>
        </section>
    </div>
</div>
