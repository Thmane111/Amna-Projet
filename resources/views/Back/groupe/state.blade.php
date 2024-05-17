<div class="modal fade" id="popstate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form  id="destroy{{$groupes->id}}" action="{{route('groupe.state',$groupes->id)}}" method="POST">
                    <input type="hidden" id="id_s" value="{{$groupes->id}}" name="id_s">
                    @csrf



                <center><h5 style="font-size: 18px;"> Voulez-vous  @if($groupes->etat==0) activer @else desactiver @endif le groupe</h5></center>
               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
