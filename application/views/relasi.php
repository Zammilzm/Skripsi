<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Rincian Nilai Lahan</h4>
                <p class="category">Berikut adalah rincian nilai lahan yang akan dihitung dan dibandngkan</p>
            </div>
            <div class="card-content table-responsive">
                <?= form_open('relasi', array('class' => 'form-inline', 'method' => 'get')) ?>
                <input class="form-control" name="search" value="<?= $this->input->get('search') ?>"
                       placeholder="Pencarian"/>
                </form>
                <div class="oxa">
                    <?php
                    $relasi = array();
                    foreach ($rows as $row) {
                        $alternatif[$row->kode_alternatif] = $row->nama_alternatif;
                        $relasi[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
                    }
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <?php
                            $first = array_values($relasi);
                            foreach ($first[0] as $key => $val):?>
                                <th><?= $key ?></th>
                            <?php endforeach ?>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <?php foreach ($alternatif as $key => $value): ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                                <?php foreach ($relasi[$key] as $val): ?>
                                    <td><?= $val ?></td>
                                <?php endforeach ?>
                                <td class="nw">
                                    <a class="btn btn-xs btn-warning" href="<?= site_url("relasi/ubah/$key") ?>">
                                        <i class="material-icons">edit</i> Edit
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>