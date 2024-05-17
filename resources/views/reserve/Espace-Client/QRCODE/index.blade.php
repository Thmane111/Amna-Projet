

  @extends("Espace-Client.index")
@section("content")

<style>
    #bg{
        background-color: #0e1d34;;
        background-image: url({{asset('Site-web/assets/img/hero-bg.png')}});

    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/schmich/instascan-builds@master/instascan.min.js
    "></script>
<div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row clearfix g-3">
                    <div class="col-xl-8 col-lg-12 col-md-12 flex-column">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Employees Info</h6>
                                    </div>
                                    <div class="card-body">
                                    <div class="row clearfix g-3">
                  <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                        <th>Numero Ticket</th>
                    <th>Session</th>
                    <th>Prix</th>
                    <th>Status</th>
                    <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list_ticket as $list_tickets)
                                        <tr>
                                            <td>
                                                <a href="ticket-detail.html" class="fw-bold text-secondary">#Tc-0002</a>
                                            </td>
                                            <td>
                                               Vip
                                           </td>
                                           <td>

                                               <span class="fw-bold ms-1">10 000 FCFA</span>
                                           </td>

                                           <td>
                                           @if($list_tickets->statut==0)
                                           <span class="badge bg-success">Valable</span>
                                           @else
                                           <span class="badge bg-danger">In Progress</span>
                                           @endif
                                        </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edittickit"><i class="icofont-edit text-success"></i></button>
                                                    <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  </div>
                </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <div class="row g-3 row-deck">
                            <div class="col-md-6 col-lg-6 col-xl-12">
                                <div class="card bg-primary">
                                    <div class="card-body row">
                                    <form action="{{route('qr.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <video id="preview" width="100%"></video>
                                    <input type="hidden" name="text" id="text" readonyy="" placeholder="scan" />
                                    <input type="hidden" name="event" value="{{$vq_event->id}}"   placeholder="scan" />
                                    </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-12  flex-column">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-fill">
                                            <span class="avatar lg light-success-bg rounded-circle text-center d-flex align-items-center justify-content-center">VIP</span>
                                            <div class="d-flex flex-column ps-3  flex-fill">
                                                <h6 class="fw-bold mb-0 fs-4">{{$cpt_ticket_vip_0."/".$cpt_ticket_vip_T}}</h6>
                                                <span class="text-muted">disponible</span>
                                            </div>
                                            <i class="icofont-chart-bar-graph fs-3 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-fill">
                                            <span class="avatar lg light-success-bg rounded-circle text-center d-flex align-items-center justify-content-center">Pass</span>
                                            <div class="d-flex flex-column ps-3 flex-fill">
                                                <h6 class="fw-bold mb-0 fs-4">{{$cpt_ticket_log_0."/".$cpt_ticket_log_T}}</h6>
                                                <span class="text-muted">disponible</span>
                                            </div>
                                            <i class="icofont-chart-line fs-3 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- Row End -->
            </div>
        </div>
        <script>
        let scanner=new Instascan.Scanner({video: document.getElementById('preview')});
     Instascan.Camera.getCameras().then(function(cameras){
      if(cameras.length>0){
          scanner.start(cameras[0]);
      }else{
          alert('No cameras found');
      }
     }).catch(function(e){
      console.error(e);
     });

     scanner.addListener('scan',function(e){
      document.getElementById('text').value=e;
      document.forms[1].submit();
     });
</script>
  @endsection
