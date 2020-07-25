<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Company Settings</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="company_name">Company Name</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter company name"
                    id="company_name"
                    name="company_name"
                    value="{{ config('settings.company_name') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="company_address">Company Address</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter company address"
                    id="company_address"
                    name="company_address"
                    value="{{ config('settings.company_address') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="company_phone">Company Phone</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Company Phone"
                    id="company_phone"
                    name="company_phone"
                    value="{{ config('settings.company_phone') }}"
                />
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>