{{--@extends('layouts.dashboard.app')--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
{{--<script src="https://www.position-absolute.com/creation/print/jquery.printPage.js" ></script>--}}
{{--@section('content')--}}

{{--    <div id='DivIdToPrint' class="page-wrapper" style="min-height: 422px;" data-select2-id="16">--}}
{{--        <div class="content container-fluid" data-select2-id="15">--}}

{{--            <!-- Page Header -->--}}
{{--            <div class="page-header">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <h3 class="page-title">@lang('site.cards')</h3>--}}
{{--                        <ul class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a--}}
{{--                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</li>--}}
{{--                            <li class="breadcrumb-item"><a--}}
{{--                                    hhref="{{ route('dashboard.cards.index') }}"> @lang('site.cards') </a></li>--}}
{{--                            <li class="breadcrumb-item active"><a> @lang('site.show') </a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /Page Header -->--}}


{{--            <div class="row" data-select2-id="14">--}}


{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="card-title">@lang('site.cards')</h4>--}}
{{--                            @include('partials._errors')--}}

{{--                            <div class="row">--}}
{{--                                <label for="name" class="col-sm-3 col-form-label input-label">@lang('site.image')</label>--}}
{{--                                <div class="col-sm-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <label class="avatar avatar-xxl profile-cover-avatar m-0" for="edit_img">--}}
{{--                                            <img   src="{{asset('uploads/'.$card->citizen->image)}}" alt="Profile Image">--}}

{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label>@lang('site.fullname')</label>--}}
{{--                                            <input type="text" name="card_number" class="form-control"--}}
{{--                                                   value="{{ $card->citizen->first_name ?? ''}}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>@lang('site.jobs')</label>--}}
{{--                                            <input type="text" name="place_issue" class="form-control"--}}
{{--                                                   value="{{ $card->citizen->job->name ??''}}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>@lang('site.tripes')</label>--}}
{{--                                            <div id="result">--}}
{{--                                                <input type="text"  class="form-control"--}}

{{--                                                       value="{{ $card->citizen->tripe->name ??''}}"--}}
{{--                                                >--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label>@lang('site.address')</label>--}}
{{--                                            <input type="text" name="address" class="form-control" value="{{ $card->citizen->addresses->first()->address1 ?? ''}}">--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label>@lang('site.start date')</label>--}}
{{--                                            <input type="date" name="expiry_date" class="form-control date" value="{{ $card->date_of_issue}}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>@lang('site.end date')</label>--}}
{{--                                            <input type="date" name="expiry_date" class="form-control date" value="{{ $card->expiry_date}}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>@lang('site.place_issue')</label>--}}
{{--                                            <input type="text" name="place_issue" class="form-control" value="{{ $card->place_issue}}">--}}
{{--                                        </div>--}}


{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="text-end mt-4">--}}
{{--                                    <div class="form-group">--}}

{{--                                        <button id='btn' value='Print' onclick='printDiv();'class="btn btn-primary btnprint"><i--}}
{{--                                                class="fa fa-print"></i>--}}
{{--                                            @lang('site.print')</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('scripts')--}}

{{--    <script>--}}
{{--        function printDiv()--}}
{{--        {--}}

{{--            var divToPrint=document.getElementById('DivIdToPrint');--}}

{{--            var newWin=window.open('','Print-Window');--}}

{{--            newWin.document.open();--}}

{{--            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');--}}

{{--            newWin.document.close();--}}

{{--            setTimeout(function(){newWin.close();},100);--}}

{{--        }--}}
{{--// $(document).ready(function () {--}}
{{--//     console.log('rrrrrrrrrrrrrr')--}}
{{--// $('.btnprint').windows.print();--}}
{{--// });--}}

{{--    </script>--}}
{{--    @endsection--}}


<?php

// require_once __DIR__ . '/vendor/autoload.php';

// autoload.php @generated by Composer
use Spipu\Html2Pdf\Html2Pdf;
// $html2pdf = new Html2Pdf();
// $html2pdf = new HTML2PDF('L', 'A4', 'en');
// 86mm x 54mm
$width_in_inches = 86;
$height_in_inches = 54;



// $width_in_mm = $width_in_inches * 25.4;
// $height_in_mm = $height_in_inches * 25.4;

$html2pdf = new HTML2PDF('L', array($width_in_inches, $height_in_inches), 'en', true, 'UTF-8', array(0, 0, 0, 0));
//$html2pdf->setDefaultFont('aealarabiya');
// ---------------------------------------------------------

// set font


//$html2pdf->SetFontSize(10);
//$html2pdf->setDefaultFont('aefurat', '', 12);

// $html2pdf->setDefaultFont('dejavusans', '', 12);
//$html2pdf->setDefaultFont('aealarabiya');
//   $html2pdf->addFont('Amiri', '',  base_path('public/fonts/Amiri.php'));

$html2pdf->pdf->SetDisplayMode('real');


//$my_html = "<style>" . file_get_contents(__DIR__ . '/style.css') . "</style>";

$my_html = "<style>" . file_get_contents(base_path('public/css/style.css')) . "</style>";

$html2pdf->WriteHTML($my_html);
// $html2pdf->setModeDebug();

$html2pdf->writeHTML('
            <img class="background-image" src="'.'uploads/ecardbg.png'.'" alt="">

                <div class="left-div" style="font-size:5px; line-height: 1;">


                        <div class="flex items-center">
                        <img style="height: 80px; margin-left:15px;; margin-top:55px;" src="' . 'uploads/' . $card->citizen->image . '" alt="" width="75">
                        </div>

                        <!-- <img class="mx-auto" src="signature.png" alt="" width="45"
                        style="margin-left:20px; margin-top: 5px;">-->
                        <br>
                        <br>
                        <!-- <span class="mx-auto text-center block" style="margin-left: 20px;">التوقيع</span> -->

                    </div>
                    <div class="right-div" style="padding-left: 70px">

                    <div class="info" style="font-family: freeserif; text-align: right; font-size: 9pt;">
                    <span class="capitalize">' . $card->citizen->first_name . '</span><br>

                    <span class="text-md">الأم: ' . $card->citizen->mother_name_ar . '</span><br>

                    <span class="text-md">الصفة: ' . $card->citizen->adjective->name. '</span><br>

                    <span class="text-md">العشيرة:' . $card->citizen->tripe->name . '</span><br>
                    <span class="text-md">العنوان: ' . $card->citizen->addresses->first()->address1 . '</span><br>
                    <span class="text-md">محل وتاريخ الميلاد: ' . $card->citizen->place_of_birth." ". Carbon\Carbon::parse($card->citizen->birth_date)->format('Y') . '  </span><br>
                    <span class="text-md">تاريخ الاصدار: ' . Carbon\Carbon::parse($card->date_of_issue)->format('Y-m-d') . '</span><br>
                     <span class="text-md">الرقم : ' . $card->card_number . '</span>


                  <!--
                    <span class="text-md">تاريخ الانتهاء: ' . Carbon\Carbon::parse($card->expiry_date)->format('Y-m-d') . '</span><br>
                    -->
                    </div>
                </div>
               <img class="background-image" src="'.'uploads/card.jpeg'.'" alt="">


                <div class="left-div" style="font-size:5px; line-height: 1;" style="">




                        <!-- <img class="mx-auto" src="signature.png" alt="" width="45"
                        style="margin-left:20px; margin-top: 5px;">-->
                        <br>
                        <br>
                        <!-- <span class="mx-auto text-center block" style="margin-left: 20px;">التوقيع</span> -->

                    </div>
                    <div class="new-div" style="padding-left: 1px; >

                    <div class="info" style="font-family: freeserif;  text-align: left; font-size: 7pt; ">

                    <table align="center">
                      <tr>
                         <th colspan="2">' .  $card->citizen->first_name_en.' ' .''.$card->citizen->second_name_en.' ' .''.$card->citizen->third_name_en.' ' .''.$card->citizen->fourth_name_en. '</th>
                      </tr>
                      <tr>
                        <td class="a">Mothers name(Anne):
                        </td>
                        <td>' . $card->citizen->mother_name_en . '</td>
                      </tr>
                      <tr>
                        <td class="a">Tribe(kabile):</td>
                        <td>' . $card->citizen->tripe->name_en . '</td>
                      </tr>

                       <tr>
                        <td class="a">Place of residence<br>(adres):</td>
                        <td> ' . $card->citizen->addresses->first()->address1 . '</td>
                      </tr>

                      <tr>
                        <td class="a">Place and birth date:<br>(Doğum yeri ve tarihi):</td>
                        <td>' . $card->citizen->place_of_birth." ". Carbon\Carbon::parse($card->citizen->birth_date)->format('Y') . '</td>
                      </tr>
                      <tr>
                        <td class="a">issuance date:<br>(düzenleme tarihi):</td>
                        <td> ' . Carbon\Carbon::parse($card->date_of_issue)->format('Y-m-d') . '</td>
                      </tr>

                    </table>


                    </div>
                </div>

');
//$html2pdf->output('myPdf.pdf');
ob_end_clean();
//$html2pdf->Output('I');
$html2pdf->Output('doc.pdf', 'I')
?>
