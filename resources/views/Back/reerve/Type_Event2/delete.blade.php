<div class="modal fade" id="popdelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form  id="destroy{{$categoryevents->id}}" action="{{route('category-event.destroy',$categoryevents->id)}}" method="POST">
                    <input type="hidden" id="id_f" value="{{$categoryevents->id}}" name="id_f">
                    @csrf
                    @method('DELETE')


                <center><h5 style="font-size: 18px;"> Voulez-vous supprimer le type d'evenement.</h5></center>
               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
