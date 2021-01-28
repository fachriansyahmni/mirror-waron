@extends('dashboard-layouts.d_master')


@section('content')
<h2>Manage Category</h2>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">List Category</h4>
                  <p class="card-category"> category for warung</p>
                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#newCategoryModal">add a new category</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          NO
                        </th>
                        <th>
                          Category Name
                        </th>
                        <th>
                          Total Warung
                        </th>
                        <th>
                          Options
                        </th>
                      </thead>
                      <tbody>
                        @if (count($getAllCategory) < 1)
                            <tr>
                              <td colspan="4" class="text-center">no record</td>
                            </tr>
                        @endif
                        @foreach ($getAllCategory as $index => $category)
                        <tr>
                          <td>
                            {{$index+1}}
                          </td>
                          <td>
                            {{$category->kategori}}
                          </td>
                          <td>
                          
                          </td>
                          <td> 
                                <a href="#" class="btn btn-success">Manage</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endsection

@section('modal-content')
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newCategoryModalLabel">Add a New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          @csrf
          <div class="form-group">
            <label for="n_name_category">Name Category</label>
            <input id="n_name_category" type="text" name="n_name_category" class="form-control" value="{{old('n_name_category')}}" required>
          </div>
          <button class="btn btn-success" name="submit_new_category" type="submit">add</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection