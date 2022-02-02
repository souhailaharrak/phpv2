<?php
    $ancien = $_POST['a_index'];
    $nouvel = $_POST['n_index'];
    $consom = $nouvel - $ancien;
    $calibre = $_POST['calibre'];
    $tva = 0.14;
    $t1 = 0.794;
    $t2 = 0.883;
    $t3=0.9451;
    $t4=1.0489;
    $t5=1.2915;
    $t6=1.4975;
    $tim = 0.45
?>
<html>
    <head>
        <title>Facture</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <button id="btn" onclick="imprimer_page()">Imprimer</button>
        <table class="lydec_table" id="lydec_table">
            <tr>
                <td><span>Ancien index :</span> <b><?php echo $ancien; ?></b></td>
                <td><span>Nouvel inded :</span> <b><?php echo $nouvel; ?></b></td>
                <td><span>Consommation :</span> <b><?php echo $consom . ' Kwh'; ?></b></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table class="detail_table">
                        <tr>
                            <th></th>
                            <th>مفوتر <br>Facturé</th>
                            <th>س.و <br>P.U</th>
                            <th>المبلغ د.إ.ر <br>Montant HT</th>
                            <th>ص.ق.م <br>taux TVA</th>
                            <th>مبلغ الرسوم <br>Montant Taxes</th>
                            <th></th>
                        <tr>
                        <tr>
                            <td><b>CONSOMMATION ELECTRICITE</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>إستهلاك الكهرباء</b></td>
                        <tr>
                            <?php if($consom <= 150): ?>
                                <?php if($consom <= 100): ?>
                                <tr>
                                    <td>TRANCHE 1</td>
                                    <td align="center"><?php echo $consom; ?></td>
                                    <td><?php echo $t1; ?></td>
                                    <td><?php 
                                    $mt_ht1 = $t1*$consom;
                                    echo $mt_ht1; 
                                    ?></td>
                                    <td><?php echo $tva*100 . ' %'; ?></td>
                                    <td><?php
                                        $res_t1 = $t1*$consom*$tva;
                                     echo round($res_t1,2); 
                                      $trn = $res_t1;
                                      $total_ht = $mt_ht1; 
                                     ?>
                                    </td>
                                    <td>الشطر 1</td>
                                </tr>
                                <?php elseif($consom > 100): ?>
                                    <tr>
                                        <td>TRANCHE 1</td>
                                        <td><?php $rest = $consom-100; echo 100; ?></td>
                                        <td><?php echo $t1; ?></td>
                                        <td><?php
                                        $mt_ht1 = $t1*100;
                                         echo round($mt_ht1,2); 
                                         ?></td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                            $res_t1 = $t1*100*$tva;
                                            echo round($res_t1,2); ?></td>
                                        <td>الشطر 1</td>
                                    </tr>
                                    <tr>
                                        <td>TRANCHE 2</td>
                                        <td><?php echo $rest; ?></td>
                                        <td><?php echo $t2; ?></td>
                                        <td><?php 
                                        $mt_ht2 = $t2*$rest;
                                        echo round($mt_ht2,2);
                                         ?></td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                        $res_t2 = $t2*$rest*$tva;
                                        echo round($res_t2,2); 
                                        ?></td>
                                        <td>الشطر 2</td>
                                    </tr>
                                    <?php $trn = $res_t1 + $res_t2; 
                                        $total_ht = $mt_ht1 + $mt_ht2;
                                    ?>
                                <?php endif; ?>
                            <?php elseif($consom > 150): ?>
                                <?php if($consom <= 210 && $consom > 150): ?>
                                    <tr>
                                        <td>TRANCHE 3</td>
                                        <td><?php echo $consom ?></td>
                                        <td><?php echo $t3; ?></td>
                                        <td><?php 
                                        $mt_ht3 = $t3*$consom;
                                        echo round($mt_ht3,2); ?>
                                        </td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                        $res_t3 = $t3*$consom*$tva;
                                        echo round($res_t3,2); ?>
                                        </td>
                                        <td>الشطر 3</td>
                                        <?php                                                                                               
                                        $trn = $res_t3;
                                        $total_ht = $mt_ht3;
                                        ?>
                                    </tr>
                                <?php elseif($consom <= 310 && $consom > 210): ?>
                                    <tr>
                                        <td>TRANCHE 3</td>
                                        <td><?php $rest=$consom-210; echo 210; ?></td>
                                        <td><?php echo $t3; ?></td>
                                        <td><?php 
                                        $mt_ht3 = $t3*200;
                                        echo round($mt_ht3,2); ?>
                                        </td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                        $res_t3 = $t3*200*$tva;
                                        echo round($res_t3,2); 
                                        ?></td>
                                        <td>الشطر 3</td>
                                    </tr>
                                    <tr>
                                        <td>TRANCHE 4</td>
                                        <td><?php echo $rest; ?></td>
                                        <td><?php echo $t4; ?></td>
                                        <td><?php 
                                        $mt_ht4 = $t4*$rest;
                                        echo round($mt_ht4,2); ?>
                                        </td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                        $res_t4 = $t4*$rest*$tva;
                                        echo round($res_t4,2); 
                                        ?></td>
                                        <td>الشطر 4</td>
                                        <?php
                                         $trn = $res_t3 + $res_t4;
                                         $total_ht = $mt_ht3 + $mt_ht4;
                                        ?>
                                    </tr>
                                <?php elseif($consom <= 510 && $consom > 310): ?>
                                    <tr>
                                        <td>TRANCHE 4</td>
                                        <td><?php $rest = $consom - 310; echo 310; ?></td>
                                        <td><?php echo $t4; ?></td>
                                        <td><?php 
                                        $mt_ht4 = $t4*310;
                                        echo round($mt_ht4,2); ?>
                                        </td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                        $res_t4 = $t4*310*$tva;
                                        echo round($res_t4,2); ?>
                                        </td>
                                        <td>الشطر 4</td>
                                    </tr>
                                    <tr>
                                        <td>TRANCHE 5</td>
                                        <td><?php echo $rest; ?></td>
                                        <td><?php echo $t5; ?></td>
                                        <td><?php 
                                        $mt_ht5 = $t5*$rest;
                                        echo round($mt_ht5,2); ?>
                                        </td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                        $res_t5 = $t5*$rest*$tva;
                                        echo round($res_t5,2); ?>
                                        </td>
                                        <td>الشطر 5</td>
                                        <?php
                                         $trn = $res_t4 + $res_t5;
                                         $total_ht = $mt_ht4 + $mt_ht5;
                                        ?>
                                    </tr>
                                <?php elseif($consom > 511): ?>
                                    <tr>
                                        <td>TRANCHE 5</td>
                                        <td><?php $rest = $consom-510; echo 510; ?></td>
                                        <td><?php echo $t5; ?></td>
                                        <td><?php 
                                        $mt_ht5 = $t5*510;
                                        echo round($mt_ht5,2); ?>
                                        </td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                        $res_t5 = $t5*510*$tva;
                                        echo round($res_t5,2); ?>
                                        </td>
                                        <td>الشطر 5</td>
                                    </tr>
                                    <tr>
                                        <td>TRANCHE 6</td>
                                        <td><?php echo $rest; ?></td>
                                        <td><?php echo $t6; ?></td>
                                        <td><?php 
                                        $mt_ht6 = $t6*$rest;
                                        echo round($mt_ht6,2); ?>
                                        </td>
                                        <td><?php echo $tva*100 . ' %'; ?></td>
                                        <td><?php 
                                        $res_t6 = $t6*$rest*$tva;
                                        echo round($res_t6,2); ?>
                                        </td>
                                        <td>الشطر 6</td>
                                        <?php
                                         $trn = $res_t5 + $res_t6;
                                         $total_ht = $mt_ht5 + $mt_ht6;
                                        ?>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                            <tr>
                                <td><b>REDEVANCE FIXE ELECTRICITE</b></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php 
                                        if($calibre == '5-10'){
                                        $cal =  22.65;
                                        }else if($calibre == '15-20'){  
                                        $cal = 37.05;
                                        }else{
                                        $cal = 46.20;
                                        } 
                                        echo $cal;
                                    ?>
                                </td>
                                <td>14%</td>
                                <td><?php 
                                $res_cal = $cal*0.14;
                                echo round($res_cal,2); 
                                ?></td>
                                <td><b>إتاوة ثابتة الكهرباء</b></td>
                            </tr>
                            <tr>
                                <td colspan="4"><b>TAXES POUR LE COMPTE DE L'ETAT</b></td>
                                <td colspan="3"><b>الرسوم المؤداة لفائدة الدولة</b></td>
                            </tr>
                            <tr>
                                <td>TOTAL TVA</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php 
                                $total_tax = $trn+$res_cal;
                                echo round($total_tax,2); 
                                ?></td>
                                <td>مجموع ص.ق.م</td>
                            </tr>
                            <tr>
                                <td>TIMBRE</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $tim; ?></td>
                                <td>الطابع</td>
                            </tr>
                            <tr>
                                <td><b>SOUS-TOTAL</b></td>
                                <td></td>
                                <td></td>
                                <td><b><?php 
                                $total_st_ht = $total_ht+$cal;
                                echo round($total_st_ht,2); ?></b>
                                </td>
                                <td></td>
                                <td><b><?php 
                                $total_st_taxe = $total_tax+$tim;
                                echo round($total_st_taxe,2); ?></b>
                                </td>
                                <td>المجموع الجزئي</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"><b>TOTAL ELECTRICITE</b></td>
                                <td colspan="2"><b><?php echo round($total_st_ht+$total_st_taxe,2); ?></b></td>
                                <td colspan="1"><b>مجموع الكهرباء</b></td>
                            </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>

<script type="text/javascript">
        function imprimer_page(){
            const element = document.getElementById("btn");
            element.style.display = "none";
            window.print();
            element.style.display = "block";
        }
</script>