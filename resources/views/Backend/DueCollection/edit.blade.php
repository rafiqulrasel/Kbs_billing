@extends('Backend.master')
@section("content")
    <div class="content" id="content">
        <!-- BEGIN: Top Bar -->

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">

            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button class="button text-white bg-theme-1 shadow-md mr-2" id="btn-invoice" >Print</button>
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
        <div id="customer-invoice">
        <div class="intro-y box overflow-hidden mt-5">
            <div class="flex flex-col lg:flex-row pt-10 px-5 sm:px-20 sm:pt-20 lg:pb-20 text-center sm:text-left">
                <div class="font-semibold text-theme-1 dark:text-theme-10 text-3xl">INVOICE</div>
                <div class="mt-20 lg:mt-0 lg:ml-auto lg:text-right">
                    <div class="text-xl text-theme-1 dark:text-theme-10 font-medium">Left4code</div>
                    <div class="mt-1">left4code@gmail.com</div>
                    <div class="mt-1">8023 Amerige Street Harriman, NY 10926.</div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row border-b px-5 sm:px-20 pt-3 pb-3 sm:pb-3 text-center sm:text-left">
                <div>
                    <div class="text-base text-gray-600">Client Details</div>
                    <div class="text-lg font-medium text-theme-1 dark:text-theme-10 mt-2">{{$client->name}}</div>
                    <div class="mt-1">{{$client->mobile}}</div>
                    <div class="mt-1">{{$client->email}}</div>
                    <div class="mt-1">{{$building->name}},{{$floor->name}},{{$room->name}}</div>
                </div>
                <div class="mt-10 lg:mt-0 lg:ml-auto lg:text-right">
                    <div class="text-base text-gray-600">Receipt</div>
                    <div class="text-lg text-theme-1 dark:text-theme-10 font-medium mt-2">#1923195</div>
                    <div class="mt-1">{{\Carbon\Carbon::now()->format('d M Y')}}</div>
                </div>
            </div>
            <div class="px-5 sm:px-16 py-10 sm:py-20">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">DESCRIPTION</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-no-wrap">QTY</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-no-wrap">PRICE</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-no-wrap">SUBTOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border-b dark:border-dark-5">
                                <div class="font-medium whitespace-no-wrap">Midone HTML Admin Template</div>
                                <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                            </td>
                            <td class="text-right border-b dark:border-dark-5 w-32">2</td>
                            <td class="text-right border-b dark:border-dark-5 w-32">$25</td>
                            <td class="text-right border-b dark:border-dark-5 w-32 font-medium">$50</td>
                        </tr>
                        <tr>
                            <td class="border-b dark:border-dark-5">
                                <div class="font-medium whitespace-no-wrap">Vuejs Admin Template</div>
                                <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                            </td>
                            <td class="text-right border-b dark:border-dark-5 w-32">1</td>
                            <td class="text-right border-b dark:border-dark-5 w-32">$25</td>
                            <td class="text-right border-b dark:border-dark-5 w-32 font-medium">$25</td>
                        </tr>
                        <tr>
                            <td class="border-b dark:border-dark-5">
                                <div class="font-medium whitespace-no-wrap">React Admin Template</div>
                                <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                            </td>
                            <td class="text-right border-b dark:border-dark-5 w-32">1</td>
                            <td class="text-right border-b dark:border-dark-5 w-32">$25</td>
                            <td class="text-right border-b dark:border-dark-5 w-32 font-medium">$25</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="font-medium whitespace-no-wrap">Laravel Admin Template</div>
                                <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                            </td>
                            <td class="text-right w-32">3</td>
                            <td class="text-right w-32">$25</td>
                            <td class="text-right w-32 font-medium">$75</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
                <div class="text-center sm:text-left mt-10 sm:mt-0">
                    <div class="text-base text-gray-600">Bill Issue By</div>
                    <div class="text-lg text-theme-1 dark:text-theme-10 font-medium mt-2">{{Auth::user()->name}}</div>
                    <div class="mt-1">{{Auth::user()->email}}</div>
                    <div class="mt-1">Code : LFT133243</div>
                </div>
                <div class="text-center sm:text-right sm:ml-auto">
                    <div class="text-base text-gray-600">Total Amount</div>
                    <div class="text-xl text-theme-1 dark:text-theme-10 font-medium mt-2">$20.600.00</div>
                    <div class="mt-1 tetx-xs">Taxes included</div>
                </div>
            </div>
        </div>
        <!-- END: Invoice -->
        </div>
    </div>
@endsection
@section('style')

@endsection
@section('script')
<script>
        $("#btn-invoice").click(function () {
           
            var divToPrint=document.getElementById('customer-invoice');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

            setTimeout(function(){newWin.close();},10);
        });

</script>
@endsection
