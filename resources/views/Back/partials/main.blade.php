   @extends('Back.index')
   @section('content')
   <div class="container-fluid site-width">
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4> <p>Welcome to liner admin panel</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="icon-basket icons card-liner-icon mt-2"></i>
                        <div class='card-liner-content'>
                            <h2 class="card-liner-title">2,390</h2>
                            <h6 class="card-liner-subtitle">Today's Orders</h6>
                        </div>
                    </div>
                    <div id="apex_today_order"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="icon-user icons card-liner-icon mt-2"></i>
                        <div class='card-liner-content'>
                            <h2 class="card-liner-title">9,390</h2>
                            <h6 class="card-liner-subtitle">Today's Visitors</h6>
                        </div>
                    </div>
                    <span class="bg-primary card-liner-absolute-icon text-white card-liner-small-tip">+4.8%</span>
                    <div id="apex_today_visitors"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="icon-bag icons card-liner-icon mt-2"></i>
                        <div class='card-liner-content'>
                            <h2 class="card-liner-title">$4,390</h2>
                            <h6 class="card-liner-subtitle">Today's Sale</h6>
                        </div>
                    </div>
                    <div id="apex_today_sale"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <span class="card-liner-icon mt-1">$</span>
                        <div class='card-liner-content'>
                            <h2 class="card-liner-title">$4,390</h2>
                            <h6 class="card-liner-subtitle">Total Profit</h6>
                        </div>
                    </div>
                    <div id="apex_today_profit"></div>
                </div>
            </div>
        </div>
        <div class="col-12  mt-3" >
                        <div class="card" style="background-image: url({{asset('Front/image/za.jpg')}});
                 background-repeat: no-repeat; background-size: cover;">                            
                            <div class="card-content">
                                <div class="card-body p-4">   
                                    <div class="d-md-flex">
                                        
                                        <div class="content px-md-3 my-3 my-md-0">                                           
                                            <h1 class="mb-0 font-w-600 h5" style="color:#A52A2A ;">Numéro 1 des petites annonces<br> en Mauritanie</h1><br>
                                            <p>Des bonnes affaires proches de chez vous</p>

                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
        <div class="col-12 col-lg-8  mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div id="apex_mixed_chart" class="height-500"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title">New Users</h6>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <ul class="list-group list-unstyled">
                            <li class="p-2 border-bottom">
                                <div class="media d-flex w-100">
                                    <a href="#"><img src="dist/images/author1.jpg" alt="" class="img-fluid ml-0 mt-2  rounded-circle" width="40"></a>
                                    <div class="media-body align-self-center pl-2">
                                        <span class="mb-0 font-w-600">Jonathan</span><br>
                                        <p class="mb-0 font-w-500 tx-s-12">San Francisco, California, USA</p>
                                    </div>
                                    <div class="ml-auto my-auto">
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Mark as unread"><i class="icon-envelope"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Save as draft"><i class="icon-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Delete Email"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="p-2 border-bottom">
                                <div class="media d-flex w-100">
                                    <a href="#"><img src="dist/images/author2.jpg" alt="" class="img-fluid ml-0 mt-2  rounded-circle" width="40"></a>
                                    <div class="media-body align-self-center pl-2">
                                        <span class="mb-0 font-w-600">kelvin</span><br>
                                        <p class="mb-0 font-w-500 tx-s-12">San Francisco, California, USA</p>
                                    </div>
                                    <div class="ml-auto my-auto">
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Mark as unread"><i class="icon-envelope"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Save as draft"><i class="icon-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Delete Email"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="p-2 border-bottom">
                                <div class="media d-flex w-100">
                                    <a href="#"><img src="dist/images/author3.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                    <div class="media-body align-self-center pl-2">
                                        <span class="mb-0 font-w-600">Peter</span><br>
                                        <p class="mb-0 font-w-500 tx-s-12">San Francisco, California, USA</p>
                                    </div>
                                    <div class="ml-auto my-auto">
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Mark as unread"><i class="icon-envelope"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Save as draft"><i class="icon-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Delete Email"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="p-2 border-bottom">
                                <div class="media d-flex w-100">
                                    <a href="#"><img src="dist/images/author9.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                    <div class="media-body align-self-center pl-2">
                                        <span class="mb-0 font-w-600">Ray Sin</span><br>
                                        <p class="mb-0 font-w-500 tx-s-12">San Francisco, California, USA</p>
                                    </div>
                                    <div class="ml-auto my-auto">
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Mark as unread"><i class="icon-envelope"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Save as draft"><i class="icon-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Delete Email"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="p-2 border-bottom">
                                <div class="media d-flex w-100">
                                    <a href="#"><img src="dist/images/author6.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                    <div class="media-body align-self-center pl-2">
                                        <span class="mb-0 font-w-600">Abexon Dixon</span><br/>
                                        <p class="mb-0 font-w-500 tx-s-12">San Francisco, California, USA</p>
                                    </div>

                                    <div class="ml-auto mail-tools">
                                        <a href="#" data-toggle="tooltip" title="Mark as unread" data-placement="bottom"><i class="icon-envelope"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Save as draft" data-placement="bottom" class="ml-2"><i class="icon-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete Email" data-placement="bottom" class="ml-2"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="p-2 border-bottom">
                                <div class="media d-flex w-100">
                                    <a href="#"><img src="dist/images/author7.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                    <div class="media-body align-self-center pl-2">
                                        <span class="mb-0 font-w-600">Nathan S. Johnson</span><br/>
                                        <p class="mb-0 font-w-500 tx-s-12">San Francisco, California, USA</p>
                                    </div>

                                    <div class="ml-auto mail-tools">
                                        <a href="#" data-toggle="tooltip" title="Mark as unread" data-placement="bottom"><i class="icon-envelope"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Save as draft" data-placement="bottom" class="ml-2"><i class="icon-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete Email" data-placement="bottom" class="ml-2"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="p-2">
                                <div class="media d-flex w-100">
                                    <a href="#"><img src="dist/images/author8.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                    <div class="media-body align-self-center pl-2">
                                        <span class="mb-0 font-w-600">Roger L. Arteaga</span><br/>
                                        <p class="mb-0 font-w-500 tx-s-12">San Francisco, California, USA</p>
                                    </div>
                                    <div class="ml-auto mail-tools">
                                        <a href="#" data-toggle="tooltip" title="Mark as unread" data-placement="bottom"><i class="icon-envelope"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Save as draft" data-placement="bottom" class="ml-2"><i class="icon-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete Email" data-placement="bottom" class="ml-2"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12  col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">Onboard > Site Tracking</p>
                        <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> Feb 4th, 2020</p>
                        <p class="font-w-500 tx-s-12">Time estimate: 2 weeks</p>
                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-primary">Medium</span>
                                <span class="badge outline-badge-warning ml-2">Tracking</span>
                            </div>
                            <img src="dist/images/author2.jpg" alt="author" width="30" class="rounded-circle  ml-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">View Order > Confirm Order</p>
                        <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> March 14th, 2021</p>
                        <p class="font-w-500 tx-s-12">Time estimate: 12 days</p>
                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-secondary">Medium</span>
                                <span class="badge outline-badge-success ml-2">Tracking</span>
                            </div>
                            <img src="dist/images/author9.jpg" alt="author" width="30" class="rounded-circle  ml-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">Order Placed > Site Tracking</p>
                        <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> April 21st, 2021</p>
                        <p class="font-w-500 tx-s-12">Time estimate: 7 days</p>
                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-warning">Medium</span>
                                <span class="badge outline-badge-info ml-2">Tracking</span>
                            </div>
                            <img src="dist/images/author3.jpg" alt="author" width="30" class="rounded-circle  ml-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">Pickup > Picking Order</p>
                        <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> Dec 4th, 2020</p>
                        <p class="font-w-500 tx-s-12">Time estimate: 4 weeks</p>
                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-danger">Medium</span>
                                <span class="badge outline-badge-dark ml-2">Tracking</span>
                            </div>
                            <img src="dist/images/author7.jpg" alt="author" width="30" class="rounded-circle  ml-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div id="world-map-gdp" class="w-100 " style="height:180px;"></div>
                        <div class="table-responsive">
                            <table class="table table-borderless pick-table mb-0">
                                <thead>
                                    <tr>
                                        <th>States</th>
                                        <th  class="text-right">Orders</th>
                                        <th  class="text-right">Earnings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>California</td>
                                        <td class="text-right">5,201</td>
                                        <td class="text-right">$80,200.70</td>
                                    </tr>
                                    <tr>
                                        <td>Texas</td>
                                        <td class="text-right">9,950</td>
                                        <td class="text-right">$78,410.30</td>
                                    </tr>
                                    <tr>
                                        <td>Wyoming</td>
                                        <td class="text-right">6,158</td>
                                        <td class="text-right">$162,050.20</td>
                                    </tr>
                                    <tr>
                                        <td>Florida</td>
                                        <td class="text-right">7,875</td>
                                        <td class="text-right">$187,792.10</td>
                                    </tr>
                                    <tr>
                                        <td>New York</td>
                                        <td class="text-right">12,560</td>
                                        <td class="text-right">$13,087.90</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-8 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h6 class="card-title">Recent Orders</h6>
                </div>
                <div class="card-body table-responsive p-0">

                    <table class="table  mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Purchased</th>
                                <th>Client Name</th>
                                <th>Amount</th>
                                <th>Quantity</th>
                                <th>Shipment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0001</td>
                                <td>03/11/2015</td>
                                <td>Addison Nichols</td>
                                <td>$ 515.20</td>
                                <td>547</td>
                                <td>04/10/2017</td>
                                <td><span class="badge outline-badge-primary">Standby</span></td>
                            </tr>
                            <tr class="ng-scope">
                                <td>0002</td>
                                <td>05/11/2015</td>
                                <td>Albert Watkins</td>
                                <td>$ 22.30</td>
                                <td>122</td>
                                <td>06/10/2017</td>
                                <td><span class="badge outline-badge-dark">Paid</span></td>
                            </tr>
                            <tr class="ng-scope">
                                <td>0003</td>
                                <td>07/09/2015</td>
                                <td>Johnny Fernandez</td>
                                <td>$ 31.4</td>
                                <td>68</td>
                                <td>28/09/2017</td>
                                <td><span class="badge outline-badge-success">Standby</span></td>
                            </tr>

                            <tr class="ng-scope">
                                <td>0014</td>
                                <td>30/09/2015</td>
                                <td>Nora Lambert</td>
                                <td>$ 147.15</td>
                                <td>65</td>
                                <td>23/11/2017</td>
                                <td><span class="badge outline-badge-info">Paid</span></td>
                            </tr>
                            <tr class="ng-scope">
                                <td>0015</td>
                                <td>29/07/2015</td>
                                <td>Shelly Robertson</td>
                                <td>$ 15.016</td>
                                <td>12</td>
                                <td>30/1/2020</td>
                                <td><span class="badge outline-badge-danger">Canceled</span></td>
                            </tr>
                            <tr class="ng-scope">
                                <td>0016</td>
                                <td>22/07/2015</td>
                                <td>Everett Garcia</td>
                                <td>$ 188.19</td>
                                <td>65</td>
                                <td>029/11/2017</td>
                                <td><span class="badge outline-badge-dark">Paid</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <!-- END: Card DATA-->
</div>

      @endsection
