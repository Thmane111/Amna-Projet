

  @extends("Espace-Client.index")
@section("content")
<div class="container-xxl">

    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">



            <div class="row justify-content-center">

                <div class="col-lg-12 col-md-12">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="Invoice-Simple">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-12">
                                    <div class="card   p-0">
                                        <div class="card-body">


                                            <div class="row"  style="padding:0px">
                                                <img src="{{asset('Site-web/assets/img/az.jpg')}}" alt="" style="width:100%;height:200px;">
                                                <div class="col-lg-12">
                                                    <br>
                                                    <strong><h4>Marketing digital-Community Manager</h4></strong>
                                                    <p class="text-muted">
                                                        En 12 semaines intensives, apprenez toutes les compétences d'un Community Manager à partir de zéro et changez votre carrière.
                                                    </p>
                                                       <div class="d-flex">
                                                    <img class="avatar rounded-circle" src="assets/images/profile_av.png" alt="profile" style="padding-right:10px; ">
                                                    <p>Mr Yacoub Diagne</p><br>
                                                    <p>Formateur certifié en java</p>
                                                    </div>

                                                </div>
                                            </div> <!-- Row end  -->

                                            <div class="table-responsive-sm">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th>Description</th>
                                                            <th class="text-end">Mensualité</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td>20 000 Mru</td>
                                                            <td>10 000 Mru</td>
                                                            <td><a href="" class="btn btn-primary">Souscrire</a></td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Row end  -->
                        </div> <!-- tab end  -->

                    </div>
                </div>

            </div> <!-- Row end  -->
        </div>
    </div>
</div>

  @endsection
