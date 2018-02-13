<div class="panel panel-default">
    <div class="panel-heading">
        <?=form_open('relasi', array('class'=>'form-inline', 'method'=>'get'))?>
            <input class="form-control" name="search" value="<?=$this->input->get('search')?>" placeholder="Pencarian" />
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>            
        </form>        
    </div>
    <div class="oxa">
        <?php           
            $relasi = array(); 
            foreach ($rows as $row) {                
                $alternatif[$row->kode_alternatif] = $row->nama_alternatif;
                $relasi[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;                
            }                                
        ?>
        <table class="table table-bordered table-hover table-striped">
            <thead><tr>
                <th>Kode</th>
                <th>Nama</th>
                <?php 
                $first = array_values($relasi);
                foreach ($first[0] as $key => $val):?>
                    <th><?=$key?></th>
                <?php endforeach ?>
                <th>Aksi</th>
            </tr></thead>    
            <?php foreach ($alternatif as $key => $value):?>
            <tr>
                <td><?=$key?></td>
                <td><?=$value?></td>
                <?php foreach ($relasi[$key] as $val):?>
                    <td><?=$val?></td>
                <?php endforeach ?>
                <td class="nw">
                    <a class="btn btn-xs btn-warning" href="<?=site_url("relasi/ubah/$key")?>"><span class="glyphicon glyphicon-edit"></span></a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
</div>