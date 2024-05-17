<div class="modal fade" id="popdelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form  id="destroy{{$cats->id}}" action="{{route('categorie.destroy',$cats->id)}}" method="POST">
                    <input type="hidden" id="id_f" value="{{$cats->id}}" name="id_f">
                    @csrf
                    @method('DELETE')


                    <center><h5 style="font-size: 18px;"> Voulez-vous supprimer ce catégorie.</h5></center>
                    <center><i class="fas fa-info-circle light" style="font-size:70px;color:red; "></i></center><br>
                    <center><p>Attention: cette suppression entrainera du type des catégorie liés</p></center>

               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
