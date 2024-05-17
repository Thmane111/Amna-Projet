    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                <h1 style="justify-content: center;text-align:center"><strong style="color:#ad0a0a; ;">Conseils de sécurité</strong></h1>
                                    <div class="col-md-4">

                                        <div class="modal-add-cart-product-img">

                                            <img class="img-fluid"
                                                src="image/sucure.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                       <p>
                                       1 - Ne pas envoyer de paiements sans avoir verifié le produit.<br>
                                       2 - Ne pas envoyer d'argent par des moyens de transfert d'argent,<br>
                                        par virement bancaire ou par n'importe quels autres moyens.<br>
                                       3 - Donner rdv au vendeur dans un lieu public à une heure de passage
                                       <div class="modal-add-cart-info">
                                       <div class="modal-add-cart-product-cart-buttons">
                                            <a href="cart.html"style="background:#ad0a0a;"><i class="fa fa-phone" aria-hidden="true" style="color: white;"></i>  00 222  {{ $voirs->user ? $voirs->user->telephone:'' }}</a>

                                        </div>
                                           </div>
                                       </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->
