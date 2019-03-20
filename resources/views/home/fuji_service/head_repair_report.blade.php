@extends('layouts.admin')
@section('title') Detail @endsection
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-6"> 
                            <div class="row">
                               
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <a href="{{ url('admin/fujiservice/head-repair-report',[$fuji_service->id]) }}" id="sample_editable_1_2_new" class="btn sbold green"> Export
                                    </a>
                                </div>
                            </div>
                    </div>
            <!-- BEGIN PAGE CONTENT INNER -->
            <table style="width:100%;font-family: Arial;font-size: 15px;border: 1px solid black;border-collapse:collapse">
                <tr>
                    <td rowspan="4" style="border-style:none">Name</td>
                    <td colspan="4" style="font-weight:bold;font-size:25px;color: #394260;border-bottom-style:none;border-left-style:none;padding:2px;text-align:center ">
                        FUJI MACHINE VIETNAM CO., LTD.</td>
                </tr>
                <tr>
                    <td colspan="6" rowspan="3" style="color: #394260;font-weight:bold; padding-left:30px;border-bottom-style:none;border-left-style:none;border-top-style:none;text-align: left">
                        1st and 2nd Floor, 3D Center Building, No.3 Duy Tan,<br>
                        Dich Vong Hau Ward, Cau Giay District, Hanoi City, Vietnam<br>
                        Website: https://smt3.fuji.co.jp - Tax Code: 0105983244<br>
                        TEL: (84-24) 37955323 FAX: (84-24) 37955324
                    </td>
                </tr>
                <tr> </tr>
                <tr ></tr>
                <tr>
                    <td colspan="8" style="font-weight:bold;font-size:25px;text-align:center;border-style:none;padding: 10px">HEAD REPAIR REPORT</td>
                </tr>
            
                <tr>
                    <td colspan="5" style="font-weight:bold;background-color:#f2f2f2">A. HEAD AND ENGINEER INFORMATION</td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td>CTL</td>
                    <td>-</td>
                    <td>HRR No:</td>
                    <td>HRR180002</td>
                </tr>
                <tr>
                    <td>Head Type:</td>
                    <td>V12</td>
                    <td>-</td>
                    <td>Done by:</td>
                    <td>C.N Quan</td>
                </tr>
                <tr>
                    <td>Head SNo.:</td>
                    <td>HZ0D1 006883</td>
                    <td>-</td>
                    <td>Date</td>
                    <td>5/Mar/2018</td>
                </tr>
            
                <tr>
                    <td colspan="5" style="font-weight:bold;background-color:#f2f2f2">B. JOB DETAIL</td>
                </tr>
                <tr>
                    <td rowspan="3">Problem:</td>
                    <td rowspan="3" colspan="4">-IPS NG, Head handle broken<br>-<br>-</td>
            
                </tr>
                <tr></tr>
                <tr></tr>
            
                <tr>
                    <td rowspan="4">Invest result<br>& cause:</td>
                    <td rowspan="4" colspan="4">-Machine show error code (IPS error)  when run hybrid at PAM mode<br>-<br>-<br>-<br>-</td>
            
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
            
                <tr>
                <tr>
                    <td rowspan="6">Repair details:</td>
                    <td rowspan="6" colspan="4">-Do running hybrid calibration, PAM, Iddle<br>-<br>-<br>-<br>-<br>-</td>
            
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                <td colspan="8" style="font-weight:bold;background-color:#f2f2f2">C. REPLACEMENT PART</td>
                </tr>
                <tr>
                    <td>Part Number:</td>
                    <td>Part name</td>
                    <td>Description</td>
                    <td>Q'ty</td>
                    <td>Remark</td>
                </tr>
                @foreach($list as $key=>$it)
                <tr>
                     <td>{{ $key+1 }}</td>
                     <td>{{$it->name}} </td>
                     <td>{{$it->quantity}}</td> 
                     <td>{{ number_format( $it->price ) }}</td> 
                     <td>{{ number_format( $it->amount ) }}</td>
                </tr>
                @endforeach
            
                <tr>
                    <td colspan="5" style="font-weight:bold;border-style:none"><br><br><br>D. FUNCTIONALITY CHECK</td>
                </tr>
                <tr>
                    <td colspan="3">Test Conducted:</td>
                    <td>Status</td>
                    <td>Personel:</td>
                </tr>
                <tr>
                    <td>Auto Calibration</td>
                    <td colspan="2">- Run auto calibration</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Holders & Gear smooth</td>
                    <td colspan="2">- Check all holder & gear movement or no abnormal sound</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nozzle check sensor</td>
                    <td colspan="2">- Nozzle check sensor alighment</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>IPS</td>
                    <td colspan="2">- IPS function (if applicable)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Auto Backup Pin</td>
                    <td colspan="2">- Test auto backup pin function (if applicable)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Touch sensor</td>
                    <td colspan="2">- Test all touch sensor of head (if applicable)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Part drop sensor</td>
                    <td colspan="2">- Test all part drop sensor of head (if applicable)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Idle Run/VT253 idle</td>
                    <td colspan="2">- Run Idle the placing head (VT253 idle with POP head)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Placement test</td>
                    <td colspan="2">- Production using Fuji 96-001 board on double side tape</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Pam test</td>
                    <td colspan="2"- Perform PAM test></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            

            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->

@endsection