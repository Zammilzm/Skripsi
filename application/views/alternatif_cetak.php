<h1>Laporan Alternatif</h1>
<table>
<thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Alternatif</th>
        <th>Keterangan</th>
    </tr>
</thead>
<?php    
$no=0;
foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td><?=$row->kode_alternatif?></td>
    <td><?=$row->nama_alternatif?></td>
    <td><?=$row->keterangan?></td>
</tr>
<?php endforeach;?>
</table>