    <b-button v-b-modal.modal-1 variant="danger" size="sm">Delete</b-button>
    <b-modal id="modal-1" title="Confirm Delete Action" hide-footer>
      <p class="my-4">{{$msg}} </p>
      <div class="mt-3 row float-right">
        <b-button  class="mr-1" @click="$bvModal.hide('modal-1')">No</b-button>
        <form action="{{ route('areas.destroy' , $model->id)}}" method="POST">
            <input name="_method" type="hidden" value="DELETE">
            {{ csrf_field() }}
        <b-button  class="mr-2" variant="danger">Yes</b-button>
    </form>
      </div>
    </b-modal>


    {{-- <form action="{{ route('areas.destroy' , $area->id)}}" method="POST">
        <input name="_method" type="hidden" value="DELETE">
        {{ csrf_field() }}

        <button type="submit" class="btn btn-danger btn-sm">Delete</button>

    </form> --}}
