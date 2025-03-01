<x-admin.app>
    
    
      
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Users</strong>
                    </div>
                    <div class="number dashtext-1">{{count($users)}}</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-money" ></i></div><strong>Total Amount</strong>
                    </div>
                    <div class="number dashtext-1">{{number_format($total)}}</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Admin</strong>
                    </div>
                    <div class="number dashtext-1">{{count($admin)}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$p_a}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-contract"></i></div><strong>Total Products</strong>
                    </div>
                    <div class="number dashtext-2">{{count($products)}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$p_p}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Order</strong>
                    </div>
                    <div class="number dashtext-3">{{count($orders)}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$p_o}}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>total pending</strong>
                    </div>
                    <div class="number dashtext-4">{{count($orders_pending)}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$p_op}}%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>total processing</strong>
                    </div>
                    <div class="number dashtext-4">{{count($orders_processing)}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$p_opr}}%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>total delivered</strong>
                    </div>
                    <div class="number dashtext-4">{{count($orders_delivered)}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$p_od}}%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <x-admin.footer/>
      
    
    
  </x-admin.app>
</html>
