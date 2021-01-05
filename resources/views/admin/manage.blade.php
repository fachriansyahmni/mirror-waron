@extends('dashboard-layouts.d_master')


@section('content')
<h2>Manage Warung</h2>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">List Warung</h4>
                  <p class="card-category"> Here is a all user of warung</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          NO
                        </th>
                        <th>
                          Warung Name
                        </th>
                        <th>
                          City
                        </th>
                        <th>
                          Districts
                        </th>
                        <th>
                          Province
                        </th>
                        <th>
                          Options
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Dakota Rice
                          </td>
                          <td>
                            Bandung
                          </td>
                          <td>
                            Coblong
                          </td>
                          <td>
                            West Java
                          </td>
                          <td> 
                                <a href="#" class="btn btn-success">Manage</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Warung Miss Claude
                          </td>
                          <td>
                            Bekasi
                          </td>
                          <td>
                            West Bekasi
                          </td>
                          <td>
                            West Java
                          </td>
                          <td> 
                                <a href="#" class="btn btn-success">Manage</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection