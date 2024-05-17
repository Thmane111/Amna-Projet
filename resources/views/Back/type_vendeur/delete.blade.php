<div class="modal fade" id="popdelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form  id="destroy{{$type_vendes->id}}" action="{{route('type_vende.destroy',$type_vendes->id)}}" method="POST">
                    <input type="hidden" id="id_f" value="{{$type_vendes->id}}" name="id_f">
                    @csrf
                    @method('DELETE')


                <center><h5 style="font-size: 18px;"> Voulez-vous supprimer vraiment.</h5></center>
               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
