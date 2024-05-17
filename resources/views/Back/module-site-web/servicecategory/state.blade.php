<div class="modal fade" id="popstate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form  id="destroy{{$servicecategorys->id}}" action="{{route('servicecategory.state', $servicecategorys->id)}}" method="POST">
                    <input type="hidden" id="id_s" value="{{$servicecategorys->id}}" name="id_s">
                    @csrf



                <center><h5 style="font-size: 18px;"> Voulez-vous  @if( $servicecategorys->etat==0) activer @else desactiver @endif ce type de service</h5></center>
               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
