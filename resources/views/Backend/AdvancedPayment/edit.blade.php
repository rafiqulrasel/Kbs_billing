@extends('Backend.master')
@section("content")
    <div class="content" id="content">
        <!-- BEGIN: Top Bar -->

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">

            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button class="button text-white bg-theme-1 shadow-md mr-2" onclick="PrintElem('#customer-invoice')" id="btn-invoice" >Print</button>
                <div class="dropdown ml-auto sm:ml-0">
                    <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                        <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-4 h-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
                    </button>
                    <div class="dropdown-box w-40">
                        <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Export Word </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Export PDF </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN: Invoice -->
        <div id="customer-invoice" >
        <div class="intro-y box overflow-hidden logo">
            <div class="flex flex-col lg:flex-row   sm:px-10 sm:pt-2 lg:pb-2 text-center sm:text-left">
                <div class="font-semibold text-theme-1 dark:text-theme-10 text-3xl">INVOICE</div>
                <div class="mt-20 lg:mt-0 lg:ml-auto lg:text-right">
                    <div class="text-xl text-theme-1 dark:text-theme-10 font-medium">{{Settings::get('invoicebussnessname', 'KBS')}}</div>
                    <div class="mt-1">{{Settings::get('invoicecontact', 'kbs@gmail.com')}}</div>
                    <div class="mt-1">{{Settings::get('invoicebusinessaddress', 'Notunhat')}}</div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row border-b px-2 sm:px-20 pt-1 pb-1 sm:pb-1 text-center sm:text-left">
                <div>
                    <div class="text-base text-gray-600 ">Client Details</div>
                    <div class="text-lg font-medium text-theme-1 dark:text-theme-10 mt-2">{{$client->name}}</div>
                    <div class="ml-1">{{$client->mobile}}</div>
                    <div class="mt-1">{{$client->email}}</div>
                    <div class="mt-1">{{$building->name}},{{$floor->name}},{{$room->name}}</div>
                </div>
                <div class="ml-10">
                    <div class="mt-1">&nbsp;&nbsp;&nbsp;</div>
                    <div class="mt-1">&nbsp;&nbsp;&nbsp;</div>
                </div>

                <div class="mt-10 lg:mt-0 lg:ml-auto lg:text-right">
                    <div class="text-base text-gray-600">Receipt</div>
                    <div class="text-lg text-theme-1 dark:text-theme-10 font-medium mt-2"># {{$lastBillInfo->id}}</div>
                    <div class="mt-1">{{\Carbon\Carbon::now()->format('d M Y')}}</div>
                </div>
            </div>
            <div class="px-1 sm:px-5 py-2 sm:py-2">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">PACKAGE NAME</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-no-wrap">Month</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-no-wrap">PRICE</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-no-wrap">SUBTOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border-b dark:border-dark-5">
                                <div class="font-medium whitespace-no-wrap">{{$packagename->name}}</div>
                                <div class="text-gray-600 text-xs whitespace-no-wrap">{{$packagename->name==$client->price?"Regular Price":"Special Price"}}</div>
                            </td>
                            <td class="text-right border-b dark:border-dark-5 w-32">{{$totalMonth}}</td>
                            <td class="text-right border-b dark:border-dark-5 w-32">{{$client->price}} tk</td>
                            <td class="text-right border-b dark:border-dark-5 w-32 font-medium">{{$lastBillInfo->total_amount}} tk</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class=" sm:px-5 pb-5 sm:pb-10 flex flex-col-reverse sm:flex-row">
                <div class="text-center sm:text-left mt-10 sm:mt-0">
                    <div class="text-base text-gray-600">Bill Issue By</div>
                    <div class="text-lg text-theme-1 dark:text-theme-10 font-medium mt-2">{{Auth::user()->name}}</div>
                    <div class="mt-1">{{Auth::user()->mobile}}</div>
                    <div class="mt-1">{{Auth::user()->email}}</div>
                </div>
                <div class="text-center sm:text-right sm:ml-auto">
                    <div class="text-base text-gray-600">Total Amount</div>
                    <div class="text-xl text-theme-1 dark:text-theme-10 font-medium mt-2">{{$lastBillInfo->total_amount}} tk</div>
                </div>
            </div>
        </div>
        <!-- END: Invoice -->
        </div>
    </div>
@endsection
@section('style')
<style>
#logo{
    margin-left: 70px !important;
    margin-top: -150px !important;
    z-index: 999;
}
.logo{
    background-image: url("{{asset('backend/images/logo.png')}}");
    background-repeat: no-repeat;
    z-index: 9999;
    background-position: center;

}
@media print {
    #logo{
        margin-left: 560px !important;
    }
}
</style>
@endsection
@section('script')
<script>
    /*
        $("#btn-invoice").click(function () {

            var divToPrint=document.getElementById('customer-invoice');
            var myStyle = '<link rel="stylesheet" href="{{asset('backend/css/print.css')}}" />';
            console.log(myStyle);

            w=window.open(null, 'Print_Page', 'scrollbars=yes');
            w.document.write(myStyle + jQuery(divToPrint).html());
            w.document.close();
            w.print();
        });
*/
        function PrintElem(elem) {
            Popup(jQuery(elem).html());
        }

        function Popup(data) {
            var mywindow = window.open('', 'my div', 'height=800,width=1000');
            mywindow.document.write('<html><head><title></title>');
            mywindow.document.write('<link rel="stylesheet" href="{{asset('backend/css/app.css')}}" type="text/css" />');
            mywindow.document.write('<link rel="stylesheet" href="{{asset('backend/css/invoice.css')}}" type="text/css" />');
         //   mywindow.document.write('<style type="text/css">}}") !important } </style></head><body>');
            mywindow.document.write(data);
            mywindow.document.write('</body></html>');
            mywindow.document.close();
            mywindow.print();
        }


</script>
@endsection
