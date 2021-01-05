@extends('dashboard-layouts.d_master')


@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">content_copy</i>
          </div>
          <p class="card-category">Used Space</p>
          <h3 class="card-title">49/50
            <small>GB</small>
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-danger">warning</i>
            <a href="javascript:;">Get More Space...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">store</i>
          </div>
          <p class="card-category">Revenue</p>
          <h3 class="card-title">$34,245</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">date_range</i> Last 24 Hours
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <p class="card-category">Fixed Issues</p>
          <h3 class="card-title">75</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">local_offer</i> Tracked from Github
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="fa fa-twitter"></i>
          </div>
          <p class="card-category">Followers</p>
          <h3 class="card-title">+245</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i> Just Updated
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-success">
          <div class="ct-chart" id="dailySalesChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Daily Sales</h4>
          <p class="card-category">
            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> updated 4 minutes ago
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-warning">
          <div class="ct-chart" id="websiteViewsChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Email Subscriptions</h4>
          <p class="card-category">Last Campaign Performance</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> campaign sent 2 days ago
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-danger">
          <div class="ct-chart" id="completedTasksChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Completed Tasks</h4>
          <p class="card-category">Last Campaign Performance</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> campaign sent 2 days ago
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title">Notification:</span>
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#profile" data-toggle="tab">
                    <i class="material-icons">notifications</i> Konfirmation
                    <div class="ripple-container"></div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <b>Warung Name</b>
                    </td>
                    <td>You have a new Warung, Check detail to confirm.</td>
                    <td class="td-actions text-right">
                      <a href="#" class="btn btn-primary">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <b>Warung Name</b>
                    </td>
                    <td>You have a new Warung, Check detail to confirm.</td>
                    <td class="td-actions text-right">
                      <a href="#" class="btn btn-primary">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <b>Warung Name</b>
                    </td>
                    <td>You have a new Warung, Check detail to confirm.
                    </td>
                    <td class="td-actions text-right">
                      <a href="#" class="btn btn-primary">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <b>Warung Name</b>
                    </td>
                    <td>You have a new Warung, Check detail to confirm.</td>
                    <td class="td-actions text-right">
                      <a href="#" class="btn btn-primary">Details</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header card-header-warning">
          <h4 class="card-title">Warung Stats</h4>
          <p class="card-category">New Warung on 06th January, 2021</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-warning">
              <th>ID</th>
              <th>Name</th>
              <th>City</th>
              <th>Districts</th>
              <th>Accepted</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Dakota Rice</td>
                <td>Bandung</td>
                <td>Coblong</td>
                <td>19:01 WIB</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Warung Miss Claude</td>
                <td>Bekasi</td>
                <td>East Bekasi</td>
                <td>18:49 WIB</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Warung Mr Beddy</td>
                <td>Bogor</td>
                <td>Hotwater</td>
                <td>17:19 WIB</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Warung Indomie 99</td>
                <td>Bandung</td>
                <td>West Java</td>
                <td>16:44 WIB</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection