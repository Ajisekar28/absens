<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title"><b>Add Jurusan</b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('jurusan.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" id="name" name="nama">
                        </div>
                        <label for="user_id" class="col-sm-3 control-label">Nama Bk</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($users as $user)
                                    @if($user->roles->contains('slug', 'bk'))
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
