<div class="modal fade" id="popstate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form  id="destroy{{$sous_cats->id}}" action="{{route('sous_categorie.state',$sous_cats->id)}}" method="POST">
                    <input type="hidden" id="id_s" value="{{$sous_cats->id}}" name="id_s">
                    @csrf



                <center><h5 style="font-size: 18px;"> Voulez-vous  @if($sous_cats->etat==0) activer @else desactiver @endif ce sous categorie</h5></center>
               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
