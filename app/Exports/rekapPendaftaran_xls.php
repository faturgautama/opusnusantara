<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

class rekapPendaftaran_xls implements \Maatwebsite\Excel\Concerns\FromView
{
  var $data;

  public function __construct($data) {
    $this->data = $data;
  }
  public function view(): View {
    $data = $this->data;
    return view('pdf.rekap_all', $data);
  }
}


?>
