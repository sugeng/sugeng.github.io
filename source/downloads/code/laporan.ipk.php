<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

function contents()
{
	return '[{
    "kode_matakuliah": "FIK101",
    "nama_matakuliah": "PENDIDIKAN PANCASILA",
    "sks": "2",
    "nilai": "E",
    "semester": "20121",
    "bobot": "0.00",
    "nxk": "0.00"
  },
  {
    "kode_matakuliah": "FIK103",
    "nama_matakuliah": "ILMU ALAMIAH DASAR",
    "sks": "2",
    "nilai": "E",
    "semester": "20121",
    "bobot": "0.00",
    "nxk": "0.00"
  },
  {
    "kode_matakuliah": "FIK105",
    "nama_matakuliah": "ILMU BUDAYA DASAR",
    "sks": "2",
    "nilai": "E",
    "semester": "20121",
    "bobot": "0.00",
    "nxk": "0.00"
  },
  {
    "kode_matakuliah": "FIK107",
    "nama_matakuliah": "PENGANTAR ILMU POLITIK",
    "sks": "3",
    "nilai": "E",
    "semester": "20121",
    "bobot": "0.00",
    "nxk": "0.00"
  },
  {
    "kode_matakuliah": "FIK109",
    "nama_matakuliah": "PENGANTAR ILMU KOMUNIKASI",
    "sks": "3",
    "nilai": "E",
    "semester": "20121",
    "bobot": "0.00",
    "nxk": "0.00"
  },
  {
    "kode_matakuliah": "FIK111",
    "nama_matakuliah": "DASAR DASAR LOGIKA",
    "sks": "3",
    "nilai": "E",
    "semester": "20121",
    "bobot": "0.00",
    "nxk": "0.00"
  },
  {
    "kode_matakuliah": "FIK113",
    "nama_matakuliah": "PENGANTAR SOSIOLOGI",
    "sks": "3",
    "nilai": "E",
    "semester": "20121",
    "bobot": "0.00",
    "nxk": "0.00"
  }]';
}

function contentHeader()
{
	return '{ "nim":"201241002", "jurusan":"ILMU KOMUNIKASI","nama":"LUKE SKYWALKER","batas_studi":"20182","dosen_pembimbing":"YODA","nilai_ipk":"0.00","sks_total":"18"}';
}

function createFile()
{

	// Variable..
	$json   = contents();
	$header = json_decode(contentHeader());
	$_lf  = "\n";
  	$line = str_pad('-', 94, '-') . $_lf;

  	// HEADER LAPORAN
	$hdr  = str_pad("*** Rekapitulasi History Nilai ***", 94, ' ', STR_PAD_BOTH) . $_lf.$_lf;

	$hdr .= str_pad("NIM & NAMA", 15, ' ') .str_pad(":", 2, ' ') . str_pad($header->nim .' '. $header->nama 			, 87, ' ', STR_PAD_RIGHT).$_lf;
	$hdr .= str_pad("JURUSAN", 15,' ') . 	str_pad(":", 2, ' ') . str_pad($header->jurusan 							, 87, ' ', STR_PAD_RIGHT).$_lf;
	$hdr .= str_pad("BATAS STUDI", 15,' ') .str_pad(":", 2, ' ') . str_pad($header->batas_studi  						, 87, ' ', STR_PAD_RIGHT).$_lf;
	$hdr .= str_pad("P.A.", 15,' ') . 		str_pad(":", 2, ' ') . str_pad($header->dosen_pembimbing					, 87, ' ', STR_PAD_RIGHT).$_lf;
	$hdr .= $line;

	// TITLE
	$hdr .= str_pad('NO. ', 6) .
			str_pad('MATAKULIAH', 45) .
			str_pad('SKS', 7) .
			str_pad('SEMESTER', 9) .
			str_pad('NILAI', 9) .
			str_pad('BOBOT', 11) .
			str_pad('NxK', 5) . $_lf;

	$hdr .= $line;

  	foreach(json_decode($json) as $row) {
  		$n++;
  		$hdr .= str_pad($n.'.', 				6) .
	      		str_pad($row->kode_matakuliah, 	8) .
	      		str_pad($row->nama_matakuliah, 	39).
	      		str_pad($row->sks, 				7) .
	      		str_pad($row->semester, 		9) .
	      		str_pad($row->nilai, 			4) .
				str_pad($row->bobot, 			8, ' ', STR_PAD_LEFT) .
				str_pad($row->nxk, 				9, ' ', STR_PAD_LEFT) .
      		$_lf;
  	}

  	$hdr .= $line;
	$hdr .= str_pad("IPK  " . number_format($header->ipk, 2),	37,	' ',	STR_PAD_LEFT) .
			str_pad($header->sks_total ,	17,' ',STR_PAD_LEFT).
			str_pad($header->nxk 	   ,	35,' ',STR_PAD_LEFT).$_lf;

	$hdr .= $line;
	$hdr .= str_pad("Dicetak oleh : Hans Solo", 20, ' ') . str_pad("Dicetak Tgl : " . date('d-m-Y'), 60,' ', STR_PAD_LEFT).$_lf.$_lf;
	$hdr .= chr(12);

	// Force download
  	header('Content-disposition: attachment; filename=laporan_ipk.txt');
	header('Content-type: text/plain');

	echo $hdr;
}

// Jalankan fungsi
createFile();
?>