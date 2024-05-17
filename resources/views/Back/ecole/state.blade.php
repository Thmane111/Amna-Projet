<div class="modal fade" id="popstate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form  id="destroy{{$ecoles->id}}" action="{{route('ecole.state',$ecoles->id)}}" method="POST">
                    <input type="hidden" id="id_s" value="{{$ecoles->id}}" name="id_s">
                    @csrf



                <center><h5 style="font-size: 18px;"> Voulez-vous  @if($ecoles->etat==0) activer @else desactiver @endif le ecole</h5></center>
               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
