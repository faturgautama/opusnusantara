<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

class hasilKompetisiAll_xls implements \Maatwebsite\Excel\Concerns\FromView
{
  var $data;

  public function __construct($data) {
    $this->data = $data;
  }
  public function view(): View {
    $data = $this->data;
    return view('pdf.hasilkompetisi_all', $data);
  }
}


?>
