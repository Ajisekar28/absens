<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title"><b>Add Siswa</b></h4>
            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('siswa.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukan nama siswa" id="name" name="name" required />
                        </div>
                        <div class="form-group">
                            <label for="rfid">RFID</label>
                            <input type="text" class="form-control" placeholder="Enter RFID" id="rfid" name="rfid" required />
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select class="form-control" id="class" name="class_id" required>
                                <option value="">- Select Class -</option>
                                @foreach($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">- Select Gender -</option>
                                <option value="laki laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            <button type="button" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>