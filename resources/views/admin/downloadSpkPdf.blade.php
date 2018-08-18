<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>SPK</title>
    </head>
    <body>
        <b>
            <u>Data SPK</u>
        </b>
        <hr>
        <table class="" cellspacing="0" border="1">
            <tbody>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="3"
                        rowspan="2">
                        <nobr>DETAIL WORK ORDER</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#fff;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="5">

                        <?php
                          $path = public_path('image/'.$partner->foto_partner);
                          $type = pathinfo($path, PATHINFO_EXTENSION);
                          $data = file_get_contents($path);
                          $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                        <nobr>
                          <img style=" width: 180px; height:80px; margin-top:15px; " src="{{ $path }}" alt="{{$partner->foto_partner}}">
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>No. SPK</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="2">
                        <nobr>
                          {{$tampilPdf->no_spk}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Tanggal SPK</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="2">
                        <nobr>
                          {{date('d-m-Y', strtotime($tampilPdf->tgl_spk))}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Jenis</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="2">
                        @php
                          if ($tampilPdf->jenis_spk == 'PM') {
                            $alias = 'Preventive Maintenance';
                          } elseif ($tampilPdf->jenis_spk == 'CM') {
                            $alias = 'Corrective Maintenance';
                          } elseif ($tampilPdf->jenis_spk == 'Pasang') {
                            $alias = 'Pasang';
                          } elseif ($tampilPdf->jenis_spk == 'Tarik') {
                            $alias = 'Tarik';
                          }
                        @endphp
                        <nobr>
                          {{$alias}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="4"
                        rowspan="2">
                        <nobr>BASIC INFORMATION MERCHANT</nobr>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Nama</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->nama_merchant}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>TID</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->tid}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Alamat</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->alamat_merchant}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>MID</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->mid}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Kota</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->kota_mso}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Instruksi</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->perintah_spk}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="4"
                        rowspan="2">
                        <nobr>KELENGKAPAN FOTO DAN TANDA TANGAN HASIL KUNJUNGAN</nobr>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#fff;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="2"
                        rowspan="8">
                        <nobr>
                          <img style=" width: 300px; height:150px; margin-top:30px;;" src="{{public_path('image/'.$tampilPdf->foto_1)}}" alt="{{$tampilPdf->foto_1}}" >
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#fff;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="2"
                        rowspan="8">
                        <nobr>
                          <img style=" width: 300px; height:150px; margin-top:30px;" src="{{public_path('image/'.$tampilPdf->foto_2)}}" alt="{{$tampilPdf->foto_2}}" >
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="4"
                        rowspan="2">
                        <nobr>INFORMASI TERMINAL</nobr>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Merk &amp; Type EDC</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->jenis_edc}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Provider</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->provider}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Type Komunikasi</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->tipe_komunikasi}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>No. Simcard</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->nmr_simcard}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>SN EDC</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->sn_edc}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>SN Simcard</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->sn_simcard}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="2"
                        rowspan="2">
                        <nobr>STANDAR CEK FISIK</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="2"
                        rowspan="2">
                        <nobr>STANDAR CEK EDC</nobr>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Adaptor</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->adaptor}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Nama Sesuai Lokasi</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->nama_sesuai_lokasi}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>EDC</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->edc}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Alamat Sesuai Lokasi</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->alamat_sesuai_lokasi}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Sticker EDC</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->stiker}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>TID &amp; MID Sesuai struk transaksi</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->tid_mid_sesuai}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="4"
                        rowspan="2">
                        <nobr>STANDARISASI CHECKLIST PENGECEKAN KONDISI FISIK EDC DI LINGKUNGAN MERCHANT</nobr>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="2">
                        <nobr>Test Transaksi (Satuan Detik)</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="2">
                        <nobr>Debit</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="2">
                        <nobr>Kredit</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="2">
                        <nobr>Prepaid</nobr>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Respon Time</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->test_debit}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->test_kredit}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->test_prepaid}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        colspan="4">
                        <nobr>SUPPLY THERMAL</nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Saldo Awal</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->thermal_awal}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border-right:1px solid;border-top:1px solid;border-bottom:1px solid;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Drop</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->thermal_drop}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border-left:1px solid;border-right:1px solid;border-top:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;min-width:50px">
                        <nobr>Saldo Akhir</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border-left:1px solid;border-right:1px solid;border-top:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->thermal_akhir}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;min-width:50px">
                        <nobr>&nbsp;</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border-right:1px solid;border-top:1px solid;border-bottom:1px solid;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>&nbsp;</nobr>
                    </td>
                </tr>

                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>PIC MERCHANT</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->pic_merchant}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>STATUS PEKERJAAN</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->status_spk}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="2">
                        <nobr>NAMA MSO / TEKNISI</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="2">
                        <nobr>
                          {{$karyawan->nama_karyawan}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Tanggal Jam Kunjungan</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Tanggal Jam Selesai</nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{date('d-m-Y H:i', strtotime($tampilPdf->tgl_pengerjaan))}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{date('d-m-Y H:i', strtotime($tampilPdf->updated_at))}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>Jenis Tindakan</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border-left:1px solid;border-top:1px solid;border-bottom:1px solid;border-left-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>
                          {{$tampilPdf->status_pengerjaan}}
                        </nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;background-color:#969696;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="2">
                        <nobr>Keterangan</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;text-align:center;font-size:11px;color:#000000;font-weight:bold;border:1px solid;border-left-color:#000000;border-right-color:#000000;border-top-color:#000000;border-bottom-color:#000000;min-width:50px"
                        rowspan="2">
                        <nobr>
                          {{$tampilPdf->keterangan_spk}}
                        </nobr>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border-left:1px solid;border-bottom:1px solid;border-left-color:#000000;border-bottom-color:#000000;min-width:50px">
                        <nobr>&nbsp;</nobr>
                    </td>
                    <td
                        style="font-family:Calibri;font-size:11px;color:#000000;font-weight:bold;border-bottom:1px solid;border-bottom-color:#000000;min-width:50px">
                        <nobr>&nbsp;</nobr>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
    </body>
</html>
