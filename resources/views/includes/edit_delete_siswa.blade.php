<!-- Edit -->
<div class="modal fade" id="editSiswa{{ $siswa->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 class="modal-title"><b>Edit Siswa</b></h4>
            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('siswa.update', $siswa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_name">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukan nama siswa" id="edit_name" name="name" value="{{ $siswa->nama }}" required />
                        </div>
                        <div class="form-group">
                            <label for="edit_rfid">RFID</label>
                            <input type="text" class="form-control" placeholder="Enter RFID" id="edit_rfid" name="rfid" value="{{ $siswa->rfid }}" required />
                        </div>
                        <div class="form-group">
                            <label for="edit_class">Class</label>
                            <select class="form-control" id="edit_class" name="class_id" required>
                                <option value="{{$siswa->kelas->id}}">{{$siswa->kelas->nama}}</option>
                                @foreach($kelas as $kls)
                                    @if($siswa->kelas->id != $kls->id)
                                        <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_kelamin">Kelamin</label>
                            <select class="form-control" id="edit_kelamin" name="kelamin" required>
                                <option value="{{$siswa->kelamin}}">{{$siswa->kelamin}}</option>
                                    @foreach(['laki laki', 'perempuan'] as $genderOption)
                                        @if($siswa->kelamin != $genderOption)
                                            <option value="{{ $genderOption }}">{{ $genderOption }}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            <button type="button" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Delete-->
<div class="modal fade" id="deleteSiswa{{ $siswa->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items: center">
                <h4 class="modal-title"><span class="employee_id">Hapus Siswa</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('siswa.destroy', $siswa->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}

                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">{{ $siswa->nama }}</h2>
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



