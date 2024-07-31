@include('admin.layouts.cms.cmsLayout')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">
          <div class="card-body">
          
          @foreach($data as $v_data)
          <form id="updateForm_{{ $v_data->id }}" action="{{ route('cms.update', $v_data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col">
                    <h5>Nama Website :</h5>
                    <input type="text" class="form-control" name="website_name" value="{{ $v_data->website_name }}" />
                </div>
                <div class="col">
                    <h5>Logo :</h5>
                    <div class="row">
                        <div class="col-3">
                            <img style="width:100px" src="{{ asset('/assets/image_content/'.$v_data->logo) }}">
                        </div>
                        <div class="col">
                            <input type="file" name="logo" class="form-control" />
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col">
                    <h5>Primary Color</h5>
                    <input type="color" name="primary_color" class="form-control" value="{{ $v_data->primary_color }}" />
                </div>
                <div class="col">
                    <h5>Secondary Color</h5>
                    <input type="color" name="secondary_color" class="form-control" value="{{ $v_data->secondary_color }}" />
                </div>
            </div><br>
            <div style="text-align:right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          @endforeach
          </div>
      </div>
  </div>
</div>
@include('admin.layouts.footer')