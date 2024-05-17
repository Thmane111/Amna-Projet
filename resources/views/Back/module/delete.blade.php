<div class="modal fade" id="popdelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">

                <form  id="destroy" action="{{route('Module.destroy',0)}}" method="POST">
                    <input type="hidden" id="id_f"  name="id_f">
                    @csrf
                    @method('DELETE')


                <center><h5 style="font-size: 18px;"> Voulez-vous supprimer ce fonctionnalitées.</h5></center>
                <center><i class="fas fa-info-circle light" style="font-size:70px;color:red; "></i></center><br>
                <center><p>Attention: suppression de cette module entrainera l'annulation configuration</p></center>

               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
