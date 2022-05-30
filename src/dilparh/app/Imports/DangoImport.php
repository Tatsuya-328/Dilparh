<?php
namespace App\Imports;

use App\Models\Dango;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DangoImport implements ToModel, WithHeadingRow
{
  public function model(array $row)
  {
    return new Dango([
      'id'=>$row['word_ID'],
      'word_level'=>$row['word_level'],
      'word_urdu'=>$row['WordUrdu'],
      'urudu_pronunciation'=>$row['UrduPronunciation'],
      'hinshi'=>$row['Hinshi'],
      'gogen'=>$row['gogen'],
      'japanese'=>$row['Japanese'],
    ]);
  }

}
?>