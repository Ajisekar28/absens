<!-- Edit -->
<div class="modal fade" id="editJurusan{{ $jurusan->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 class="modal-title"><b>Update Jurusan</b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('jurusan.update', $jurusan->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="edit_name" class="col-sm-3 control-label">Nama</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="edit_name" name="nama" value="{{ $jurusan->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_user" class="col-sm-3 control-label">Nama BK</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="edit_user" name="user_id" required>
                                    <option value="{{$jurusan->user_id}}">{{$jurusan->user->name}}</option>
                                    @foreach($users as $user)
                                        @if($user->roles->contains('slug', 'bk') && $jurusan->user_id != $user->id)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                    <i class="fa fa-close"></i> Close
                </button>
                <button type="submit" class="btn btn-success btn-flat">
                    <i class="fa fa-check-square-o"></i> Update
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteJurusan{{ $jurusan->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items: center">
                <h4 class="modal-title"><span class="employee_id">Hapus Jurusan</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('jurusan.destroy', $jurusan->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}

                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">{{ $jurusan->nama }}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                    <i class="fa fa-close"></i> Close
                </button>
                <button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure you want to delete this item?');">
                    <i class="fa fa-trash"></i> Delete
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
