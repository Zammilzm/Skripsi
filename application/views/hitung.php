<?php
$c = $this->db->query("SELECT * FROM tb_rel_alternatif WHERE nilai < 0 ")->row();
if (!$ALTERNATIF || !$KRITERIA):
    echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
elseif ($c):
    echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
else:
    ?>
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Hasil Analisa</strong></div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead><tr>
                    <td rowspan="2">Kriteria</td>
                    <td rowspan="2">Min Maks</td>
                    <td rowspan="2">Bobot</td>
                    <td colspan="<?=count($ALTERNATIF)?>">Alternatif</td>
                    <td rowspan="2">Tipe Preferensi</td>
                    <td colspan="2">Parameter</td>
                </tr>
                <tr>
                    <?php foreach($ALTERNATIF as $key => $val):?>
                        <td><?=$val->nama_alternatif?></td>
                    <?php endforeach?>
                    <td>q</td>
                    <td>p</td>
                </tr></thead>
                <?php foreach($KRITERIA as $key => $val):?>
                    <tr>
                        <td><?=$val->nama_kriteria?></td>
                        <td><?=$val->minmax?></td>
                        <td><?=$val->bobot?></td>
                        <?php foreach($ALTERNATIF as $k => $v):?>
                            <td><?=$data[$k][$key]?></td>
                        <?php endforeach?>
                        <td><?=$val->tipe?></td>
                        <td><?=$val->par_q?></td>
                        <td><?=$val->par_p?></td>
                    </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
    <?php foreach($normal as $key => $val):?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Kriteria <?=$KRITERIA[$key]->nama_kriteria?></h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <th colspan="2"><?=$KRITERIA[$key]->nama_kriteria?></th>
                <th>a</th>
                <th>b</th>
                <th>d(jarak)</th>
                <th>|d|</th>
                <th>P (Preferensi)</th>
                <th>P (Indeks Preferensi)</th>
                </thead>
                <?php foreach($val as $k => $v):?>
                    <tr>
                        <td><?=$ALTERNATIF[$v[0]]->nama_alternatif?></td>
                        <td><?=$ALTERNATIF[$v[1]]->nama_alternatif?></td>
                        <td><?=$data[$v[0]][$key]?></td>
                        <td><?=$data[$v[1]][$key]?></td>
                        <td><?=$selisih[$key][$k]?></td>
                        <td><?=abs($selisih[$key][$k])?></td>
                        <td><?=$preferensi[$key][$k]?></td>
                        <td><?=$index_pref[$key][$k]?></td>
                    </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
<?php endforeach?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Total Indeks Preferensi</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead><tr>
                    <th colspan="2">Alternatif</th>
                    <th>Total</th>
                </tr></thead>
                <?php foreach($komposisi as $key => $val):?>
                    <tr>
                        <td><?=$ALTERNATIF[$val[0]]->nama_alternatif?></td>
                        <td><?=$ALTERNATIF[$val[1]]->nama_alternatif?></td>
                        <td><?=round($total_index_pref[$key], 4)?></td>
                    </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Perbandingan Alternatif</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead><tr>
                    <th>Alternatif</th>
                    <?php foreach($matriks as $key => $val):?>
                        <th><?=$ALTERNATIF[$key]->nama_alternatif?></th>
                    <?php endforeach?>
                    <th>Jumlah</th>
                    <th>Leaving</th>
                </tr></thead>
                <?php foreach($matriks as $key => $val):?>
                    <tr>
                        <td><?=$ALTERNATIF[$key]->nama_alternatif?></td>
                        <?php foreach($val as $k => $v):?>
                            <td><?=round($v, 4)?></td>
                        <?php endforeach?>
                        <td><?=round($total_baris[$key], 4)?></td>
                        <td><?=round($leaving[$key], 4)?></td>
                    </tr>
                <?php endforeach?>
                <tr>
                    <td>Jumlah</td>
                    <?php foreach($total_kolom as $k => $v):?>
                        <td><?=round($v, 4)?></td>
                    <?php endforeach?>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Entering</td>
                    <?php foreach($entering as $k => $v):?>
                        <td><?=round($v, 4)?></td>
                    <?php endforeach?>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Hasil Akhir</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead><tr>
                    <th>Alternatif</th>
                    <th>Leaving Flow</th>
                    <th>Entering Flow</th>
                    <th>Net Flow</th>
                    <th>Urutan</th>
                </tr></thead>
                <?php
                //print_r($net_flow);
                foreach($rank as $key => $val):
                    $this->db->query("UPDATE tb_alternatif set lf='$leaving[$key]', ef='$entering[$key]', nf='$net_flow[$key]' WHERE kode_alternatif='$key'");
                    ?>
                    <tr>
                        <td><?=$ALTERNATIF[$key]->nama_alternatif?></td>
                        <td><?=round($leaving[$key], 4)?></td>
                        <td><?=round($entering[$key], 4)?></td>
                        <td><?=round($net_flow[$key], 4)?></td>
                        <td><?=$rank[$key]?></td>
                    </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
    <?php
    arsort($net_flow);
    ?>
    <p class="text-center">
        Alternatif produk terbaik adalah <strong><?=$ALTERNATIF[key($net_flow)]->nama_alternatif?></strong> dengan total: <strong><?=round(current($net_flow), 4)?></strong><br />
        <a class="btn btn-default" href="<?=site_url('hitung/cetak')?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
    </p>
<?php endif?>
