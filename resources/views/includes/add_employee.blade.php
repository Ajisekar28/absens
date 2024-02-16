<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <h4 class="modal-title"><b>Add Employee</b></h4>
            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Employee Name" id="name" name="name" required />
                        </div>
                        <div class="form-group">
                            <label for="rfid">RFID</label>
                            <input type="text" class="form-control" placeholder="Enter RFID" id="rfid" name="rfid" required />
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select class="form-control" id="class" name="class" required>
                                <option value="">- Select Class -</option>
                                <option value="RPL 1">RPL 1</option>
                                <option value="RPL 2">RPL 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="major">Major</label>
                            <select class="form-control" id="major" name="major" required>
                                <option value="">- Select Major -</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
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
                            <label for="schedule" class="control-label">Schedule</label>
                            <select class="form-control" id="schedule" name="schedule" required>
                                <option value="" selected>- Select -</option>
                                @foreach($schedules as $schedule)
                                <option value="{{$schedule->slug}}">{{$schedule->slug}} -> from {{$schedule->time_in}} to {{$schedule->time_out}}</option>
                                @endforeach
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
